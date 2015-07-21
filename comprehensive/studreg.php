<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */require_once('../includes/initialize.php');
    if (! $session->is_logged_in() ){
        session_start();
    }
    if( ! isset($_SESSION['user_id']) ){
        header("location:../login.php");
    }
    $u_id = $_SESSION['user_id'];

if(isset($_POST['studreg'])){
    
    $enter = $_SESSION['user_id'];
    $cun = mysqli_connect('localhost', 'root', '', 'portal');
    $tun = "UPDATE student SET status = 1 WHERE s_id = $enter";                             
    $more = mysqli_query($cun, $tun);
    header("location: Cmpr.php");
}

