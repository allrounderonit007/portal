<?php
include_once('../includes/initialize.php');
include_once('../includes/config.php');
$u_id = $_SESSION['user_id'];

if(isset($_POST['f_sub'])){

        $chalo2 = connection();
        $sd = $_SESSION['macho'];
        $idf = $_POST['fid'];
        $idf1 = $_POST['fid1'];
        $idf2 = $_POST['fid2'];
        $idf3 = $_POST['fid3'];
        $idf4 = $_POST['fid4'];
        //echo($sd);
        //echo($idf);
        //echo($idf2);
        if($idf==''){
            $out[0]= "NA";
        }
        else{

        $just = "SELECT name FROM faculty WHERE faculty_id=$idf";
        $sol = mysqli_query($chalo2, $just);
        $out = mysqli_fetch_array($sol);
        }
        
        if($idf1==''){
            $out1[0]="NA";
        }
        else{
        $just = "SELECT name FROM faculty WHERE faculty_id=$idf1";
        $sol = mysqli_query($chalo2, $just);
        $out1 = mysqli_fetch_array($sol);
        }
        
        if($idf2==''){
            $out2="NA";
        }
        else{
        $just = "SELECT name FROM faculty WHERE faculty_id=$idf2";
        $sol = mysqli_query($chalo2, $just);
        $out2 = mysqli_fetch_array($sol);
        }
        
        if($idf3==''){
            $out3="NA";
        }
        else{
        $just = "SELECT name FROM faculty WHERE faculty_id=$idf3";
        $sol = mysqli_query($chalo2, $just);
        $out3 = mysqli_fetch_array($sol);
        }
        
        if($idf4==''){
            $out4="NA";
        }
        else{


        $just = "SELECT name FROM faculty WHERE faculty_id=$idf4";
        $sol = mysqli_query($chalo2, $just);
        $out4 = mysqli_fetch_array($sol);
        }
        $que3 = "UPDATE rps SET supervisor = '$idf', super_name='$out[0]', comm1 = '$idf1', comm1_name='$out1[0]', comm2 = '$idf2', comm2_name='$out2[0]', comm3 = '$idf3', comm3_name='$out3[0]',comm4 = '$idf4', comm4_name='$out4[0]' WHERE stud_id = '$sd'";
        $sol = mysqli_query($chalo2, $que3);

        if ($sol){
            $que = "UPDATE student SET supervisor = '$idf'";
            ?>
        <script>
            alert('DETAILS UPDATED');
            window.location.href="rps_a.php";
        </script>
        <?php
        }
        else{
            ?>
        <script>
            alert('COULD NOT UPDATE');
            window.location.href="rps_a.php";
        </script>
        <?php
        }


}