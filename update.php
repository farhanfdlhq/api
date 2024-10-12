<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: Content-Type");

$conn = new mysqli("localhost", "root", "", "flutter");
$data = json_decode(file_get_contents("php://input"));

$id = $data->id;
$nama = $data->nama;
$kelamin = $data->kelamin;
$agama = $data->agama;
$alamat = $data->alamat;

$query = "UPDATE biodata SET nama='$nama', kelamin='$kelamin', agama='$agama', alamat='$alamat' WHERE id='$id'";
$result = mysqli_query($conn, $query);

if ($result) {
    echo json_encode(["message" => "Data updated successfully"]);
} else {
    echo json_encode(["message" => "Failed to update data"]);
}
