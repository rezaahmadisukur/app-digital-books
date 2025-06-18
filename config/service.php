<?php
date_default_timezone_set('Asia/Jakarta');
session_start();

$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = '';
$DB_NAME = 'db_digital_books';
$BASE_URL = 'http://localhost/app-digital-books';

$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if (!$conn) {
    die('Failed connect to database : ' . mysqli_connect_error());
}
// function base_url($url = null): string
// {
//     $BASE_URL = 'http://localhost/app-digital-books';
//     if ($url) {
//         return $BASE_URL . '/' . $url;
//     } else {
//         return $BASE_URL;
//     }
// }

function register($post): bool|int|string
{
    global $conn;

    $fullname = ucwords(htmlspecialchars($post['fullname']));
    $username = strtolower(stripslashes($post['username']));
    $password = mysqli_real_escape_string($conn, $post['password']);
    $confirmPassword = mysqli_real_escape_string($conn, $post['confirmPassword']);

    if (empty($fullname) && empty($username) && empty($password) && empty($confirmPassword)) {
        $_SESSION['error'] = '<div class="alert alert-failed">Wajib isi semua data</div>';
    }
    if (strlen($fullname) < 3) {
        $_SESSION['fullname-error'] = '<div class="message-error">Fullname minimal 3 karakter</div>';
    }
    if (strlen($username) < 3) {
        $_SESSION['username-error'] = '<div class="message-error">Username minimal 3 karakter</div>';
    }
    if (strlen($password) < 8) {
        $_SESSION['password-error'] = '<div class="message-error">Password minimal 8 karakter</div>';
    }
    if ($password !== $confirmPassword || strlen($password < 8)) {
        $_SESSION['conf-pass-error'] = '<div class="message-error">Konfirmasi password tidak sesuai</div>';
        return false;
    }

    // Mengecheck apakah username sudah terdaftar atau belum
    $query = "SELECT * FROM tb_users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    if ($result->num_rows > 0) {
        $_SESSION['error'] = '<div class="alert alert-failed">Username telah terdaftar</div>';
        return false;
    }



    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO tb_users VALUES 
            ('', '$fullname', '$username', '$password', current_timestamp(), current_timestamp())";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function old($valueInput)
{
    isset($valueInput) ? htmlspecialchars($valueInput) : null;
    return $valueInput;
}