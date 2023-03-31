<?php
require_once('../db.php');
$_SESSION['delete_post_error_msg'] = '';
if (isset($_GET['id'])) {
    $post_id = $_GET['id'];
    $fetch_posts = "DELETE FROM posts WHERE id=$post_id";
    $result = mysqli_query($conn, $fetch_posts);

    if ($result) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
?>