<?php
date_default_timezone_set('Asia/Kolkata');
/**
 * Session.php
 * 
 * The Session class is meant to simplify the task of keeping
 * track of logged in users and also guests.
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: June 15, 2011 by Ivan Novak
 */
include("database.php");
//include("mailer.php");
include("form.php");
class Session
{
   var $username;     //Username given on sign-up
   var $userid;       //Random value generated on current login
   var $userlevel;    //The level to which the user pertains
   var $time;         //Time user was last active (page loaded)
   var $logged_in;    //True if user is logged in, false otherwise
   var $userinfo = array();  //The array holding all user info
   var $url;          //The page url current being viewed
   var $referrer;     //Last recorded site page viewed
   /**
    * Note: referrer should really only be considered the actual
    * page referrer in process.php, any other time it may be
    * inaccurate.
    */

   /* Class constructor */
   function Session(){
      $this->time = time();
      $this->startSession();
   }

   /**
    * startSession - Performs all the actions necessary to 
    * initialize this session object. Tries to determine if the
    * the user has logged in already, and sets the variables 
    * accordingly. Also takes advantage of this page load to
    * update the active visitors tables.
    */
   function startSession(){
      global $database;  //The database connection
      session_start();   //Tell PHP to start the session

      /* Determine if user is logged in */
      $this->logged_in = $this->checkLogin();

      /**
       * Set guest value to users not logged in, and update
       * active guests table accordingly.
       */
      if(!$this->logged_in){
         $this->username = $_SESSION['username'] = GUEST_NAME;
         $this->userlevel = GUEST_LEVEL;
         $database->addActiveGuest($_SERVER['REMOTE_ADDR'], $this->time);
      }
      /* Update users last active timestamp */
      else{
         $database->addActiveUser($this->username, $this->time);
      }
      
      /* Remove inactive visitors from database */
      $database->removeInactiveUsers();
      $database->removeInactiveGuests();
      
      /* Set referrer page */
      if(isset($_SESSION['url'])){
         $this->referrer = $_SESSION['url'];
      }else{
         $this->referrer = "/";
      }

      /* Set current url */
      $this->url = $_SESSION['url'] = $_SERVER['PHP_SELF'];
   }

   /**
    * checkLogin - Checks if the user has already previously
    * logged in, and a session with the user has already been
    * established. Also checks to see if user has been remembered.
    * If so, the database is queried to make sure of the user's 
    * authenticity. Returns true if the user has logged in.
    */
   function checkLogin(){
      global $database;  //The database connection
      /* Check if user has been remembered */
      if(isset($_COOKIE['cookname']) && isset($_COOKIE['cookid'])){
         $this->username = $_SESSION['username'] = $_COOKIE['cookname'];
         $this->userid   = $_SESSION['userid']   = $_COOKIE['cookid'];
      }

      /* Username and userid have been set and not guest */
      if(isset($_SESSION['username']) && isset($_SESSION['userid']) &&
         $_SESSION['username'] != GUEST_NAME){
         /* Confirm that username and userid are valid */
         if($database->confirmUserID($_SESSION['username'], $_SESSION['userid']) != 0){
            /* Variables are incorrect, user not logged in */
            unset($_SESSION['username']);
            unset($_SESSION['userid']);
            return false;
         }

         /* User is logged in, set class variables */
         $this->userinfo  = $database->getUserInfo($_SESSION['username']);
         $this->username  = $this->userinfo['username'];
         $this->userid    = $this->userinfo['userid'];
         $this->userlevel = $this->userinfo['userlevel'];
		 //$this->district = $this->userinfo['district'];
         
         /* auto login hash expires in three days */
         if($this->userinfo['hash_generated'] < (time() - (60*60*24*3))){
         	/* Update the hash */
	         $database->updateUserField($this->userinfo['username'], 'hash', $this->generateRandID());
	         $database->updateUserField($this->userinfo['username'], 'hash_generated', time());
         }
         
         return true;
      }
      /* User not logged in */
      else{
         return false;
      }
   }

   /**
    * login - The user has submitted his username and password
    * through the login form, this function checks the authenticity
    * of that information in the database and creates the session.
    * Effectively logging in the user if all goes well.
    */
   function login($subuser, $subpass, $subremember){
      global $database, $form;  //The database and form object

      /* Username error checking */
      $field = "user";  //Use field name for username
	  $q = "SELECT valid FROM ".TBL_USERS." WHERE username='$subuser'";
	  $valid = $database->query($q);
	  $valid = mysqli_fetch_array($valid);
	  	      
      if(!$subuser || strlen($subuser = trim($subuser)) == 0){
         $form->setError($field, "* Username not entered");
      }
      else{
         /* Check if username is not alphanumeric */
         if(!ctype_alnum($subuser)){
            $form->setError($field, "* Username not alphanumeric");
         }
      }	  

      /* Password error checking */
      $field = "pass";  //Use field name for password
      if(!$subpass){
         $form->setError($field, "* Password not entered");
      }
      
      /* Return if form errors exist */
      if($form->num_errors > 0){
         return false;
      }

      /* Checks that username is in database and password is correct */
      $subuser = stripslashes($subuser);
      $result = $database->confirmUserPass($subuser, $subpass);

      /* Check error codes */
      if($result == 1){
         $field = "user";
         $form->setError($field, "* Username not found");
      }
      else if($result == 2){
         $field = "pass";
         $form->setError($field, "* Invalid password");
      }
      
      /* Return if form errors exist */
      if($form->num_errors > 0){
         return false;
      }

      
      if(EMAIL_WELCOME){
      	if($valid['valid'] == 0){
      		$form->setError($field, "* User's account has not yet been confirmed.");
      	}
      }
                  
      /* Return if form errors exist */
      if($form->num_errors > 0){
         return false;
      }
      


      /* Username and password correct, register session variables */
      $this->userinfo  = $database->getUserInfo($subuser);
      $this->username  = $_SESSION['username'] = $this->userinfo['username'];
      $this->userid    = $_SESSION['userid']   = $this->generateRandID();
      $this->userlevel = $this->userinfo['userlevel'];
      
      /* Insert userid into database and update active users table */
      $database->updateUserField($this->username, "userid", $this->userid);
      $database->addActiveUser($this->username, $this->time);
      $database->removeActiveGuest($_SERVER['REMOTE_ADDR']);

      /**
       * This is the cool part: the user has requested that we remember that
       * he's logged in, so we set two cookies. One to hold his username,
       * and one to hold his random value userid. It expires by the time
       * specified in constants.php. Now, next time he comes to our site, we will
       * log him in automatically, but only if he didn't log out before he left.
       */
      if($subremember){
         setcookie("cookname", $this->username, time()+COOKIE_EXPIRE, COOKIE_PATH);
         setcookie("cookid",   $this->userid,   time()+COOKIE_EXPIRE, COOKIE_PATH);
      }

      /* Login completed successfully */
      return true;
   }

   /**
    * logout - Gets called when the user wants to be logged out of the
    * website. It deletes any cookies that were stored on the users
    * computer as a result of him wanting to be remembered, and also
    * unsets session variables and demotes his user level to guest.
    */
   function logout(){
      global $database;  //The database connection
      /**
       * Delete cookies - the time must be in the past,
       * so just negate what you added when creating the
       * cookie.
       */
      if(isset($_COOKIE['cookname']) && isset($_COOKIE['cookid'])){
         setcookie("cookname", "", time()-COOKIE_EXPIRE, COOKIE_PATH);
         setcookie("cookid",   "", time()-COOKIE_EXPIRE, COOKIE_PATH);
      }

      /* Unset PHP session variables */
      unset($_SESSION['username']);
      unset($_SESSION['userid']);

      /* Reflect fact that user has logged out */
      $this->logged_in = false;
      
      /**
       * Remove from active users table and add to
       * active guests tables.
       */
      $database->removeActiveUser($this->username);
      $database->addActiveGuest($_SERVER['REMOTE_ADDR'], $this->time);
      
      /* Set user level to guest */
      $this->username  = GUEST_NAME;
      $this->userlevel = GUEST_LEVEL;
   }

   /**
    * register - Gets called when the user has just submitted the
    * registration form. Determines if there were any errors with
    * the entry fields, if so, it records the errors and returns
    * 1. If no errors were found, it registers the new user and
    * returns 0. Returns 2 if registration failed.
    */
   function register($subuser, $subpass, $subemail, $subname){
   
      global $database, $form, $mailer;  //The database, form and mailer object
      
      /* Username error checking */
      $field = "user";  //Use field name for username
      if(!$subuser || strlen($subuser = trim($subuser)) == 0){
         $form->setError($field, "* Username not entered");
      }
      else{
         /* Spruce up username, check length */
         $subuser = stripslashes($subuser);
         if(strlen($subuser) < 5){
            $form->setError($field, "* Username below 5 characters");
         }
         else if(strlen($subuser) > 30){
            $form->setError($field, "* Username above 30 characters");
         }
         /* Check if username is not alphanumeric */
         else if(!ctype_alnum($subuser)){
            $form->setError($field, "* Username not alphanumeric");
         }
         /* Check if username is reserved */
         else if(strcasecmp($subuser, GUEST_NAME) == 0){
            $form->setError($field, "* Username reserved word");
         }
         /* Check if username is already in use */
         else if($database->usernameTaken($subuser)){
            $form->setError($field, "* Username already in use");
         }
         /* Check if username is banned */
         else if($database->usernameBanned($subuser)){
            $form->setError($field, "* Username banned");
         }
      }

      /* Password error checking */
      $field = "pass";  //Use field name for password
      if(!$subpass){
         $form->setError($field, "* Password not entered");
      }
      else{
         /* Spruce up password and check length*/
         $subpass = stripslashes($subpass);
         if(strlen($subpass) < 4){
            $form->setError($field, "* Password too short");
         }
         /* Check if password is not alphanumeric */
         else if(!ctype_alnum(($subpass = trim($subpass)))){
            $form->setError($field, "* Password not alphanumeric");
         }
         /**
          * Note: I trimmed the password only after I checked the length
          * because if you fill the password field up with spaces
          * it looks like a lot more characters than 4, so it looks
          * kind of stupid to report "password too short".
          */
      }
      
      /* Email error checking */
      $field = "email";  //Use field name for email
      if(!$subemail || strlen($subemail = trim($subemail)) == 0){
         $form->setError($field, "* Email not entered");
      }
      else{
         /* Check if valid email address */
         if(filter_var($subemail, FILTER_VALIDATE_EMAIL) == FALSE){
            $form->setError($field, "* Email invalid");
         }
         /* Check if email is already in use */
         if($database->emailTaken($subemail)){
            $form->setError($field, "* Email already in use");
         }

         $subemail = stripslashes($subemail);
      }
      
      /* Name error checking */
	  $field = "name";
	  if(!$subname || strlen($subname = trim($subname)) == 0){
	     $form->setError($field, "* Name not entered");
	  } else {
	     $subname = stripslashes($subname);
	  }
      
      $randid = $this->generateRandID();
      
      /* Errors exist, have user correct them */
      if($form->num_errors > 0){
         return 1;  //Errors with form
      }
      /* No errors, add the new account to the */
      else{
         if($database->addNewUser($subuser, md5($subpass), $subemail, $randid, $subname)){
            if(EMAIL_WELCOME){               
               $mailer->sendWelcome($subuser,$subemail,$subpass,$randid);
            }
            return 0;  //New user added succesfully
         }else{
            return 2;  //Registration attempt failed
         }
      }
   }
   
   /**
    * editAccount - Attempts to edit the user's account information
    * including the password, which it first makes sure is correct
    * if entered, if so and the new password is in the right
    * format, the change is made. All other fields are changed
    * automatically.
    */
   function editAccount($subcurpass, $subnewpass, $subemail, $subname){
      global $database, $form;  //The database and form object
      /* New password entered */
      if($subnewpass){
         /* Current Password error checking */
         $field = "curpass";  //Use field name for current password
         if(!$subcurpass){
            $form->setError($field, "* Current Password not entered");
         }
         else{
            /* Check if password too short or is not alphanumeric */
            $subcurpass = stripslashes($subcurpass);
            if(strlen($subcurpass) < 4 ||
               !preg_match("^([0-9a-z])+$", ($subcurpass = trim($subcurpass)))){
               $form->setError($field, "* Current Password incorrect");
            }
            /* Password entered is incorrect */
            if($database->confirmUserPass($this->username,md5($subcurpass)) != 0){
               $form->setError($field, "* Current Password incorrect");
            }
         }
         
         /* New Password error checking */
         $field = "newpass";  //Use field name for new password
         /* Spruce up password and check length*/
         $subpass = stripslashes($subnewpass);
         if(strlen($subnewpass) < 4){
            $form->setError($field, "* New Password too short");
         }
         /* Check if password is not alphanumeric */
         else if(!preg_match("^([0-9a-z])+$", ($subnewpass = trim($subnewpass)))){
            $form->setError($field, "* New Password not alphanumeric");
         }
      }
      /* Change password attempted */
      else if($subcurpass){
         /* New Password error reporting */
         $field = "newpass";  //Use field name for new password
         $form->setError($field, "* New Password not entered");
      }
      
      /* Email error checking */
      $field = "email";  //Use field name for email
      if($subemail && strlen($subemail = trim($subemail)) > 0){
         /* Check if valid email address */
         if(filter_var($subemail, FILTER_VALIDATE_EMAIL) == FALSE){
            $form->setError($field, "* Email invalid");
         }
         $subemail = stripslashes($subemail);
      }
      
      /* Name error checking */
	  $field = "name";
	  if(!$subname || strlen($subname = trim($subname)) == 0){
	     $form->setError($field, "* Name not entered");
	  } else {
	     $subname = stripslashes($subname);
	  }
      
      /* Errors exist, have user correct them */
      if($form->num_errors > 0){
         return false;  //Errors with form
      }
      
      /* Update password since there were no errors */
      if($subcurpass && $subnewpass){
         $database->updateUserField($this->username,"password",md5($subnewpass));
      }
      
      /* Change Email */
      if($subemail){
         $database->updateUserField($this->username,"email",$subemail);
      }
      
      /* Change Name */
      if($subname){
         $database->updateUserField($this->username,"name",$subname);
      }
      
      /* Success! */
      return true;
   }
   
   /**
    * isAdmin - Returns true if currently logged in user is
    * an administrator, false otherwise.
    */
   function isAdmin(){
      return ($this->userlevel == ADMIN_LEVEL ||
              $this->username  == ADMIN_NAME);
   }
   
   /**
    * isAuthor - Returns true if currently logged in user is
    * an author or an administrator, false otherwise.
    */
   function isAuthor(){
      return ($this->userlevel == AUTHOR_LEVEL ||
              $this->userlevel == ADMIN_LEVEL);
   }
   
   /**
    * generateRandID - Generates a string made up of randomized
    * letters (lower and upper case) and digits and returns
    * the md5 hash of it to be used as a userid.
    */
   function generateRandID(){
      return md5($this->generateRandStr(16));
   }


    function sendsms($user,$pass,$msg,$sender,$mobile){


        $mobile = '91'.substr($mobile,-10);

        $url = "http://www.onlinebulksmslogin.com/spanelv2/api.php?username=".$user."&password=".$pass."&to=".$mobile."&from=".$sender."&message=".urlencode($msg);    //Store data into URL variable

        return $ret = @file($url);
    }
   
   /**
    * generateRandStr - Generates a string made up of randomized
    * letters (lower and upper case) and digits, the length
    * is a specified parameter.
    */
   function generateRandStr($length){
      $randstr = "";
      for($i=0; $i<$length; $i++){
         $randnum = mt_rand(0,61);
         if($randnum < 10){
            $randstr .= chr($randnum+48);
         }else if($randnum < 36){
            $randstr .= chr($randnum+55);
         }else{
            $randstr .= chr($randnum+61);
         }
      }
      return $randstr;
   }
   
   function cleanInput($post = array()) {
       foreach($post as $k => $v){
            $post[$k] = trim(htmlspecialchars($v));
         }
         return $post;
   }
   
/*Pagination code*/
	 function showPagination($pagename,$tbl_name,$start,$limit,$page,$condition){
		 
		$database = new MySQLDB;
        //your table name
    // How many adjacent pages should be shown on each side?
    $adjacents = 3;
   

   
   
    /*
       First get total number of rows in data table.
       If you have a WHERE clause in your query, make sure you mirror it here.
    */
    $query = "SELECT COUNT(*) as num FROM $tbl_name $condition ";
    $total_pages = mysqli_fetch_array($database->query($query));
    $total_pages = $total_pages['num'];
   

   
    /* Setup vars for query. */
    $targetpage = $pagename;     //your file name  (the name of this file)
                                //how many items to show per page
   


   
    /* Setup page vars for display. */
    if ($page == 0) $page = 1;                    //if no page var is given, default to 1.
    $prev = $page - 1;                            //previous page is page - 1
    $next = $page + 1;                            //next page is page + 1
    $lastpage = ceil($total_pages/$limit);        //lastpage is = total pages / items per page, rounded up.
    $lpm1 = $lastpage - 1;                        //last page minus 1
   
    /*
        Now we apply our rules and draw the pagination object.
        We're actually saving the code to a variable in case we want to draw it more than once.
    */
    $pagination = "";
    if($lastpage > 1)
    {   
        $pagination .= "<div class=\"pagination\">";
        //previous button
        if ($page > 1){
         
		    $pagination.= "<a onclick=\"setStateGet('adminTable','".$targetpage."','page=".$prev."')\">&laquo; previous</a>";
		}
        else{
            $pagination.= "<span class=\"disabled\">&laquo; previous</span>";   
		}
        //pages   
        if ($lastpage < 7 + ($adjacents * 2))    //not enough pages to bother breaking it up
        {   
            for ($counter = 1; $counter <= $lastpage; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<span class=\"current\">$counter</span>";
                else
                    $pagination.= "<a  onclick=\"setStateGet('adminTable','".$targetpage."','page=".$counter."')\">$counter</a>";                   
            }
        }
        elseif($lastpage > 5 + ($adjacents * 2))    //enough pages to hide some
        {
            //close to beginning; only hide later pages
            if($page < 1 + ($adjacents * 2))       
            {
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<span class=\"current\">$counter</span>";
                    else
                        $pagination.= "<a   onclick=\"setStateGet('adminTable','".$targetpage."','page=".$counter."')\">$counter</a>";                   
                }
                $pagination.= "...";
                $pagination.= "<a onclick=\"setStateGet('adminTable','".$targetpage."','page=".$lpm1."')\">$lpm1</a>";
                $pagination.= "<a  onclick=\"setStateGet('adminTable','".$targetpage."','page=".$lastpage."')\">$lastpage</a>";       
            }
            //in middle; hide some front and some back
            elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
            {
                $pagination.= "<a  onclick=\"setStateGet('adminTable','".$targetpage."','page=1')\">1</a>";
                $pagination.= "<a onclick=\"setStateGet('adminTable','".$targetpage."','page=2')\">2</a>";
                $pagination.= "...";
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<span class=\"current\">$counter</span>";
                    else
                        $pagination.= "<a onclick=\"setStateGet('adminTable','".$targetpage."','page=".$counter."')\">$counter</a>";                   
                }
                $pagination.= "...";
                $pagination.= "<a >$lpm1</a>";
                $pagination.= "<a onclick=\"setStateGet('adminTable','".$targetpage."','page=".$lastpage."')\">$lastpage</a>";       
            }
            //close to end; only hide early pages
            else
            {
                $pagination.= "<a onclick=\"setStateGet('adminTable','".$targetpage."','page=1')\">1</a>";
                $pagination.= "<a  onclick=\"setStateGet('adminTable','".$targetpage."','page=2')\">2</a>";
                $pagination.= "...";
                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<span class=\"current\">$counter</span>";
                    else
                        $pagination.= "<a  onclick=\"setStateGet('adminTable','".$targetpage."','page=".$counter."')\">$counter</a>";                   
                }
            }
        }
       
        //next button
        if ($page < $counter - 1)
            $pagination.= "<a  onclick=\"setStateGet('adminTable','".$targetpage."','page=".$next."')\">next &raquo;</a>";
        else
            $pagination.= "<span class=\"disabled\">next  &raquo;</span>";
        $pagination.= "</div>\n";       
    }   
   
   
    return $pagination;
   

}


 function showPagination1($pagename,$tbl_name,$start,$limit,$page,$condition){
		 
		$database = new MySQLDB;
        //your table name
    // How many adjacent pages should be shown on each side?
    $adjacents = 3;
   
   
    /*
       First get total number of rows in data table.
       If you have a WHERE clause in your query, make sure you mirror it here.
    */
    $query = "SELECT COUNT(*) as num FROM $tbl_name $condition ";
    $total_pages = mysqli_fetch_array($database->query($query));
    $total_pages = $total_pages['num'];
   

   
    /* Setup vars for query. */
    $targetpage = $pagename;     //your file name  (the name of this file)
                                //how many items to show per page
   


   
    /* Setup page vars for display. */
    if ($page == 0) $page = 1;                    //if no page var is given, default to 1.
    $prev = $page - 1;                            //previous page is page - 1
    $next = $page + 1;                            //next page is page + 1
    $lastpage = ceil($total_pages/$limit);        //lastpage is = total pages / items per page, rounded up.
    $lpm1 = $lastpage - 1;                        //last page minus 1
   
    /*
        Now we apply our rules and draw the pagination object.
        We're actually saving the code to a variable in case we want to draw it more than once.
    */
    $pagination = "";
    if($lastpage > 1)
    {   
        $pagination .= "<div class=\"pagination\">";
        //previous button
        if ($page > 1){
         
		    $pagination.= "<a onclick=\"setStateGet('aaa','".$targetpage."','page=".$prev."')\">&laquo; previous</a>";
		}
        else{
            $pagination.= "<span class=\"disabled\">&laquo; previous</span>";   
		}
        //pages   
        if ($lastpage < 7 + ($adjacents * 2))    //not enough pages to bother breaking it up
        {   
            for ($counter = 1; $counter <= $lastpage; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<span class=\"current\">$counter</span>";
                else
                    $pagination.= "<a  onclick=\"setStateGet('aaa','".$targetpage."','page=".$counter."')\">$counter</a>";                   
            }
        }
        elseif($lastpage > 5 + ($adjacents * 2))    //enough pages to hide some
        {
            //close to beginning; only hide later pages
            if($page < 1 + ($adjacents * 2))       
            {
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<span class=\"current\">$counter</span>";
                    else
                        $pagination.= "<a   onclick=\"setStateGet('aaa','".$targetpage."','page=".$counter."')\">$counter</a>";                   
                }
                $pagination.= "...";
                $pagination.= "<a onclick=\"setStateGet('aaa','".$targetpage."','page=".$lpm1."')\">$lpm1</a>";
                $pagination.= "<a  onclick=\"setStateGet('aaa','".$targetpage."','page=".$lastpage."')\">$lastpage</a>";       
            }
            //in middle; hide some front and some back
            elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
            {
                $pagination.= "<a  onclick=\"setStateGet('aaa','".$targetpage."','page=1')\">1</a>";
                $pagination.= "<a onclick=\"setStateGet('aaa','".$targetpage."','page=2')\">2</a>";
                $pagination.= "...";
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<span class=\"current\">$counter</span>";
                    else
                        $pagination.= "<a onclick=\"setStateGet('aaa','".$targetpage."','page=".$counter."')\">$counter</a>";                   
                }
                $pagination.= "...";
                $pagination.= "<a >$lpm1</a>";
                $pagination.= "<a onclick=\"setStateGet('aaa','".$targetpage."','page=".$lastpage."')\">$lastpage</a>";       
            }
            //close to end; only hide early pages
            else
            {
                $pagination.= "<a onclick=\"setStateGet('aaa','".$targetpage."','page=1')\">1</a>";
                $pagination.= "<a  onclick=\"setStateGet('aaa','".$targetpage."','page=2')\">2</a>";
                $pagination.= "...";
                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<span class=\"current\">$counter</span>";
                    else
                        $pagination.= "<a  onclick=\"setStateGet('aaa','".$targetpage."','page=".$counter."')\">$counter</a>";                   
                }
            }
        }
       
        //next button
        if ($page < $counter - 1)
            $pagination.= "<a  onclick=\"setStateGet('aaa','".$targetpage."','page=".$next."')\">next &raquo;</a>";
        else
            $pagination.= "<span class=\"disabled\">next  &raquo;</span>";
        $pagination.= "</div>\n";       
    }   
   
   
    return $pagination;
   

}

 function showPaginationnew($pagename,$tbl_name,$start,$limit,$page,$condition){
		 
		$database = new MySQLDB;
        //your table name
    // How many adjacent pages should be shown on each side?
    $adjacents = 3;
   

   
   
    /*
       First get total number of rows in data table.
       If you have a WHERE clause in your query, make sure you mirror it here.
    */
	
	//echo "SELECT count(l.id) as num FROM $tbl_name $condition ";
   $query = "SELECT count(l.id) as num FROM $tbl_name $condition ";
    
	
	$total_pages = mysqli_fetch_array($database->query($query));
    $total_pages = --$total_pages['num'];
   

   
    /* Setup vars for query. */
    $targetpage = $pagename;     //your file name  (the name of this file)
                                //how many items to show per page
   


   
    /* Setup page vars for display. */
    if ($page == 0) $page = 1;                    //if no page var is given, default to 1.
    $prev = $page - 1;                            //previous page is page - 1
    $next = $page + 1;                            //next page is page + 1
    $lastpage = ceil($total_pages/$limit);        //lastpage is = total pages / items per page, rounded up.
    $lpm1 = $lastpage - 1;                        //last page minus 1
   
    /*
        Now we apply our rules and draw the pagination object.
        We're actually saving the code to a variable in case we want to draw it more than once.
    */
    $pagination = "";
    if($lastpage > 1)
    {   
        $pagination .= "<div class=\"pagination\">";
        //previous button
        if ($page > 1){
         
		    $pagination.= "<a onclick=\"setStateGet('adminTable','".$targetpage."','page=".$prev."')\">&laquo; previous</a>";
		}
        else{
            $pagination.= "<span class=\"disabled\">&laquo; previous</span>";   
		}
        //pages   
        if ($lastpage < 7 + ($adjacents * 2))    //not enough pages to bother breaking it up
        {   
            for ($counter = 1; $counter <= $lastpage; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<span class=\"current\">$counter</span>";
                else
                    $pagination.= "<a  onclick=\"setStateGet('adminTable','".$targetpage."','page=".$counter."')\">$counter</a>";                   
            }
        }
        elseif($lastpage > 5 + ($adjacents * 2))    //enough pages to hide some
        {
            //close to beginning; only hide later pages
            if($page < 1 + ($adjacents * 2))       
            {
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<span class=\"current\">$counter</span>";
                    else
                        $pagination.= "<a   onclick=\"setStateGet('adminTable','".$targetpage."','page=".$counter."')\">$counter</a>";                   
                }
                $pagination.= "...";
                $pagination.= "<a onclick=\"setStateGet('adminTable','".$targetpage."','page=".$lpm1."')\">$lpm1</a>";
                $pagination.= "<a  onclick=\"setStateGet('adminTable','".$targetpage."','page=".$lastpage."')\">$lastpage</a>";       
            }
            //in middle; hide some front and some back
            elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
            {
                $pagination.= "<a  onclick=\"setStateGet('adminTable','".$targetpage."','page=1')\">1</a>";
                $pagination.= "<a onclick=\"setStateGet('adminTable','".$targetpage."','page=2')\">2</a>";
                $pagination.= "...";
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<span class=\"current\">$counter</span>";
                    else
                        $pagination.= "<a onclick=\"setStateGet('adminTable','".$targetpage."','page=".$counter."')\">$counter</a>";                   
                }
                $pagination.= "...";
                $pagination.= "<a >$lpm1</a>";
                $pagination.= "<a onclick=\"setStateGet('adminTable','".$targetpage."','page=".$lastpage."')\">$lastpage</a>";       
            }
            //close to end; only hide early pages
            else
            {
                $pagination.= "<a onclick=\"setStateGet('adminTable','".$targetpage."','page=1')\">1</a>";
                $pagination.= "<a  onclick=\"setStateGet('adminTable','".$targetpage."','page=2')\">2</a>";
                $pagination.= "...";
                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<span class=\"current\">$counter</span>";
                    else
                        $pagination.= "<a  onclick=\"setStateGet('adminTable','".$targetpage."','page=".$counter."')\">$counter</a>";                   
                }
            }
        }
       
        //next button
        if ($page < $counter - 1)
            $pagination.= "<a  onclick=\"setStateGet('adminTable','".$targetpage."','page=".$next."')\">next &raquo;</a>";
        else
            $pagination.= "<span class=\"disabled\">next  &raquo;</span>";
        $pagination.= "</div>\n";       
    }   
   
   
    return $pagination;
   

}

/*Pagination code*/
	 function showPagination2($pagename,$tbl_name,$start,$limit,$page,$condition){
		 
		$database = new MySQLDB;
        //your table name
    // How many adjacent pages should be shown on each side?
    $adjacents = 3;
   

   
   
    /*
       First get total number of rows in data table.
       If you have a WHERE clause in your query, make sure you mirror it here.
    */
    $query = "SELECT COUNT(*) as num FROM $tbl_name $condition ";
    $total_pages = mysqli_fetch_array($database->query($query));
    $total_pages = $total_pages['num'];
   

   
    /* Setup vars for query. */
    $targetpage = $pagename;     //your file name  (the name of this file)
                                //how many items to show per page
   


   
    /* Setup page vars for display. */
    if ($page == 0) $page = 1;                    //if no page var is given, default to 1.
    $prev = $page - 1;                            //previous page is page - 1
    $next = $page + 1;                            //next page is page + 1
    $lastpage = ceil($total_pages/$limit);        //lastpage is = total pages / items per page, rounded up.
    $lpm1 = $lastpage - 1;                        //last page minus 1
   
    /*
        Now we apply our rules and draw the pagination object.
        We're actually saving the code to a variable in case we want to draw it more than once.
    */
    $pagination = "";
    if($lastpage > 1)
    {   
        $pagination .= "<div class=\"pagination\">";
        //previous button
        if ($page > 1){
         
		    $pagination.= "<a onclick=\"setStateGet('adminTable2','".$targetpage."','page=".$prev."')\">&laquo; previous</a>";
		}
        else{
            $pagination.= "<span class=\"disabled\">&laquo; previous</span>";   
		}
        //pages   
        if ($lastpage < 7 + ($adjacents * 2))    //not enough pages to bother breaking it up
        {   
            for ($counter = 1; $counter <= $lastpage; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<span class=\"current\">$counter</span>";
                else
                    $pagination.= "<a  onclick=\"setStateGet('adminTable2','".$targetpage."','page=".$counter."')\">$counter</a>";                   
            }
        }
        elseif($lastpage > 5 + ($adjacents * 2))    //enough pages to hide some
        {
            //close to beginning; only hide later pages
            if($page < 1 + ($adjacents * 2))       
            {
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<span class=\"current\">$counter</span>";
                    else
                        $pagination.= "<a   onclick=\"setStateGet('adminTable2','".$targetpage."','page=".$counter."')\">$counter</a>";                   
                }
                $pagination.= "...";
                $pagination.= "<a onclick=\"setStateGet('adminTable2','".$targetpage."','page=".$lpm1."')\">$lpm1</a>";
                $pagination.= "<a  onclick=\"setStateGet('adminTable2','".$targetpage."','page=".$lastpage."')\">$lastpage</a>";       
            }
            //in middle; hide some front and some back
            elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
            {
                $pagination.= "<a  onclick=\"setStateGet('adminTable2','".$targetpage."','page=1')\">1</a>";
                $pagination.= "<a onclick=\"setStateGet('adminTable2','".$targetpage."','page=2')\">2</a>";
                $pagination.= "...";
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<span class=\"current\">$counter</span>";
                    else
                        $pagination.= "<a onclick=\"setStateGet('adminTable2','".$targetpage."','page=".$counter."')\">$counter</a>";                   
                }
                $pagination.= "...";
                $pagination.= "<a >$lpm1</a>";
                $pagination.= "<a onclick=\"setStateGet('adminTable2','".$targetpage."','page=".$lastpage."')\">$lastpage</a>";       
            }
            //close to end; only hide early pages
            else
            {
                $pagination.= "<a onclick=\"setStateGet('adminTable2','".$targetpage."','page=1')\">1</a>";
                $pagination.= "<a  onclick=\"setStateGet('adminTable2','".$targetpage."','page=2')\">2</a>";
                $pagination.= "...";
                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<span class=\"current\">$counter</span>";
                    else
                        $pagination.= "<a  onclick=\"setStateGet('adminTable2','".$targetpage."','page=".$counter."')\">$counter</a>";                   
                }
            }
        }
       
        //next button
        if ($page < $counter - 1)
            $pagination.= "<a  onclick=\"setStateGet('adminTable2','".$targetpage."','page=".$next."')\">next &raquo;</a>";
        else
            $pagination.= "<span class=\"disabled\">next  &raquo;</span>";
        $pagination.= "</div>\n";       
    }   
   
   
    return $pagination;
   
}



/*End Pagination*/



  /*imageResize - Resizes images of all types to the specified dimentions.
  Preserves image alpha channel information also*/
  
    function resize($src, $dst, $width, $height, $crop=0){

  if(!list($w, $h) = getimagesize($src)) return "Unsupported picture type!";

  $type = strtolower(substr(strrchr($src,"."),1));
  if($type == 'jpeg') $type = 'jpg';
  switch($type){
    case 'bmp': $img = imagecreatefromwbmp($src); break;
    case 'gif': $img = imagecreatefromgif($src); break;
    case 'jpg': $img = imagecreatefromjpeg($src); break;
    case 'png': $img = imagecreatefrompng($src); break;
    default : return "Unsupported picture type!";
  }

  // resize
  if(is_array($crop)){
	 // $_SESSION['crop'] = 'Is here.. reading crop array';
	   $ratio = max($width/$w, $height/$h);
	   
   if($w < $width or $h < $height){
	//$_SESSION['crop'].= "Picture is too small!".$ratio;
      
   }
   
    $h = $crop['height'];
    $x = $crop['x'];
    $w = $crop['width'];
	$y= $crop['y'];
	
  }
  else{
    if($w < $width and $h < $height) return "Picture is too small!";
    $ratio = min($width/$w, $height/$h);
    $width = $w * $ratio;
    $height = $h * $ratio;
    $x = 0;
	$y=0;
  }

  $new = imagecreatetruecolor($width, $height);

  // preserve transparency
  if($type == "gif" or $type == "png"){
    imagecolortransparent($new, imagecolorallocatealpha($new, 0, 0, 0, 127));
    imagealphablending($new, false);
    imagesavealpha($new, true);
  }

// $_SESSION['crop'].= "x:".$x."--y:".$y."--W:".$w."--H:".$h."--Width:".$width."--Height:".$height;
  imagecopyresampled($new, $img, 0, 0, $x, $y, $width, $height, $w, $h);

  switch($type){
    case 'bmp': imagewbmp($new, $dst); break;
    case 'gif': imagegif($new, $dst); break;
    case 'jpg': imagejpeg($new, $dst); break;
    case 'png': imagepng($new, $dst); break;
  }
  return true;
}

  
  function image_resize($src, $dst, $width, $height, $crop=0){

  if(!list($w, $h) = getimagesize($src)) return "Unsupported picture type!";

  $type = strtolower(substr(strrchr($src,"."),1));
  if($type == 'jpeg') $type = 'jpg';
  switch($type){
    case 'bmp': $img = imagecreatefromwbmp($src); break;
    case 'gif': $img = imagecreatefromgif($src); break;
    case 'jpg': $img = imagecreatefromjpeg($src); break;
    case 'png': $img = imagecreatefrompng($src); break;
    default : return "Unsupported picture type!";
  }

  // resize
  if(is_array($crop)){
	 // $_SESSION['crop'] = 'Is here.. reading crop array';
	   $ratio = max($width/$w, $height/$h);
	   
   if($w < $width or $h < $height){
	//$_SESSION['crop'].= "Picture is too small!".$ratio;
      
   }
   
    $h = $crop['height'];
    $x = $crop['x'];
    $w = $crop['width'];
	$y= $crop['y'];
	
  }
  else{
    if($w < $width and $h < $height) return "Picture is too small!";
    $ratio = min($width/$w, $height/$h);
    $width = $w * $ratio;
    $height = $h * $ratio;
    $x = 0;
	$y=0;
  }

  $new = imagecreatetruecolor($width, $height);

  // preserve transparency
  if($type == "gif" or $type == "png"){
    imagecolortransparent($new, imagecolorallocatealpha($new, 0, 0, 0, 127));
    imagealphablending($new, false);
    imagesavealpha($new, true);
  }

// $_SESSION['crop'].= "x:".$x."--y:".$y."--W:".$w."--H:".$h."--Width:".$width."--Height:".$height;
  imagecopyresampled($new, $img, 0, 0, $x, $y, $width, $height, $w, $h);

  switch($type){
    case 'bmp': imagewbmp($new, $dst); break;
    case 'gif': imagegif($new, $dst); break;
    case 'jpg': imagejpeg($new, $dst); break;
    case 'png': imagepng($new, $dst); break;
  }
  return true;
}


 //Functions for all Includes 
 
 function commonJS(){
   ?>
     <!-- js placed at the end of the document so the pages load faster -->
     
    <script type="text/javascript" src="<?php echo SECURE_PATH;?>theme/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo SECURE_PATH;?>theme/js/nprogress.js"></script>  
<script type="text/javascript" src="<?php echo SECURE_PATH;?>theme/js/ajaxfunction.js"></script>

 

<script type="text/javascript" src="<?php echo SECURE_PATH;?>theme/js/FusionCharts.js" ></script>  
<script type="text/javascript" src="<?php echo SECURE_PATH;?>assets/summernote/dist/summernote.js"></script>
<script type="text/javascript" src="<?php echo SECURE_PATH;?>theme/js/jquery.easy-autocomplete.min.js"></script> 
   <?php
 }
 
 function commonFooterJS(){

/*<script type="text/javascript" src="<?php echo SECURE_PATH;?>assets/js/jquery-1.7.2.min.js"></script>*/
 ?>

 <script type="text/javascript" src="<?php echo SECURE_PATH;?>theme/js/jquery-ui-1.9.2.custom.min.js"></script>
 <script type="text/javascript" src="<?php echo SECURE_PATH;?>theme/js/colorbox/jquery.colorbox.js"></script>
<script type="text/javascript" src="<?php echo SECURE_PATH;?>theme/js/upload/fileuploader.js"></script>

<script type="text/javascript" src="<?php echo SECURE_PATH;?>theme/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo SECURE_PATH;?>theme/js/jquery-blink.js"></script>

     <script src="<?php echo SECURE_PATH;?>theme/js/jquery.scrollTo.min.js"></script> 
     <!--<script src="<?php echo SECURE_PATH;?>theme/js/jquery.nicescroll.js" type="text/javascript"></script> -->

  
    <script src="<?php echo SECURE_PATH;?>theme/js/autoSuggestv14/jquery.autoSuggest.minified.js"></script>

    <script src="<?php echo SECURE_PATH;?>theme/js/jquery-migrate-1.2.1.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo SECURE_PATH;?>theme/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo SECURE_PATH;?>theme/js/respond.min.js" ></script>

    <!--right slidebar-->
    <script src="<?php echo SECURE_PATH;?>theme/js/slidebars.min.js"></script>

    <!--common script for all pages-->
    <script src="<?php echo SECURE_PATH;?>theme/js/common-scripts.js"></script>
    <script type="text/javascript" src="<?php echo SECURE_PATH;?>theme/js/jquery.autocomplete.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGVFePRTGPr9qz3tojU1_58_4RBTKCm0M&libraries=drawing,places"

       ></script>
    
 <?php
 }
 
 
 function commonCSS(){
?>

 <!-- Bootstrap core CSS -->
    <link href="<?php echo SECURE_PATH;?>theme/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo SECURE_PATH;?>theme/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link type="text/css" rel="stylesheet" href="<?php echo SECURE_PATH;?>theme/js/colorbox/colorbox.css" />
    <link href="<?php echo SECURE_PATH;?>theme/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
 <link href="<?php echo SECURE_PATH;?>theme/js/autoSuggestv14/autoSuggest.css" rel="stylesheet" />
  <link type="text/css" rel="stylesheet" href="<?php echo SECURE_PATH;?>theme/css/nprogress.css" />  
    
      <!--right slidebar-->
      <link href="<?php echo SECURE_PATH;?>theme/css/slidebars.css" rel="stylesheet">

    
    <!-- Custom styles for this template -->
    
    <link href="<?php echo SECURE_PATH;?>theme/css/style.css" rel="stylesheet">
    <link href="<?php echo SECURE_PATH;?>theme/css/style-responsive.css" rel="stylesheet" />

<link rel="stylesheet" type="text/css" href="<?php echo SECURE_PATH;?>theme/css/flick/jquery-ui-1.8.16.custom.css" />
<link type="text/css" rel="stylesheet" href="<?php echo SECURE_PATH;?>theme/js/upload/fileuploader.css" />
    <!--<link href="<?php echo SECURE_PATH;?>theme/css/jquery.autocomplete.css" rel="stylesheet">-->
    <link rel="stylesheet" type="text/css" href="<?php echo SECURE_PATH;?>theme/css/easy-autocomplete.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo SECURE_PATH;?>theme/css/easy-autocomplete.themes.min.css" />
<link rel="stylesheet" href="<?php echo SECURE_PATH;?>assets/summernote/dist/summernote.css" type="text/css">


 <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
<?php
}

function commonUserCSS(){
?>
<link rel="stylesheet" type="text/css" href="<?php echo SECURE_PATH;?>assets/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo SECURE_PATH;?>assets/css/custom.css" />
<?php

}
   
function genCustomerId(){
	global $database;
   $customerid = 'RCI';
   $customer_sel = $database->query("SELECT id FROM customers");
   $count = mysqli_num_rows($customer_sel);
   $count++;
   
   $customerid.= date('ym').'0'.$count;
   
     $check = $database->query("SELECT customerId FROM customers WHERE customerId = '".$customerid."'");
	
	   if(mysqli_num_rows($check) > 0){
          return $this->genCustomerId();
	    }
		else
		{
		return $customerid;
		}
}


function scheduleIcon($schedule){
	
	$schedule = strtolower($schedule);

	
	if(strpos($schedule, 'tea') !== false || strpos($schedule, 'coffee') !== false){
	  ?>
   <i class="icon-coffee icon-3x"></i> 
      <?php
	}
	else if(strpos($schedule, 'breakfast') !== false || strpos($schedule, 'tiffin') !== false){

	  ?>
       <i class="icon-fire icon-3x"></i>
      <?php
	}

	else if(strpos($schedule, 'lunch') !== false || strpos($schedule, 'dinner') !== false){

	  ?>
   <i class="icon-food icon-3x"></i>  
      <?php
	}

	else if(strpos($schedule, 'snacks') !== false || strpos($schedule, 'packed') !== false || strpos($schedule, 'other') !== false){

	  ?>
      <i class="icon-shopping-cart icon-3x"></i>
      <?php
	}

	

}


function generateBill(){
	global $database;
	
	$bill = BILL_PREFIX;
	$bill_sel = $database->query("SELECT * FROM billing");
	
	return ($bill.date('my').(mysqli_num_rows($bill_sel)+1));
}


function floorToFraction($number, $denominator = 1)
{
    $x = $number * $denominator;
    $x = floor($x);
    $x = $x / $denominator;
    return $x;
}

function ceilToFraction($number, $denominator = 1)
{
    $original  = $x = $number * $denominator;
    
	$x = ceil($x);
	
    $x = $x / $denominator;
	
	if(($x-$original) >= 0.25){
	  $x = $this->floorToFraction($number,$denominator);
	}
	
    return $x;
}

};


/**
 * Initialize session object - This must be initialized before
 * the form object because the form uses session variables,
 * which cannot be accessed unless the session has started.
 */
$session = new Session;

/* Initialize form object */
$form = new Form;

?>