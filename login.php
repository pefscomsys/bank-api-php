<?php

require "conn.php";
//$email=$_POST["email"];
$email="abcd";
//$password=$_POST["password"];
$password="1234";

//prepare the responses to be sent 
$response = [
	"status" => false,
	"message" => "",
	"user_info" => []
];


if($conn){
	
	$sqCheckUsername="Select * From user_tables where email like '$email'";

	$result=mysqli_query($conn,$sqCheckUsername);

	$number=mysqli_num_rows($result);
		
	if($number>0)
	{
			
		echo $sqlogin="Select * From user_tables where email='$email' and password='$password'";
		
		$resultt=mysqli_query($conn,$sqlogin);

		$numbers=mysqli_num_rows($resultt);

		if($numbers>0){

			//get the user details 
			$query = "SELECT * FROM `user_tables` WHERE `email`  = '$email' LIMIT 1";
			$result = mysqli_query($conn, $query);

			while($row = mysqli_fetch_object($result))
			{
				//save the user 
				$username = $row->username;
				$tel = $row->mobile;
				$gender = $row->gender;
				$user_id = $row->id;

				//save these to the response 
				$response['user_info']["username"] = $username;
				$response['user_info']['user_id'] = $user_id;
				$response['user_info']['tel'] = $tel;
				$response['user_info']['gender'] = $gender;

				//add further information here  (static information)
				//like account number
			}

			//now prepare the response 
			$response['status'] = true;
			$response['message'] = "Login Successful";

		}
		else{
			//wrong password 
			$response['message'] = "The account you use we can't recognised it";
		}
			
	}	
	else{
		//status in response is already false. no need to change it explicitly
		$response['message'] = "This email is not Registered";
	}
	
	
}
else{
	
	$response['message'] = "connection Error";	
	
}

//now send out the response.
//You could also add json headers in order for it to be handled better by some
//applications.. but am just gonna send plain json formatted text
echo json_encode($response); die();
?>