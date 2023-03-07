<?php
header('Content-Type: application/json; charset=utf-8');
// An associative array
$marks = array("Peter" => 65, "Harry" => 80, "John" => 78, "Clark" => 90);

if (isset($_POST['email'])) {
    $response = ["status" => "ok", "email" => $_POST['email']];
    echo json_encode($response);
} else {
    echo json_encode($marks); // outputs {"Peter":65,"Harry":80,"John":78,"Clark":90}
}
