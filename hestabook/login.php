<?php
require "connection.php";
if (isset($_POST["loginsubmit"])) {
	# code...
$email=$_POST['email'];
$password=$_POST['password'];
		#var_dump($email);
$qry="select * from user where email='$email' and password='$password';";
$q="insert into loggedin (email) values ('$email');";
$row=$conn->query($qry);
		$result = $row->fetch_assoc();
		if (is_array($result)){
			session_start();
			$_SESSION["mail"]=$result[email];
			$_SESSION["name"]=$result[name];
			var_dump($_SESSION);
			if($conn->query($q) === TRUE)
				header("location:connect.php");
			}
		else
		{
			$q="select * from user where email='$email';";
			$r=$conn->query($q);
			$s=$r->fetch_assoc();
			echo"</br>";
			if(is_array($s)){
				echo "wrong password";
				header("location:newlogin.php");
			}
			else
			{
				echo "wrong credential";
				header("location:newlogin.php");
			}
		}
	}
else 
	echo "nothing";
	?>