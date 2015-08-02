<?php

require_once('../includes/initialize.php');
include_once('../includes/config.php');
    if (! $session->is_logged_in() ){
        session_start();
    }
    if( ! isset($_SESSION['user_id']) ){
        header("location:../login.php");
    }
    $u_id = $_SESSION['user_id'];
    
    if(isset($_POST['sub'])){
        
        if(isset($_POST['rad'])){
            
            $bram = connection();
            $value = $_POST['rad'];
            
            $studname = $_SESSION['stud_name'];
            $studnumber = $_SESSION['student'];
            $sem = $_SESSION['sem'];
            if($value="YES"){
                $query = "INSERT INTO synopsis VALUES ('$studnumber','','$studname','NA','0','','','','','NA','NA','NA','NA','NA','NA','NA')";
                $res = mysqli_query($bram, $query);
                $query = "UPDATE student set status = 3 WHERE s_id=$studnumber";
                $res = mysqli_query($bram, $query);
            }
            else{
                $query = "INSERT INTO rps VALUES ('$sem+1','','NA','$studnumber',$studname','NA','','','','','NA','NA','NA','NA','NA','NA','NA','NA','NA','NA','NA','NA','NA','NA','NA')";
                $res = mysqli_query($bram, $query);
                
            }
            
            header("location: rps_f.php");
        }
        
    }