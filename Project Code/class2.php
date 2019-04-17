<?php

session_start();

$tid = $_SESSION['usr_id'];
$cname = $_POST['cname'];
$today = date("Y-m-d"); 
$random = substr(md5(rand()), 0, 6);

/*echo $tid . "<br>";
echo $cname . "<br>";
echo $today . "<br>";
echo $random;*/

require "connection.php";
if($conn) {
	$sql = "INSERT INTO class VALUES(NULL,'$tid','$cname','$today','$random');";
	mysqli_query($conn, $sql);
	header("Location: class.php?success=1");
}
else 
{
	header("Location: class.php?error=1");
}

?>