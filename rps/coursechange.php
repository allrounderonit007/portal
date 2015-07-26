<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once('../includes/config.php');
require_once('../includes/initialize.php');

$usf = connection();
$u_id = $_SESSION['user_id'];

if(isset($_POST['press'])){
    
    $course1 = $_POST['c1'];
    $course2 = $_POST['c2'];
    $course3 = $_POST['c3'];
    $course4 = $_POST['c4'];
    
    //echo($course1);
    $sem = $_SESSION['editsem'];
    //echo($sem);
    $usp = "UPDATE rps SET course1 = '$course1', course2 = '$course2', course3 = '$course3', course4 = '$course4' WHERE rps_semester =$sem AND s_rps_id = $u_id";
    
    $resu = mysqli_query($usf, $usp);
    header("location: rps.php");
}

