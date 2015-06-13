<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$connection = mysqli_connect("localhost", "root", "","portal");
// Selecting Database
//$db = mysql_select_db("company", $connection);
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['uid'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysql_query("select username from login where username='$user_check'", $connection);
$row = mysql_fetch_assoc($ses_sql);
$login_session =$row['username'];
if(!isset($login_session)){
mysql_close($connection); // Closing Connection
header('Location: index.php'); // Redirecting To Home Page
}
