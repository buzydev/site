<?php
$host = "localhost";
$db = "site";
$user = "root";
$pwd = "";

$conn = mysqli_connect($host,$user,$pwd,$db);
//$conn = new mysqli($host,$user,$pwd,$db);

if (mysqli_connect_errno()) {
    die("Connection failed: " . $conn->connect_error);
  }

