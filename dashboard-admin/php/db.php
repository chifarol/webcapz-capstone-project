<?php
// check if a session already exists
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

if ($_SESSION['is_admin'] !== true) {
    header('Location: /webcapz-capstone-project/dashboard-admin/php/login.php');
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "swiss_blog";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$create_table = "CREATE TABLE IF NOT EXISTS posts (
    id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    post_title VARCHAR(100) NOT NULL,
    post_content TEXT(30) NOT NULL,
    post_image_path VARCHAR(100) NOT NULL,
    category_id INT(2) DEFAULT 0,
    published_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    last_modified_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if (mysqli_query($conn, $create_table)) {
} else {
    echo "Error creating post table" . mysqli_error($conn);
    echo "<br>";
}
$create_categories = "CREATE TABLE IF NOT EXISTS categories (
    id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(100) NOT NULL UNIQUE,
    parent_category_id INT(4) UNSIGNED
    )";

if (mysqli_query($conn, $create_categories)) {
} else {
    echo "<br>";
    echo "Error creating categories table" . mysqli_error($conn);
}
$create_media = "CREATE TABLE IF NOT EXISTS media (
    id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    media_url VARCHAR(255) NOT NULL UNIQUE,
    media_type VARCHAR(15),
    published_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

if (mysqli_query($conn, $create_media)) {
} else {
    echo "<br>";
    echo "Error creating media table" . mysqli_error($conn);
}