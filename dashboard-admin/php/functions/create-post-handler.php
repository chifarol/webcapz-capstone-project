<?php
require('./db.php');
$error_msg = "";
if (
    $_SERVER["REQUEST_METHOD"] === "POST"
) {
    if (
        isset($_POST['submit-post']) &&
        isset($_POST['post-title']) &&
        isset($_POST['post-content']) &&
        isset($_POST['post-image-url']) &&
        isset($_POST['category'])
    ) {
        global $conn;

        $create_post = "INSERT INTO posts (
                post_title,
                post_content,
                post_image_path,
                category_id)
            VALUES (?,?,?,?)";

        if ($stmt = mysqli_prepare($conn, $create_post)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param(
                $stmt,
                "sssi",
                $post_title,
                $post_content,
                $post_image,
                $post_category
            );

            /* Set the parameters values and execute
    the statement again to insert another row */
            $post_title = $_POST['post-title'];
            $post_content = $_POST['post-content'];
            $post_image = $_POST['post-image-url'];
            $post_category = intval($_POST['category']);

            if (empty($post_title) || empty($post_content) || empty($post_image)) {
                $error_msg = "some required fields are missing";
                return;
            }
            mysqli_stmt_execute($stmt);

            echo "Records inserted successfully.";
        } else {
            echo "ERROR: Could not prepare post create query: $create_post. " . mysqli_error($conn);
        }

        // Close statement
        mysqli_stmt_close($stmt);
    } else {
        echo ("something went wrong");
    }
} 


// if (isset($_POST['submit-post'])) {
//     echo "<br>post-title";
//     echo "<br>";
//     echo $_POST['post-title'];

//     echo "<br>post-content";
//     echo "<br>";
//     echo $_POST['post-content'];

//     echo "<br>post-image-url";
//     echo "<br>";
//     echo $_POST['post-image-url'];

//     echo "<br>post-image";
//     echo "<br>";
//     var_dump($_FILES['post-image']);


//     echo "<br>post-category";
//     echo "<br>";
//     echo $_POST['category'];


//     echo "<br>new-category";
//     echo "<br>";
//     echo $_POST['new-category'];


//     echo "<br>parent-category";
//     echo "<br>";
//     echo $_POST['parent-categories'];
// }
