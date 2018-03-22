<?php 
error_reporting(-1);
require "connection.php";
$name=htmlspecialchars($_POST["name"]);
$email=htmlspecialchars($_POST["email"]);
$mobile=(int)htmlspecialchars($_POST["mobile"]);
$password=htmlspecialchars($_POST["password"]);
$gender=htmlspecialchars($_POST['gender']);
$dob=date("Y-m-d",strtotime($_POST['DOB']));
$address=htmlspecialchars($_POST['addr']);
$descr=htmlspecialchars($_POST["description"]);
$img=$_POST["picture"];

$sql = "INSERT INTO user (name, email,mobile,password,gender,dob,address,description,picture) VALUES ('$name', '$email',$mobile,'$password','$gender','$dob','$address','$descr','$img');";
		if ($conn->query($sql) === TRUE) 
		{
			$msg='YOU ARE RREGISTRED';
      echo "alert.($msg)";
      header("location:newlogin.php");

	} 
	else
	 {
    	echo "Error: " . $sql . "<br>" . $conn->error;
		}
?>