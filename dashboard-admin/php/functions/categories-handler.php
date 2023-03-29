<?php
if (
    $_SERVER["REQUEST_METHOD"] === "GET"
) {
    if (
        isset($_POST['new-category']) &&
        isset($_POST['parent-category'])
    ) {
        $colors = ["status" => "successful"];
        json_encode($colors);
    }
}
