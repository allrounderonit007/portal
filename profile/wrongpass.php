<!DOCTYPE html>

<html>
    
      <?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once("../includes/initialize.php");
if (! $session->is_logged_in() ){
        session_start();
    }
    if( ! isset($_SESSION['user_id']) ){
        header("location:../login.php");
    }
    
 
//session_start();
echo("<script> type='text/javascript'>alert('THIS IS A WRONG PASSWORD.'); window.location.href='../profile/editprofile.php';</script>");

?>
    
    <br>
    
    <head>
        
        
            
    
    </head>
    
    <body>
        
      
        
        <!--a href="editprofile.php">UPDATE PASSWORD</a-->

        
</body>
</html>