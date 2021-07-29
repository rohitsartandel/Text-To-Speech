<!--
Here, we write code for registration.
-->
<?php
require_once('connection.php');
$fname = $lname = $gender = $email = $password = $pwd = '';

$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$pwd = $_POST['password'];
$user_data = 'email='. $email. '&name='. $fname;
if(empty($_POST["password"])){
	echo "<script>alert('Password should not be empty');</script>";
	exit();
}elseif(!(strlen($_POST["password"])>6
	 and preg_match('/[A-Z]/',$_POST["password"])
			 and preg_match('/[0-9]/',$_POST["password"])
			 and preg_match('/[a-z]/',$_POST["password"])
	)
   ){
	echo "<script>alert('Password must contain atleast one Uppercase letter and one number');</script>";
	
	exit(); 
}else{

}
$password = MD5($pwd);

$sql = "INSERT INTO tbluser (Firstname,Lastname,Gender,Email,Password) VALUES ('$fname','$lname','$gender','$email','$password')";
$result = mysqli_query($conn, $sql);
if($result)
{
	header("Location: login.php");
}
else
{
	echo "Error :".$sql;
}
?>