<?php
include_once('../includes/initialize.php');
$u_id = $_SESSION['user_id'];
//echo($u_id);
$fuf = mysqli_connect('localhost', 'root', '', 'portal');
if(isset($_POST['btn-upload']))
{    
     
 $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="../student uploads/";
 
 // new file size in KB
 $new_size = $file_size/1024;  
 // new file size in KB
 
 // make file name in lower case
 $new_file_name = strtolower($file);
 // make file name in lower case
 
 $final_file=str_replace(' ','-',$new_file_name);
 
 if(move_uploaded_file($file_loc,$folder.$final_file))
 {
  $late = "SELECT stud_report FROM phd_comp WHERE stud_id=$u_id";
  $e = mysqli_query($fuf, $late);
  $er = mysqli_fetch_array($e);
  $final_e = $folder.$er[0];
  unlink($final_e);
  $late="UPDATE phd_comp SET stud_report = '$final_file',s_type='$file_type',s_size='$new_size' WHERE stud_id=$u_id";
  $e =mysqli_query($fuf,$late);
  ?>
  <script>
  alert('successfully uploaded');
        window.location.href='Cmpr.php?success';
        </script>
  <?php
 }
 else
 {
  ?>
  <script>
  alert('error while uploading file');
        window.location.href='Cmpr.php?fail';
        </script>
  <?php
 }
}
?>