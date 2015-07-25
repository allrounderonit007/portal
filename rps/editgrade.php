<?php
require_once('../includes/initialize.php');
    if (! $session->is_logged_in() ){
        session_start();
    }
    if( ! isset($_SESSION['user_id']) ){
        header("location:../login.php");
    }
    $u_id = $_SESSION['user_id'];
    if(isset($_POST['grade'])){
        
        if(isset($_POST['g'])){
            
            $grade = $_POST['g'];
            $s5 = $_SESSION['sem'];
            $s6 = $_SESSION['student'];
            $dhams = mysqli_connect('localhost', 'root', '', 'portal');
            $kams = "UPDATE rps SET grade=$grade WHERE s_rps_id = $s6 AND rps_semester = $s5 AND supervisor=$u_id";
            $lams = mysqli_query($dhams, $kams);
            
            
            
            //header("location: select.php");
            ?>
<script>
                        alert('Grade Submitted');
                        window.location.href='rps_f.php';
                        </script>
                        <?php
        }
    }