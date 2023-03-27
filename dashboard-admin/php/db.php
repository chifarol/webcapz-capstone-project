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

$sql = "CREATE TABLE IF NOT EXISTS posts (
    id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    post_title VARCHAR(100) NOT NULL,
    post_content TEXT(30) NOT NULL,
    post_image_path VARCHAR(100) NOT NULL,
    category_id INT(2) DEFAULT 0,
    published_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    last_modified_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if (mysqli_query($conn, $sql)) {
    echo "post table created successfully";
} else {
    echo "Error creating post table: " . mysqli_error($conn);
}

mysqli_close($conn);
