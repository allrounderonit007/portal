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
            $s = $_SESSION['stud_id'];
            //echo($s);
            $dham = connection();
            $attempt = $_SESSION['attempt'];
            //echo($attempt);
            $entering;
            $studname = $_SESSION['stud_name'];
            //echo($studname);
            if($grade=="sat"){
                $entering="MINOR CHANGES";
                
               
            }
            else
                if($grade=="un"){
                    $entering="MAJOR CHANGES";
                    $att = $attempt + 1;
                    
                    if($att==2){
                        $kam = "UPDATE student SET status=6 WHERE s_id = $s";
                        $lam = mysqli_query($dham, $kam);
                    }
                    else{
                    //echo("Helllo");
                    $sql2 = "INSERT INTO synopsis values('$s','0','$studname','NA','$att','','','','','NA','NA','NA','NA','NA','NA','NA')";
                    $result2 = mysqli_query($dham, $sql2);
                    }
                }
                else{
                    $entering="INCOMPLETE";
                    $att = $attempt + 1;
                    if($att==2){
                        $kam = "UPDATE student SET status=6 WHERE s_id = $s";
                        $lam = mysqli_query($dham, $kam);
                    }
                    else{
                    $sql2 = "INSERT INTO synopsis VALUES ('$s','','$studname','NA','$attempt+1','','','','','NA','NA','NA','NA','NA','NA','NA')";
                    $result2 = mysqli_query($dham, $sql2);
                    }
                }
            $kam = "UPDATE synopsis SET grade='$entering' WHERE stud_id = $s AND attempt=$attempt";
            $lam = mysqli_query($dham, $kam);
            
            if($grade=="sat"){
                $kam = "UPDATE student SET status=4 WHERE s_id = $s";
            $lam = mysqli_query($dham, $kam);
            }
            
            
            //header("location: select.php");
            ?>
<script>
                        alert('Grade Submitted');
                        window.location.href='synopsis_f.php';
                        </script>
                        <?php
        }
    }