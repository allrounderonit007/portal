<?php
require_once('../includes/initialize.php');
include_once('../includes/config.php');

$u_id = $_SESSION['user_id'];
//$si = $_SESSION['student'];
//$di = $_SESSION['editsem'];
//echo($u_id);
$plesis = connection();
if(isset($_POST['btn-upload']))
{    
     
 $file = $_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="../synopsis/student";
 if(!is_dir($folder.$u_id)){
     $folder = "../synopsis/student/$u_id/";
     mkdir($folder);
 }
 else {
     $folder = "../synopsis/student/$u_id/";
 }
 
 $uploadok = 1;
 
 // new file size in KB
 $new_size = $file_size/1024;  
 // new file size in KB
 
 // make file name in lower case
 $new_file_name = strtolower($file);
 // make file name in lower case
 
 $final_file=str_replace(' ','-',$new_file_name);
 
 if(file_exists($folder.$final_file)){
     $uploadok = 0; 
 }
 
 if($uploadok==0){
     ?>
<script>
    alert('Filename exists');
    window.location.href='synopsis.php?exists';
</script>
<?php
 }
 else{
     if(move_uploaded_file($file_loc,$folder.$final_file))
 {
  $late = "SELECT stud_report FROM synopsis WHERE syn_std_id=$u_id";
  $e = mysqli_query($plesis, $late);
  $err = mysqli_fetch_array($e);
  //echo($er);
  if($err[0]=="NA"){
      
  }
  else{
      $final_e = $folder.$err[0];
      unlink($final_e);
  }
  
  $late="UPDATE synopsis SET stud_report = '$final_file' WHERE syn_std_id=$u_id";
  $e =mysqli_query($plesis,$late);
  ?>
  <script>
  alert('successfully uploaded');
        window.location.href='synopsis.php?success';
        </script>
  <?php
 }
 else
 {
  ?>
  <script>
  alert('error while uploading file');
        window.location.href='synopsis.php?fail';
        </script>
  <?php
 }
 }
 
}