<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start(); 
$error=''; 
if (!empty($_POST)) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
require 'connection.php';
$conn = Connect();
$query = "SELECT username, password FROM customer WHERE username='$username' AND password='$password' LIMIT 1";
$result = mysqli_query($conn,$query);
$fetch = mysqli_fetch_assoc($result);
if ($fetch)  
{	$_SESSION['login_user2']=$fetch['username']; // Initializing Session
	header("location: payment.php"); // Redirecting To Other Page
} else {
$error = "Username or Password is invalid";
}
mysqli_close($conn); // Closing Connection
}
}
?>