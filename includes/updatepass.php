<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//echo("Hello");
require_once('initialize.php');

if (! $session->is_logged_in() ){
        session_start();
    }
    if( ! isset($_SESSION['user_id']) ){
        header("location:../login.php");
    }

$kis = mysqli_connect('localhost', 'root', '', 'portal');

$user = $_SESSION['user_id'];
//echo($user);
$message="You have entered wrong password";

$tep = "SELECT password FROM user WHERE user_id =$user ";
//$temp = $_SESSION['password'];
$ans = mysqli_query($kis, $tep);
$row = mysqli_fetch_array($ans);

//echo($temp);

    if(isset($_POST['submit']))
    {
    if($row['password'] == $_POST['current'])
    {
      if($_POST['newpass'] == $_POST['retype'])
      {
        $_SESSION['password']= $_POST['newpass'];
        $new = $_POST['newpass'];
        //echo($new);
        $tep = "UPDATE user SET password = '$new' WHERE user_id = '$user'";
        
        $row = mysqli_query($kis, $tep);
        if(! $row )
        {
            die('Could not update data: ' . mysqli_error($kis));
        }
        header("location:../homepage.php");
        mysqli_close($kis);
      }
 else {
          header("location: ../profile/wrongpass.php");
      mysqli_close($kis);
      }
    }
    else
    { 
      
      header("location: ../profile/wrongpass.php");
      mysqli_close($kis);
    }        
  }
