<?php

session_start();

$sid = $_SESSION['usr_id'];
$ccode = $_POST['ccode'];
$ID = $_POST['ID'];


require "connection.php";
if($conn) {
	$sql = "
		SELECT *
        FROM class
        WHERE code = '$ccode'
	";

	$result = mysqli_query($conn,$sql);

	$rowcount = mysqli_num_rows($result);

	if($rowcount!=0) 
	{
		while ($row = mysqli_fetch_assoc($result))
		{
			$temp = $row['cid'];
		}

		$sql = "INSERT INTO enrolled VALUES('$sid','$temp',0,'$ID')";
		mysqli_query($conn,$sql);

		header("Location: class.php?success=1");

	}



	//
}
else 
{
	header("Location: join_class.php?error=1");
}

?>