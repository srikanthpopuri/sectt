<?php
    header('Access-Control-Allow-Origin: *');  
    $text = substr(urldecode($_GET['q']),0,230);//"this is selected text please check your file. please send the coorect info. this is sample content from kanchan";
    // Yes French is a beautiful language.
    $lang = "en";
    
    // MP3 filename generated using MD5 hash
    // Added things to prevent bug if you want same sentence in two different languages
    //$file = md5($lang."?".urlencode($text));

    // Save MP3 file in folder with .mp3 extension 
    $file = "myfirst_".rand().".mp3";


    // Check folder exists, if not create it, else verify CHMOD
    /*if (!is_dir("audio/"))
        mkdir("audio/");
    else
        if (substr(sprintf('%o', fileperms('audio/')), -4) != "0777")
            chmod("audio/", 0777);*/


    // If MP3 file exists do not create new request
    try{
		if (!file_exists($file))
		{
			// Download content
			//$text = urlencode("this is selected' text please - check: your file. please send the coorect info. this is ';sample content, from! kanchan");
			$text = urlencode($text);
            $lang = $_GET['lang'];
			$mp3 = file_get_contents( 'https://translate.google.com.vn/translate_tts?ie=UTF-8&client=tw-ob&q='.$text.'&tl='.$lang);
			if(file_put_contents($file, $mp3)){
			   //echo "<a href='".$file."'>File saved</a>";
			   echo $file;
			} else{
				echo "failed";
			}
		}
    }catch (Exception $e) {
      echo "Failed";
	}

?>