<?php
require "conn.php";
$firstname=$_POST["firstname"];

$lastname=$_POST["lastname"];

$age=$_POST["lastname"];

IF($conn){
	if(empty($firstname)){
		
		echo "Firstname must be filled";
	}else{
		//$sqCheckUsername="Select * From students where username like '$username'";
		//$usernameQuery=mysqli_query($conn,$sqCheckUsername);
		//if(mysqli_num_rows($usernameQuery)>0)
		//{
		//	echo "user name is already added type another one";
		//}else{
			$sql_register="insert into students (firstname,lastname,age) values('$firstname','$lastname','$age')";
			mysqli_query($conn,$sql_register);
			echo "user name is already added type another one";
		}
	}
else{
	
echo "connection Error";	
	
}
?>