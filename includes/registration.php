<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(isset($_POST['register'])){

/*if($connection->connect_errno > 0){
    die('Unable to connect to database [' . $connection->connect_error . ']');
}
?>

<?php*/

$uname = $_POST['username'];
$id = $_POST['id'];
$pass = $_POST['password'];
$name = $_POST['name'];
$cat = $_POST['category'];

$connection = mysqli_connect('localhost', 'root', '', 'portal');

$sql = "INSERT INTO user values('$id','$uname','$pass','$name','$cat')";

$result = mysqli_query($connection,$sql);

if($result){
    
    //$loc = "C:\wamp\www\portal\thanks.php";
    //echo "<script> $().alert('Successful Signup');</script>";
    header("Location: ../login.php");
    //exit();
    
    
    mysqli_close($connection);
}
else
{
    echo "<script> alert('Unsuccesful Signup');</script>";
    header("Location: ..\login.php");
    mysqli_close($connection);
}

}