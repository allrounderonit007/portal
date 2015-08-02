<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once('../includes/initialize.php');
include_once('../includes/config.php');
    if (! $session->is_logged_in() ){
        session_start();
    }
    if( ! isset($_SESSION['user_id']) ){
        header("location:../login.php");
    }
    $u_id = $_SESSION['user_id'];
    if(isset($_POST['g-s'])){
        
        if(isset($_POST['grade'])){
            
            $grade = $_POST['grade'];
            $s = $_SESSION['macho'];
            echo($s);
            $dham = connection();
            $attempt = $_SESSION['attempt'];
            echo($attempt);
            $entering;
            $studname = $_SESSION['stud_name'];
            echo($studname);
            if($grade=="sat"){
                $entering="SATISFACTORY";
                $kam = "INSERT INTO rps VALUES ('1','','NA','$s','$studname','NA','','','','','NA','NA','NA','NA','NA','NA','NA','NA','NA','NA','NA','NA','NA','NA','NA')";
               $lam = mysqli_query($dham, $kam);
               
            }
            else
                if($grade=="un"){
                    $entering="UNSATISFACTORY";
                    $atta = $attempt+1;
                    if($atta==2){
                        $kam = "UPDATE student SET status=5 WHERE s_id=$s";
                        $lam = mysqli_query($dham,$kam);
                    }
                    else{
                        
                    $sql2 = "INSERT INTO phd_comp values('0','NA','$s','$studname','NA','0','0','NA','','NA','','NA','','NA','','NA','$atta')";
                    $result2 = mysqli_query($dham, $sql2);
                    }
                }
                else{
                    $entering="INCOMEPLETE";
                    $atta = $attempt +1;
                    if($atta==2){
                        $kam = "UPDATE student SET status=5 WHERE s_id=$s";
                        $lam = mysqli_query($dham,$kam);
                    }
                    else{
                    $sql2 = "INSERT INTO phd_comp values('0','NA','$s','$studname','NA','0','0','NA','','NA','','NA','','NA','','NA','$atta')";
                    $result2 = mysqli_query($dham, $sql2);
                    }
                }
            $kam = "UPDATE phd_comp SET pass='$entering' WHERE stud_id = $s AND attempt=$attempt";
            $lam = mysqli_query($dham, $kam);
            
            if($grade=="sat"){
                $kam = "UPDATE student SET status=2 WHERE s_id = $s";
            $lam = mysqli_query($dham, $kam);
            }
            
            
            //header("location: select.php");
            ?>
<script>
                        alert('Grade Submitted');
                        window.location.href='Cmpr_f.php';
                        </script>
                        <?php
        }
    }