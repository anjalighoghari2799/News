<?php 
$hostname = "localhost";
$dbname = "news-site";
$dbuname = "root";
$dbpass = "";

  $conn =  mysqli_connect($hostname,$dbuname,$dbpass,$dbname) or die("Connection error..");
?>