<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

$conn = new mysqli("localhost", "root", "", "flutter");
$query = mysqli_query($conn, "select * from biodata");
$data = mysqli_fetch_all($query, MYSQLI_ASSOC);
echo json_encode($data);
