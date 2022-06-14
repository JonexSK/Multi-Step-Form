<?php 

session_start();

error_reporting(0);

require 'db.php';

$id = $_GET['id'];

$result = mysqli_query($con, "DELETE FROM data WHERE id=$id");

header("Location: table.php");

?>
