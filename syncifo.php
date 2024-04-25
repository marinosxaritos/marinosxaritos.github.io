<?php
$user_name = "marinos";
$password = "password";
$server = "localhost";
$db_name = "contactsdb";
//$responce = array();
$con = mysqli_connect($server, $user_name, $password, $db_name);
if($con)
{
	$Name = $_POST['name'];
	$LastName = $_POST['last_name']; //add last_name field
	$Date = $_POST['date']; //add date field
	$Time = $_POST['time']; 
	$Address = $_POST['address'];
	$License = $_POST['license'];
	
	

	//Prepare the query with placeholders
	$query = "insert into contacts(name, last_name, date, time, address, license) values('".$Name."', '".$LastName."', '".$Date."', '".$Time."', '".$Address."', '".$License."');";
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
	