<?php
function is_session_started()
{
    if (php_sapi_name() !== 'cli') {
        if (version_compare(phpversion(), '5.4.0', '>=')) {
            return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
        } else {
            return session_id() === '' ? FALSE : TRUE;
        }
    }
    return FALSE;
}

// Example
if (is_session_started() === FALSE) {
    session_start();
}

$servername = $_SERVER['HTTP_HOST'] != "localhost" ? "sql104.byethost6.com" : "localhost";
$username = $_SERVER['HTTP_HOST'] != "localhost" ? "b6_33489148" : "root";
$password = $_SERVER['HTTP_HOST'] != "localhost" ? "65393180fa" : "";
$dbname = $_SERVER['HTTP_HOST'] != "localhost" ? "b6_33489148_swiss_blog" : "swiss_blog";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function sanitize_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}