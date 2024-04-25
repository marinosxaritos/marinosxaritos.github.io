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
	$Cause = $_POST['cause'];
	$Distance = $_POST['distance'];
	$Rescued = $_POST['rescued'];
	$License = $_POST['license'];
	
	$queryId = "select MAX(id) as lastid from contacts WHERE license = '$License';";
	$result_id = mysqli_query($con, $queryId);
	if (mysqli_num_rows($result_id) > 0) 
	{
		$row = mysqli_fetch_assoc($result_id);
		$ContactId = $row["lastid"];
		
	}
	
	

	//Prepare the query with placeholders
	$query = "insert into outside_water_insident(flag, cause, distance, rescued, contacts_id) values('".$Flag."', '".$Cause."', '".$Distance."', '".$Rescued."', '".$ContactId."');";
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