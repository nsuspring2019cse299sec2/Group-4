<?php

session_start();

if($_GET["cid"])
      {
        $cid = $_GET['cid'];
      }


$name=-10;
$quesno = -10;
$time = -10;


$name = $_POST['name'];
$quesno = $_POST['quesno'];
$time = $_POST['time'];

$flag = 0;

if($name==-10) $flag=1;
if($quesno==-10) $flag=1;
if($time==-10) $flag=1;

if($flag==0)
{
  require "connection.php";

  if($conn) 
  {
  $sql = "INSERT INTO quiz VALUES(NULL,'$cid','$name','$quesno','$time');";
  mysqli_query($conn, $sql);

  $sql = "SELECT qid 
          FROM quiz
          WHERE cid = '$cid'";

  mysqli_query($conn, $sql);
  $result = mysqli_query($conn,$sql);

  $qid=0;

  while ($row = mysqli_fetch_assoc($result))
      {
        if($row['qid']>$qid) $qid = $row['qid'];
      }
    header("Location: quiz3.php?cid=". $cid . "&qid=" .$qid);
    exit;
  }
  else 
  {
    header("Location: quiz.php?error=1");
    exit;
  }
}

else 
{
  header("Location: quiz.php?error=1");
  exit;
}
?>

