<?php
require_once('../db.php');
$_SESSION['edit_post_error_msg'] = "";
if (
    $_SERVER["REQUEST_METHOD"] === "POST"
) {
    if (
        isset($_POST['submit-post']) &&
        isset($_POST['post_id']) &&
        isset($_POST['post-title']) &&
        isset($_POST['post-content']) &&
        isset($_POST['post-image-url']) &&
        isset($_POST['category'])
    ) {
        global $conn;

        $create_post = "UPDATE posts SET 
        post_title=?,
        post_content=?,
        post_image_path=?,
        category_id=?
         WHERE id=?";

        if ($stmt = mysqli_prepare($conn, $create_post)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param(
                $stmt,
                "sssii",
                $post_title,
                $post_content,
                $post_image,
                $post_category,
                $id
            );

            /* Set the parameters values and execute
            the statement again to insert another row */
            $post_title = sanitize_input($_POST['post-title']);
            $post_content = sanitize_input($_POST['post-content']);
            $post_image = sanitize_input($_POST['post-image-url']);
            $post_category = sanitize_input(intval($_POST['category']));
            $id = sanitize_input(intval($_POST['post_id']));
            if (empty($post_title) || empty($post_content) || empty($post_image)) {
                $_SESSION['edit_post_error_msg'] = "some required fields are missing";
                return;
            }
            mysqli_stmt_execute($stmt);
            header("Location: /webcapz-capstone-project/dashboard-admin/php/edit-post.php?id=" . $id);
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
