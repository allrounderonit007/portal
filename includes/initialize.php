<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('DS') ? null : define('DS' , DIRECTORY_SEPARATOR);
	
defined('SITE_ROOT') ? null :
		define('SITE_ROOT' ,'C:' . DS .'wamp' . DS . 'www' . DS . 'portal');
	
	defined('LIB_PATH') ? null :
		define('LIB_PATH' , SITE_ROOT .DS.'includes' );
	
	defined('SITE_NAME') ? null :
		define('SITE_NAME' , 'USPMES-PhD' );
		
	defined('FOOTER') ? null :
		define('FOOTER' , 'Copyright &copy DA-IICT');
        
//require_once(LIB_PATH . DS .'config.php');
//require_once(LIB_PATH . DS .'MySqlDatabase.php');
require_once('session.php');
//require_once(LIB_PATH . DS . 'checklogin.php');
//require_once(LIB_PATH . DS . 'registration.php');
//require_once(LIB_PATH . DS . 'updatepass.php');
//require_once(LIB_PATH . DS . 'logout.php');
        

