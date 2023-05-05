<?php 
 
// Database configuration 
$dbHost     = "localhost"; 
$dbUsername = "root"; 
$dbPassword = ""; 
$dbName     = "pi"; 

// Create database connection 
$db =new mysqli($dbHost, $dbUsername, $dbPassword, $dbName); 
 
// Check connection 
if (!$db) { 
    echo"connection failed";
} 
?>