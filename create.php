<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

$conn = new mysqli("localhost", "root", "", "flutter");
$data = json_decode(file_get_contents("php://input"));
if (!$data || empty($data->nama) || empty($data->kelamin) || empty($data->agama) || empty($data->alamat)) {
    echo json_encode(["message" => "Invalid data"]);
    exit;
}


$nama = $data->nama;
$kelamin = $data->kelamin;
$agama = $data->agama;
$alamat = $data->alamat;

$query = "INSERT INTO biodata (nama, kelamin, agama, alamat) VALUES ('$nama', '$kelamin', '$agama', '$alamat')";
$result = mysqli_query($conn, $query);

if ($result) {
    echo json_encode(["message" => "Data added successfully"]);
} else {
    echo json_encode(["message" => "Failed to add data"]);
}
