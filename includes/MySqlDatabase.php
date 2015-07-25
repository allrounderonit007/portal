<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once(LIB_PATH.DS.'config.php');

$DB_SERVER = 'localhost';
$DB_USER = 'root';
$DB_PASS = '';
$DB_NAME = 'portal';

//create connection

$conn = connection();

if($conn->connect_error){
    die("Connection Failed: ".$conn->connect_error );
}

//mysqli_close($conn);
