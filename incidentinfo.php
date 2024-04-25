<?php
$user_name = "marinos";
$password = "password";
$server = "localhost";
$db_name = "contactsdb";
//$responce = array();
$con = mysqli_connect($server, $user_name, $password, $db_name);
if($con)
{
	$Flag = $_POST['flag'];
	
	

	//Prepare the query with placeholders
	$query = "insert into incidents(flag) values('".$Flag."');";
	$result = mysqli_query($con, $query);
	//$response = array();
	if($result)
	{
		$status = 'OK';
		
		
		
		
	}
	else
	{
		$status = 'FAILED';
	
	
	}
}

else { $status = 'FAILED'; }

	echo json_encode(array("response"=>$status));
	
mysqli_close($con);

?>