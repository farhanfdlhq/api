<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Allow-Headers: Content-Type");

$conn = new mysqli("localhost", "root", "", "flutter");
$data = json_decode(file_get_contents("php://input"));

$id = $data->id;

$query = "DELETE FROM biodata WHERE id='$id'";
$result = mysqli_query($conn, $query);

if ($result) {
    echo json_encode(["message" => "Data deleted successfully"]);
} else {
    echo json_encode(["message" => "Failed to delete data"]);
}
