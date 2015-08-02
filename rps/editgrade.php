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
    
    //FOR COURSE 1
    if(isset($_POST['grade1'])){
        
        if(isset($_POST['g'])){
            
            $grade = $_POST['g'];
            $s = $_SESSION['sem'];
            
            $dham = connection();
            
            $entering;
            $stud = $_SESSION['student'];
            if($grade=="sat"){
                $entering="SATISFACTORY";
                
               
            }
            else
                if($grade=="un"){
                    $entering="UNSATISFACTORY";
                    
                }
                else{
                    $entering="INCOMPLETE";
                    
                }
            $kam = "UPDATE rps SET grade1=$grade WHERE s_rps_id = $stud AND rps_semester = $s AND supervisor=$u_id";
            $lam = mysqli_query($dham, $kam);
            
            
            
            
            //header("location: select.php");
            ?>
<script>
                        alert('Grade Submitted');
                        window.location.href='rps_f.php';
                        </script>
                        <?php
        }
    }
    
    //FOR COURSE 2
    if(isset($_POST['grade2'])){
        
        if(isset($_POST['g'])){
            
            $grade = $_POST['g'];
            $s = $_SESSION['sem'];
            
            $dham = connection();
            
            $entering;
            $stud = $_SESSION['student'];
            if($grade=="sat"){
                $entering="SATISFACTORY";
                
               
            }
            else
                if($grade=="un"){
                    $entering="UNSATISFACTORY";
                    
                }
                else{
                    $entering="INCOMPLETE";
                    
                }
            $kam = "UPDATE rps SET grade2=$grade WHERE s_rps_id = $stud AND rps_semester = $s AND supervisor=$u_id";
            $lam = mysqli_query($dham, $kam);
            
            
            
            
            //header("location: select.php");
            ?>
<script>
                        alert('Grade Submitted');
                        window.location.href='rps_f.php';
                        </script>
                        <?php
        }
    }
    
    //FOR COURSE 3
    if(isset($_POST['grade3'])){
        
        if(isset($_POST['g'])){
            
            $grade = $_POST['g'];
            $s = $_SESSION['sem'];
            
            $dham = connection();
            
            $entering;
            $stud = $_SESSION['student'];
            if($grade=="sat"){
                $entering="SATISFACTORY";
                
               
            }
            else
                if($grade=="un"){
                    $entering="UNSATISFACTORY";
                    
                }
                else{
                    $entering="INCOMPLETE";
                    
                }
            $kam = "UPDATE rps SET grade3=$grade WHERE s_rps_id = $stud AND rps_semester = $s AND supervisor=$u_id";
            $lam = mysqli_query($dham, $kam);
            
            
            
            
            //header("location: select.php");
            ?>
<script>
                        alert('Grade Submitted');
                        window.location.href='rps_f.php';
                        </script>
                        <?php
        }
    }
    
    //FOR COURSE 4
    if(isset($_POST['grade4'])){
        
        if(isset($_POST['g'])){
            
            $grade = $_POST['g'];
            $s = $_SESSION['sem'];
            
            $dham = connection();
            
            $entering;
            $stud = $_SESSION['student'];
            if($grade=="sat"){
                $entering="SATISFACTORY";
                
               
            }
            else
                if($grade=="un"){
                    $entering="UNSATISFACTORY";
                    
                }
                else{
                    $entering="INCOMPLETE";
                    
                }
            $kam = "UPDATE rps SET grade4=$grade WHERE s_rps_id = $stud AND rps_semester = $s AND supervisor=$u_id";
            $lam = mysqli_query($dham, $kam);
            
            
            
            
            //header("location: select.php");
            ?>
<script>
                        alert('Grade Submitted');
                        window.location.href='rps_f.php';
                        </script>
                        <?php
        }
    }
    
    //FOR COURSE 5
    if(isset($_POST['grade5'])){
        
        if(isset($_POST['g'])){
            
            $grade = $_POST['g'];
            $s = $_SESSION['sem'];
            
            $dham = connection();
            
            $entering;
            $stud = $_SESSION['student'];
            if($grade=="sat"){
                $entering="SATISFACTORY";
                
               
            }
            else
                if($grade=="un"){
                    $entering="UNSATISFACTORY";
                    
                }
                else{
                    $entering="INCOMPLETE";
                    
                }
            $kam = "UPDATE rps SET grade5=$grade WHERE s_rps_id = $stud AND rps_semester = $s AND supervisor=$u_id";
            $lam = mysqli_query($dham, $kam);
            
            
            
            
            //header("location: select.php");
            ?>
<script>
                        alert('Grade Submitted');
                        window.location.href='rps_f.php';
                        </script>
                        <?php
        }
    }