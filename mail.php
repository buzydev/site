<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// include PHPMailerAutoload.php
//Load Composer's autoloader
require 'vendor/autoload.php';


// create an instance of php mailer
$mail = new PHPMailer();

// set a host
$mail->Host = 'smtp.gmail.com';

// enable smtp
$mail->isSMTP(); // Your hosting provider may not need this

// set authentication to true
$mail->SMTPAuth = true;

// set login details for gmail account
$mail->Username = 'youremail@gmail.com';
$mail->Password = 'yourpassword';

// set type of protection
$mail->SMTPSecure = 'ssl'; // or we can use TLS

// set port
$mail->Port = 465; // 587 if TLS

// set subject
$mail->Subject = "Test Email";

// set body
$mail->Body = "This is our body";

// set who is sending an email
$mail->setFrom(address:'youremail@gmail.com', name:'your name' );

// set who you are sending to
$mail->addAddress(address:'buzydevtechnologies@gmail.com');

// send an email
//$mail->send() // it returns true or false
try{
    $mail->send();
    echo 'successful';
} catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
// if($mail->send())
// {
// echo 'successful';
// }else{
//     echo 'something went wrong';
// }




