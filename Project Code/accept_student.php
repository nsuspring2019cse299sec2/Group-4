<?php

require "connection.php";

if($_GET["sid"])
{
	$sid = $_GET['sid'];
}

if($_GET["cid"])
{
	$cid = $_GET["cid"];
}

$sql = "UPDATE enrolled
		SET accepted = 1
		WHERE sid = $sid AND cid = $cid";

mysqli_query($conn, $sql);




header("Location: landing.php");
exit;	



?>