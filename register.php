<?php
require "conn.php";
/*$username="Abdo";

$email="abdo@gmail.com";

$password="123456";

$mobile="02220000";

$gender="Male";
*/
$username=$_POST["username"];

$email=$_POST["email"];

$password=$_POST["password"];

$mobile=$_POST["mobile"];

$gender=$_POST["gender"];
//$isValidEmail=filter_var($email,Filter_VALIDATE_EMAIL);

//prepare the response 
$response = [
	"status" => true,
	"message" => "",
	"errors" => []
];

IF($conn){
	
		/*$sqCheckUsername="Select * From user_table where username like '$username'";
		$usernameQuery=mysqli_query($conn,$sqCheckUsername);
		if(mysqli_num_rows($usernameQuery,0)>0)
		{
			echo "user name is already added type another one";
		}else{*/
			$sql_register="insert into user_tables 
			(username,email,mobile,gender)
			values('$username','$email','$mobile','$gender')";
			if(mysqli_query($conn,$sql_register)){
				//registration successful 
				$response['message'] = "Successdully Registered";
				
			}
			else{
				$response['status'] = false;
				$response['message'] = "Fail to Register";
			}
					
	
	
}else{
	
$response['status'] = false;
$response['message'] = "Database Connection Error";	
	
}

//send the response 
echo json_encode($response); die();
?>