<?php
include_once('../includes/initialize.php');
include_once('../includes/config.php');
$u_id = $_SESSION['user_id'];

if(isset($_POST['f_sub'])){

        $chalo2 = connection();
        $sd = $_SESSION['macho'];
        $sem = $_SESSION['sem'];
        //echo($sem);
        $idf = $_POST['fid'];
        //echo($idf);
        $idf1 = $_POST['fid1'];
        //echo($idf1);
        $idf2 = $_POST['fid2'];
        //echo($idf2);
        $idf3 = $_POST['fid3'];
        //echo($idf3);
        $idf4 = $_POST['fid4'];
        //echo($idf4);
        //echo($sd);
        //echo($idf);
        //echo($idf2);
        if($idf=="0"){
            //$out[0]= "NA";
        }
        else{

        $just = "SELECT name FROM faculty WHERE faculty_id=$idf";
        $sol = mysqli_query($chalo2, $just);
        $out = mysqli_fetch_array($sol);
        //echo($out[0]);
        $que3 = "UPDATE synopsis SET syn_convenor_id=$idf,syn_con_name='$out[0]' WHERE syn_std_id=$sd AND attempt=$sem";
        $sol1 = mysqli_query($chalo2,$que3);
        
        
        
        }
        
        if($idf1=="0"){
            //$out1[0]="NA";
        }
        else{
        $just = "SELECT name FROM faculty WHERE faculty_id=$idf1";
        $sol = mysqli_query($chalo2, $just);
        $out1 = mysqli_fetch_array($sol);
        
        $que3 = "UPDATE synopsis SET comm_1=$idf1,comm1_name='$out1[0]' WHERE syn_std_id=$sd AND attempt=$sem";
        $sol1 = mysqli_query($chalo2,$que3);
        }
        
        if($idf2=="0"){
            //$out2[0]=NA;
        }
        else{
        $just = "SELECT name FROM faculty WHERE faculty_id=$idf2";
        $sol = mysqli_query($chalo2, $just);
        $out2 = mysqli_fetch_array($sol);
        
        $que3 = "UPDATE synopsis SET comm_2=$idf2,comm2_name='$out2[0]' WHERE syn_std_id=$sd AND attempt=$sem";
        $sol1 = mysqli_query($chalo2,$que3);
        }
        
        if($idf3=="0"){
            //$out3[0]=NA;
        }
        else{
        $just = "SELECT name FROM faculty WHERE faculty_id=$idf3";
        $sol = mysqli_query($chalo2, $just);
        $out3 = mysqli_fetch_array($sol);
        
        $que3 = "UPDATE synopsis SET comm_3=$idf3,comm3_name='$out3[0]' WHERE syn_std_id=$sd AND attempt=$sem";
        $sol1 = mysqli_query($chalo2,$que3);
        }
        
        if($idf4=="0"){
            //$out4[0]=NA;
        }
        else{


        $just = "SELECT name FROM faculty WHERE faculty_id=$idf4";
        $sol = mysqli_query($chalo2, $just);
        $out4 = mysqli_fetch_array($sol);
        $que3 = "UPDATE synopsis SET comm_4=$idf4,comm4_name='$out4[0]' WHERE syn_std_id=$sd AND attempt=$sem";
        $sol1 = mysqli_query($chalo2,$que3);
        }
        
        header("location: synopsis_a.php");
        

        


}