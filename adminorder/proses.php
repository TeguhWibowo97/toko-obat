<?php
include 'function.php';
 
$query = mysqli_query($conn, "SELECT * FROM pesan WHERE idpesan='".mysqli_escape_string($conn, $_POST['idpesan'])."'");
$data = mysqli_fetch_array($query);
 
echo json_encode($data);