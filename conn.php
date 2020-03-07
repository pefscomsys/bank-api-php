<?php

//suppress errors in order for not to distort the json response 
error_reporting(0);

$db_name="user_database";
$password="sofocol";
$username="sofocol";
$servername="localhost";
$conn=mysqli_connect($servername,$username,$password,$db_name);
