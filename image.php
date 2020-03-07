<?php
require "conn.php";

$query=mysqli_query($conn,"SELECT * FROM employees");
if($query)
{
	while($row=mysqli_fetch_array($query))
	{
		$flag[]=$row;
	}
	print(json_encode($flag));
}
mysqli_close($conn);
?>