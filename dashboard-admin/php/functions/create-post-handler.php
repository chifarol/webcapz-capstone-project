<?php
require('./db.php');

if (isset($_POST['submit-post'])) {
    global $conn;
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
