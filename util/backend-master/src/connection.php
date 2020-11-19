<?php


// Use PDO
// $conn = new PDO("mysql:host=localhost;dbname=dbmysql", DB_USER, DB_PASS);

mysqli_report(MYSQLI_REPORT_ERROR);
$conn = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);