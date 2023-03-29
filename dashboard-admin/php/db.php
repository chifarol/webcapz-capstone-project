<?php
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
    category_name VARCHAR(100) NOT NULL,
    parent_category INT(4) UNSIGNED
    )";

if (mysqli_query($conn, $create_categories)) {
} else {
    echo "<br>";
    echo "Error creating categories table" . mysqli_error($conn);
}
