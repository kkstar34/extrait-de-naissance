<?php 
$db = new PDO("mysql:host=localhost;dbname=extrait", 'root', '');
$db->exec("set names utf8");
session_start();
?>

