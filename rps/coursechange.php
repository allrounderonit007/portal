<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once('../includes/config.php');
require_once('../includes/initialize.php');

$chalo2 = connection();
$u_id = $_SESSION['user_id'];

if(isset($_POST['press'])){
    
    $idf = $_POST['c1'];
    $idf1 = $_POST['c2'];
    $idf2 = $_POST['c3'];
    $idf3 = $_POST['c4'];
    $idf4 = $_POST['c5'];
    
    //echo($course1);
    $sem = $_SESSION['editsem'];
    //echo($sem);
    if($idf=="0"){
            //$out[0]= "NA";
        }
        else{

        
        //echo($out[0]);
        $que3 = "UPDATE rps SET course1='$idf' WHERE s_rps_id=$u_id AND rps_semester=$sem";
        $sol1 = mysqli_query($chalo2,$que3);
        
        
        
        }
        
        if($idf1=="0"){
            //$out1[0]="NA";
        }
        else{
        $que3 = "UPDATE rps SET course2='$idf1' WHERE s_rps_id=$u_id AND rps_semester=$sem";
        $sol1 = mysqli_query($chalo2,$que3);
        }
        
        if($idf2=="0"){
            //$out2[0]=NA;
        }
        else{
        $que3 = "UPDATE rps SET course3='$idf2' WHERE s_rps_id=$u_id AND rps_semester=$sem";
        $sol1 = mysqli_query($chalo2,$que3);
        }
        
        if($idf3=="0"){
            //$out3[0]=NA;
        }
        else{
        $que3 = "UPDATE rps SET course4='$idf3' WHERE s_rps_id=$u_id AND rps_semester=$sem";
        $sol1 = mysqli_query($chalo2,$que3);
        }
        
        if($idf4=="0"){
            //$out4[0]=NA;
        }
        else{


        $que3 = "UPDATE rps SET course5='$idf4' WHERE s_rps_id=$u_id AND rps_semester=$sem";
        $sol1 = mysqli_query($chalo2,$que3);
        }
        
    header("location: rps.php");
}

