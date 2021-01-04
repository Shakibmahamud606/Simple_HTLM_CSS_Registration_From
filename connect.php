<?php
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$password = $_POST['password'];
$number = $_POST['number'];

// Database connectio
if (!empty($firstName) && !empty($lastName) && !empty($email) && !empty($password) && !empty($number)) {
	if (!preg_match("/^[a-zA-Z\s]+$/", $firstName)) {
		echo "Please Only String For First Name";
	} elseif (!preg_match("/^[a-zA-Z\s]+$/", $lastName)) {
		echo "Please Only String For Last Name";
	} elseif (!preg_match("/^[0-9]*$/", $number)) {
		echo "Please Only Number For Your Phone Number";
	} elseif (strlen($number) < 11) {
		echo "Give Us A Proper Number";
	} else {
		$sk = mysqli_connect("localhost", "root", "", "log");
		$sql_query = "select * from data where first_name = '$firstName' and last_name = '$lastName' and email ='$email' and phn = '$number' and pass='$password'";
		$start = mysqli_query($sk, $sql_query);
		$query = 'insert into data(first_name,last_name,email,phn,pass) values("' . $firstName . '","' . $lastName . '","' . $email . '","' . $password . '","' . $number . '")';
		$add   = mysqli_query($sk, $query);
		$output = mysqli_num_rows($start);
		echo " login successfull ";
	}
} else {
	echo " <span style='color:red;'>Please  give all  Info</span> ";
}
