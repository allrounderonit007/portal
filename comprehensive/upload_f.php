<?php
include_once('../includes/initialize.php');
include_once('../includes/config.php');
$u_id = $_SESSION['user_id'];
$sidi = $_SESSION['macho'];
$att = $_SESSION['attempt'];
//echo($u_id);
$fuf = connection();
if(isset($_POST['btn-upload']))
{    
     
 $file = $_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="../comp_uploads/faculty/";
 if(!is_dir($folder.$sidi)){
     $folder = "../comp_uploads/faculty/$sidi/";
     mkdir($folder);
 }
 else {
     $folder = "../comp_uploads/faculty/$sidi/";
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
  
  //echo($er);
  
  
  $late="UPDATE phd_comp SET fac_report = '$final_file',f_type='$file_type',f_size='$new_size' WHERE stud_id=$sidi AND attempt=$att";
  $e =mysqli_query($fuf,$late);
  if($e){
      echo("hello");
  }
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