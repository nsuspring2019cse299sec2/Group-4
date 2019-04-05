<?php


$email = $_POST['email'];
$pass = $_POST['password'];
$usr_type = $_POST['usr_type'];

$conn = mysqli_connect('localhost','root','','cse_299');

if (!$conn) {
    header("Location: index.php?error=1");
}

if($usr_type=='Teacher')
{

	$sql = "SELECT * FROM t_users WHERE email = '$email' AND pass = '$pass'";
	$result = mysqli_query($conn,$sql);

	$rowcount = mysqli_num_rows($result);

	if($rowcount == 1)
	{
		session_start();
		$_SESSION['login'] = true;
		$_SESSION['email'] = $email;
		$_SESSION['usr_type'] = $usr_type;
		$_SESSION['pass'] = $pass;

		while ($row = mysqli_fetch_assoc($result))
		{
			$_SESSION['usr_id'] = $row['tid'];
		}


		header("Location: landing.php");


	}
		
	else 

		header("Location: index.php?error=1");

}

else
{

	$sql = "SELECT * FROM s_users WHERE email = '$email' AND pass = '$pass'";
	$result = mysqli_query($conn,$sql);

	$rowcount = mysqli_num_rows($result);

	if($rowcount == 1)
	{
		session_start();
		$_SESSION['login'] = true;
		$_SESSION['email'] = $email;
		$_SESSION['usr_type'] = $usr_type;
		$_SESSION['pass'] = $pass;

		while ($row = mysqli_fetch_assoc($result))
		{
			$_SESSION['usr_id'] = $row['sid'];
		}


		header("Location: landing_student.php");


	}
		
	else 

		header("Location: index.php?error=1");
}


?>