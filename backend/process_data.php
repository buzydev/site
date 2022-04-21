<?php
include 'sanitize.php';
//process_data.php

if(isset($_POST["first_name"]))
{
	sleep(5);
	$connect = new PDO("mysql:host=localhost; dbname=site", "root", "");

	$success = '';

	$first_name = $_POST["first_name"];
	$last_name = $_POST["last_name"];

	$email = $_POST["email"];
	$password = $_POST['password'];

	

	$first_name_error = '';
	$last_name_error = '';
	$email_error = '';
	$password_error = '';


	if(empty($first_name))
	{
		$first_name_error = 'First name is Required';
	}
	else
	{
		if(!preg_match("/^[a-zA-Z-' ]*$/", $first_name))
		{
			$first_name_error = 'Only Letters and White Space Allowed';
		}
	}

	if(empty($last_name))
	{
		$last_name_error = 'Last name is Required';
	}
	else
	{
		if(!preg_match("/^[a-zA-Z-' ]*$/", $last_name))
		{
			$last_name_error = 'Only Letters and White Space Allowed';
		}
	}

	if(empty($email))
	{
		$email_error = 'Email is Required';
	}
	else
	{
		if(!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$email_error = 'Email is invalid';
		}
	}

	if(empty($password))
	{
	  $password_error = 'password can not be empty';
	  //return;
	}else {

		if(strlen($password) < 8)
	{
	   $password_error = 'Your password cannot be less than 8';
	}

	}
	
	
	
  

	
// check if email is available 
// $email_available = "SELECT * FROM user WHERE  email = $email";
// $statement = $connect->prepare($email_available);
// $statement->execute($email_available);
// if( $statement->execute($email_available))
// {
// 	$email_error = 'Email is already available';
	
// }


	if($first_name_error == '' && $last_name_error == '' && $email_error == '' && $password_error == '')
	{
		//put insert data code here 

		$data = array(

			':first_name'=>	sanitize($first_name),
			':last_name' =>	sanitize($last_name),
			':email' =>sanitize($email),
			':password'	=> sanitize($password),
			
		);

		

		 $query = "
		INSERT INTO user 
		(first_name,last_name, email, password) 
		VALUES (:first_name,:last_name, :email, :password)
		";

		$statement = $connect->prepare($query);

		$statement->execute($data);

		$success = '<div class="alert alert-success">Data Saved</div>';
	}
//echo 'not working';
	$output = array(
		'success'		=>	$success,
		'first_name_error'	=>	$first_name_error,
		'last_name_error'	=>	$last_name_error,
		'email_error'	=>	$email_error,
		'password_error'	=>	$password_error,
		
	);

	echo json_encode($output);
	
}

?>

