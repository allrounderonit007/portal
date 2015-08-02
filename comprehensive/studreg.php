<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */require_once('../includes/initialize.php');
 include_once('../includes/config.php');
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
    
    //$enter = $_SESSION['user_id'];
    
    $cun = connection();
    
    if($cpi>=7){
        $tun = "UPDATE student SET status = 1, CPI=$cpi WHERE s_id = $u_id";
        $sql = "SELECT name FROM student WHERE s_id=$u_id";
        $a = mysqli_query($cun, $sql);
        $b = mysqli_fetch_array($a);
        
        $sql2 = "INSERT INTO phd_comp values('0','NA','$u_id','$b[0]','NA','0','0','NA','','NA','','NA','','NA','','NA','0')";
        $result2 = mysqli_query($cun, $sql2);
        
    }
    else{
        $tun = "UPDATE student SET status = 0, CPI=$cpi WHERE s_id = $u_id";
    }
                                 
    $more = mysqli_query($cun, $tun);
    header("location: Cmpr.php");
}

}