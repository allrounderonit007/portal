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
    
    if(isset($_POST['g-s'])){
        
        if(isset($_POST['grade'])){
            
            $grade = $_POST['grade'];
            $s = $_SESSION['macho'];
            
            $dham = connection();
            $attempt = $_SESSION['attempt'];
            $entering;
            if($grade=="sat"){
                $entering="SATISFACTORY";
            }
            else
                if($grade=="un"){
                    $entering="UNSATISFACTORY";
                }
                else{
                    $entering="in";
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