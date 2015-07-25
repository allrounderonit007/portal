<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */require_once('../includes/initialize.php');
 include_once('..includes/config.php');
    if (! $session->is_logged_in() ){
        session_start();
    }
    if( ! isset($_SESSION['user_id']) ){
        header("location:../login.php");
    }
    $u_id = $_SESSION['user_id'];

if(isset($_POST['studreg'])){
    if(isset($_POST['cpi'])){
        
    $cpi = $_POST['cpi'];
    
    $enter = $_SESSION['user_id'];
    
    $cun = connection();
    
    if($cpi>=7){
        $tun = "UPDATE student SET status = 1, CPI=$cpi WHERE s_id = $enter";
    }
    else{
        $tun = "UPDATE student SET status = 0, CPI=$cpi WHERE s_id = $enter";
    }
                                 
    $more = mysqli_query($cun, $tun);
    header("location: Cmpr.php");
}

}