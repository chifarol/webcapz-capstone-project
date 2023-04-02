<?php session_start();
$_SESSION['login_error'] = "";
if (
    $_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['email']) &&
    isset($_POST['password'])
) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    // put your email and password here
    if ($email === 'ilodigwechinaza@gmail.com' && $password === '1234') {
        $_SESSION['is_admin'] = true;
        header('Location: /webcapz-capstone-project/dashboard-admin/php/all-posts.php');
    } else {
        $_SESSION['is_admin'] = false;
        $_SESSION['login_error'] = "wrong email or password";
        header('Location: /webcapz-capstone-project/dashboard-admin/php/login.php');
    }
} else {
    $_SESSION['is_admin'] = false;
    $_SESSION['login_error'] = "something went wrong";
    header('Location: /webcapz-capstone-project/dashboard-admin/php/login.php');
}