<?php
@session_start();
  ob_start();
 $servername = "localhost";
 $username = "unclesam";
 $password = "123456";
 $database = "samcoin";

 // Create connection
 $conn = new mysqli($servername, $username, $password, $database);

 $conn -> set_charset("utf8");
?>