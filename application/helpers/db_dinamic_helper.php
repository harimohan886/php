<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	function switch_db_dinamico() {
	 	$language = '';
	    $selectedlanguage = 'en';

	    if(isset($_SESSION['lang']) && !empty($_SESSION['lang'])){
	        $session_language=$_SESSION['lang'];
	        if($session_language == "ar" || $session_language === "ar") {
	            $language = 'ar';
	        } else {
	            $language = 'en';
	        }
	    } else {
	        $language = 'en';
	    }

    	$post_language=isset($_POST['locale']) ? $_POST['locale']:"";

     	if (isset($post_language) && !empty($post_language)) {
            
            if($post_language == 'ar') {
                // check session _exist or not 
                $_SESSION['lang'] = $post_language;

                if(isset($_SESSION['lang']) && !empty($_SESSION['lang'])){
                    $session_language=$_SESSION['lang'];
                    if($session_language === "ar" ) {
                        $name_db = "db_ar";
                        $_SESSION['lang'] = $post_language;
                    } else {
                        $name_db = "default";
                        $_SESSION['lang'] = $post_language;
                    }
                } else {
                    $name_db = "db_ar";
                    $_SESSION['lang'] = $post_language;
                }
            } else {
                $_SESSION['lang'] = $post_language;
                if(isset($_SESSION['lang']) && !empty($_SESSION['lang'])){
                    $session_language=$_SESSION['lang'];
                    if($session_language == "ar" || $session_language === "ar") {
                        $name_db = "db_ar";
                        $_SESSION['lang'] = $post_language;
                    } else {
                        $name_db = "default";
                        $_SESSION['lang'] = $post_language;
                    }
                } else {
                    $name_db = "default";
                    $_SESSION['lang'] = $post_language;
                }
            }
        } else {
            if(isset($_SESSION['lang']) && !empty($_SESSION['lang'])){
                $session_language=$_SESSION['lang'];
                if($session_language == "ar" || $session_language === "ar") {
                    $name_db = "db_ar";
                    $_SESSION['lang'] = $language;
                } else {
                    $name_db = "default";
                    $_SESSION['lang'] = $language;
                }
            } else {
                $name_db = "default";
                $_SESSION['lang'] = $language;
            }
        }

	return $name_db;
}