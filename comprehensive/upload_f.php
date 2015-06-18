<?php
include_once('../includes/initialize.php');
$u_id = $_SESSION['user_id'];
$sidi = $_SESSION['macho'];
//echo($u_id);
$fuf = mysqli_connect('localhost', 'root', '', 'portal');
if(isset($_POST['btn-upload']))
{    
     
 $file = $_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="../faculty uploads/";
 if(!is_dir($folder.$u_id)){
     $folder = "../faculty uploads/$sidi/";
     mkdir($folder);
 }
 else {
     $folder = "../faculty uploads/$sidi/";
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
    window.location.href='Cmpr.php?exists';
</script>
<?php
 }
 else{
     if(move_uploaded_file($file_loc,$folder.$final_file))
 {
  $late = "SELECT fac_report FROM phd_comp WHERE stud_id=$sidi";
  $e = mysqli_query($fuf, $late);
  $er = mysqli_fetch_array($e);
  //echo($er);
  if($er[0]=="NA"){
      
  }
  else{
      $final_e = $folder.$er[0];
      unlink($final_e);
  }
  
  $late="UPDATE phd_comp SET fac_report = '$final_file',s_type='$file_type',s_size='$new_size' WHERE stud_id=$sidi";
  $e =mysqli_query($fuf,$late);
  ?>
  <script>
  alert('successfully uploaded');
        window.location.href='Cmpr_f.php?success';
        </script>
  <?php
 }
 else
 {
  ?>
  <script>
  alert('error while uploading file');
        window.location.href='Cmpr_f.php?fail';
        </script>
  <?php
 }
 }
 
}
?>