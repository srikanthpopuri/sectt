<?php
include('../../../include/session.php');
/**
 * Handle file uploads via XMLHttpRequest
 */
class qqUploadedFileXhr {
    /**
     * Save the file to the specified path
     * @return boolean TRUE on success
     */
    function save($path) {    
        $input = fopen("php://input", "r");
        $temp = tmpfile();
        $realSize = stream_copy_to_stream($input, $temp);
        fclose($input);
        
        if ($realSize != $this->getSize()){            
            return false;
        }
        
        $target = fopen($path, "w");        
        fseek($temp, 0, SEEK_SET);
        stream_copy_to_stream($temp, $target);
        fclose($target);
        
        return true;
    }
    function getName() {
        return $_GET['qqfile'];
    }
    function getSize() {
        if (isset($_SERVER["CONTENT_LENGTH"])){
            return (int)$_SERVER["CONTENT_LENGTH"];            
        } else {
            throw new Exception('Getting content length is not supported.');
        }      
    }   
}

/**
 * Handle file uploads via regular form post (uses the $_FILES array)
 */
class qqUploadedFileForm {  
    /**
     * Save the file to the specified path
     * @return boolean TRUE on success
     */
    function save($path) {
        if(!move_uploaded_file($_FILES['qqfile']['tmp_name'], $path)){
            return false;
        }
        return true;
    }
    function getName() {
        return $_FILES['qqfile']['name'];
    }
    function getSize() {
        return $_FILES['qqfile']['size'];
    }
}

class qqFileUploader {
    private $allowedExtensions = array();
    private $sizeLimit = 2000000;
    private $file;

    function __construct(array $allowedExtensions = array(), $sizeLimit = 2000000){        
        $allowedExtensions = array_map("strtolower", $allowedExtensions);
            
        $this->allowedExtensions = $allowedExtensions;        
        $this->sizeLimit = $sizeLimit;
        
       $this->checkServerSettings();       

        if (isset($_GET['qqfile'])) {
            $this->file = new qqUploadedFileXhr();
        } elseif (isset($_FILES['qqfile'])) {
            $this->file = new qqUploadedFileForm();
        } else {
            $this->file = false; 
        }
    }
    
    private function checkServerSettings(){        
        $postSize = $this->toBytes(ini_get('post_max_size'));
        $uploadSize = $this->toBytes(ini_get('upload_max_filesize'));        
        
        if ($postSize < $this->sizeLimit || $uploadSize < $this->sizeLimit){
            $size = max(1, $this->sizeLimit / 1024 / 1024) . 'M';             
            die("{'error':'increase post_max_size and upload_max_filesize to $size'}");    
        }        
    }
    
    private function toBytes($str){
        $val = trim($str);
        $last = strtolower($str[strlen($str)-1]);
        switch($last) {
            case 'g': $val *= 1024;
            case 'm': $val *= 1024;
            case 'k': $val *= 1024;        
        }
        return $val;
    }
    
    /**
     * Returns array('success'=>true) or array('error'=>'error message')
     */
    function handleUpload($uploadDirectory, $replaceOldFile = FALSE){
       
	   global $database,$session;
	   
	   
	   if(!isset($_SESSION['photos'])){
		   $_SESSION['photos'] = '';
	   }
	   
	   
	    if (!is_writable($uploadDirectory)){
            
			return array('error' => "Server error. Upload directory isn't writable.");
            
		}
        
        if (!$this->file){
            return array('error' => 'No files were uploaded.');
        }
        
        $size = $this->file->getSize();
        
        if ($size == 0) {
            return array('error' => 'File is empty');
        }
        
        if ($size > $this->sizeLimit) {
            return array('error' => 'File is too large');
        }
        
        $pathinfo = pathinfo($this->file->getName());
        //$filename = $pathinfo['filename'];
        $filename = md5(uniqid());
        $ext = $pathinfo['extension'];

        if($this->allowedExtensions && !in_array(strtolower($ext), $this->allowedExtensions)){
            $these = implode(', ', $this->allowedExtensions);
            return array('error' => 'File has an invalid extension, it should be one of '. $these . '.');
        }
		
		
        
        if(!$replaceOldFile){
            /// don't overwrite previous files that were uploaded
            while (file_exists($uploadDirectory . $filename . '.' . $ext)) {
                $filename .= rand(10, 99);
            }
        }
        
      
	    if ($this->file->save($uploadDirectory . $filename . '.' . $ext)){
			
			$width = 900;
			$height = 300;
			
			
			
			if($_GET['upload'] == 'image' || isset($_GET['resize']) || $_GET['upload'] == 'pan_cert'){
				
				
			if(isset($_REQUEST['width']))
			 $width = $_REQUEST['width'];
			
			if(isset($_REQUEST['height']))
			 $height = $_REQUEST['height'];
			 
			 if(strtolower($ext) != 'pdf'  )
 		  $session->image_resize($uploadDirectory . $filename . '.' . $ext,$uploadDirectory . $filename . '.' . $ext,$width,$height,100,false);
		 //$session->resize($uploadDirectory . $filename . '.' . $ext,$uploadDirectory . $filename . '_big.' . $ext,$width*2,$height*2,100,false);
					
			}
		    
			
			if(!isset($_SESSION[$_GET['upload']])){
			   $_SESSION[$_GET['upload']] = "";	
			}
			
		
			$resize = filesize($uploadDirectory . $filename . '.' . $ext);
			
		
			$_SESSION['uploads'][$filename]['name'] = $filename . '.' . $ext;
			
			//$_SESSION['photos'].=  $filename . '.' . $ext.',';
			
			if( $_GET['upload_type'] == 'multiple'){
						$_SESSION[$_GET['upload']].=  $filename . '.' . $ext.',';
			}
			else{
						$_SESSION[$_GET['upload']] =  $filename . '.' . $ext;
			}
			$title = $pathinfo['filename'];
			
		
            if(isset($_GET['setalert'])){
                return array('success'=>true,'filename'=>trim($_SESSION[$_GET['upload']],','),'fakename'=>$pathinfo['filename'].'.' . $ext,'resize'=>'resized to '.round(($resize/1024)).'Kb','filetitle'=>$title,'filevalue'=>$pathinfo['filename'],'filepath'=>SECURE_PATH.'files/' . $filename . '.' . $ext,'type'=>$_GET['upload'],'setalert' => 1);
            }else{
                return array('success'=>true,'filename'=>trim($_SESSION[$_GET['upload']],','),'fakename'=>$pathinfo['filename'].'.' . $ext,'resize'=>'resized to '.round(($resize/1024)).'Kb','filetitle'=>$title,'filevalue'=>$pathinfo['filename'],'filepath'=>SECURE_PATH.'files/' . $filename . '.' . $ext,'type'=>$_GET['upload'],'setalert' => 0);
            }
            
			
	    } else {
            return array('error'=> 'Could not save uploaded file.' .
                'The upload was cancelled, or server error encountered');
        }
        
    }   
	
	

}

$allowedExtensions = array('jpeg','png','gif','jpg','pdf','PDF');
//list of valid extensions, ex. array("jpeg", "xml", "bmp","png","gif","jpg")
if($_GET['upload']=='image' || $_GET['upload']=='image1')
{
$allowedExtensions = array('jpeg','png','gif','jpg');
}
if($_GET['upload']=='file')
{
$allowedExtensions = array('jpeg','png','gif','jpg','doc','docx','pdf','PDF','DOC','DOCX','xls','XLS','xlsx','XLSX','txt');
}

if($_GET['upload']=='solvency' || $_GET['upload']=='agreement')
{
$allowedExtensions = array('jpeg','png','jpg','doc','docx','pdf','PDF','DOC','DOCX','xls','XLS','xlsx','XLSX','txt');
}
// max file size in bytes
$sizeLimit = 8 * 1024 * 1024;

$uploader1 = new qqFileUploader($allowedExtensions, $sizeLimit);
 
$result = $uploader1->handleUpload('../../../files/');
 

// to pass data through iframe you will need to encode all html tags
echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);
