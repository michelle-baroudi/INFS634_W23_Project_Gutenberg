<?php
$server = 'localhost:8889';
$username = 'root';
$password = 'Yes';
$database = 'project gutenberg';
try{
$conn = new PDO("mysql:host=$server;dbname=$database;", $username,
$password);
} catch(PDOException $e){
die( "Connection failed: " . $e->getMessage());
}
?>