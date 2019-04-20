<?php 
session_start();


$email = $_SESSION['email'];
$usr_id = $_SESSION['usr_id'];
$cid = $_SESSION['cid'];

if($_GET["qid"])
{
$qid = $_GET['qid'];
}


$number = count($_POST['answer']);

//insert student's answers

if($number>0)
{
	require "connection.php";

	for($i=0; $i<$number; $i++)
	{	
		$temp = $i + 1; //this is current answer number
		$temp2 = $_POST['answer'][$i];

		$sql = "INSERT INTO answers VALUES('$usr_id','$qid','$temp','$temp2')";
		mysqli_query($conn, $sql);
		//echo $_POST['answer'][$i] . " ";
	}
}

//grade student's answers

if($number>0)
{
	require "connection.php";

	$temp_array = array();

	for($i=0; $i<$number; $i++)
	{	
		$temp = $i + 1; //this is current question number
		

		$sql = "
          SELECT correct 
          FROM options
          WHERE qid = '$qid' AND quesno = '$temp' AND num = '1'";

		$result = mysqli_query($conn, $sql);

		while ($row = mysqli_fetch_assoc($result))
	      {
	        $temp_array[$i] = $row['correct'];
	      }
		
	}

	$mark = 0;

	for($i=0; $i<$number; $i++)
	{
		if($_POST['answer'][$i] == $temp_array[$i]) $mark++;
	}

	$sql = "INSERT INTO marks VALUES('$cid','$qid','$usr_id','$mark')";
	mysqli_query($conn, $sql);

	header("Location: landing_student.php");
}

?>