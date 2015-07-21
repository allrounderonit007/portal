<?php 
include_once('../includes/initialize.php');
$u_id = $_SESSION['user_id'];

if(isset($_POST['f_sub'])){
    if(isset($_POST['fid'])){
        $chalo2 = mysqli_connect('localhost', 'root', '', 'portal');
        $sd = $_SESSION['macho'];
        $idf = $_POST['fid'];
        $idf2 = $_POST['comm'];
        //echo($sd);
        //echo($idf);
        //echo($idf2);
        $que3 = "UPDATE phd_comp SET supervisor_id = '$idf', comm_mem = '$idf2' WHERE stud_id = '$sd'";
        $sol = mysqli_query($chalo2, $que3);
        if ($sol){
            ?>
        <script>
            alert('DETAILS UPDATED');
            window.location.href="Cmpr_a.php";
        </script> 
        <?php
        }
        else{
            ?>
        <script>
            alert('COULD NOT UPDATE');
            window.location.href="Cmpr_a.php";
        </script>
        <?php
        }
        
    }
}