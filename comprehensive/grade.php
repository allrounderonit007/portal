<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once('../includes/initialize.php');
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
            $dham = mysqli_connect('localhost', 'root', '', 'portal');
            $kam = "UPDATE phd_comp SET comp_grade=$grade WHERE stud_id = $s";
            $lam = mysqli_query($dham, $kam);
            
            if($grade<'3'){
                $kam = "UPDATE phd_comp SET pass='F' WHERE stud_id = $s";
            $lam = mysqli_query($dham, $kam);
            }
            else{
                $kam = "UPDATE phd_comp SET pass='P' WHERE stud_id = $s";
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