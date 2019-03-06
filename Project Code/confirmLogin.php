<?php


$email = $_POST['email'];
$pass = $_POST['password'];

$conn = mysqli_connect('localhost','root','','cse_299');

$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$pass'";
$result = mysqli_query($conn,$sql);

$rowcount = mysqli_num_rows($result);

if($rowcount == 1)
{
	session_start();
	$_SESSION['login'] = true;
	$_SESSION['email'] = $email;

	while ($row = mysqli_fetch_assoc($result))
	{
		$_SESSION['usr_id'] = $row['usr_id'];
	}


	$_SESSION['pass'] = $pass;
	header("Location: chart.php");
}
	
else echo "Email/Pass incorrect";

?>