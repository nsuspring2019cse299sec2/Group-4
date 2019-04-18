<?php

session_start();
$quesno = $_SESSION['quesno'];
$currques = $_SESSION['currques'];

$cid = $_SESSION['cid'];
$qid = $_SESSION['qid'];

$quescontent= -10;
$opcontent_1 = -10;
$opcontent_2 = -10;
$opcontent_3 = -10;
$opcontent_4 = -10;
$op_correct = -10;


$quescontent= $_POST['quescontent'];
$opcontent_1 = $_POST['opcontent_1'];
$opcontent_2 = $_POST['opcontent_2'];
$opcontent_3 = $_POST['opcontent_3'];
$opcontent_4 = $_POST['opcontent_4'];
$op_correct = $_POST['op_correct'];


$flag = 0;

if($quescontent == -10) $flag=1;
if($opcontent_1 == -10) $flag=1;
if($opcontent_2 == -10) $flag=1;
if($opcontent_3 == -10) $flag=1;
if($opcontent_4 == -10) $flag=1;
if($op_correct == -10) $flag=1;


if($flag==0)
{

	require "connection.php";
	 
	$sql = "INSERT INTO questions VALUES('$qid','$currques','$quescontent');";
	mysqli_query($conn, $sql);

	$sql = "INSERT INTO options VALUES ('$qid','$currques','1','$opcontent_1','$op_correct'),('$qid','$currques','2','$opcontent_2','$op_correct'),('$qid','$currques','3','$opcontent_3','$op_correct'),('$qid','$currques','4','$opcontent_4','$op_correct');";
	mysqli_query($conn, $sql);

	$currques++;
	$_SESSION['currques'] = $currques;

	header("Location: quiz3.php");
  	exit;
}
else
{
	header("Location: quiz3.php?error=1");
  	exit;
}

?>