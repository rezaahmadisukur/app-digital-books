<?php
include 'pages/service.php';

if (!isset($_SESSION['username'])) {
    header('Location: ' . base_url('pages/auth/login.php'));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Digital Books | Homepage</title>
</head>

<body>


    <h1>Welcome to homepage <?= $_SESSION['fullname']; ?></h1>
    <div>
        <a href="<?= base_url('pages/auth/logout.php') ?>">Logout</a>
    </div>

</body>

</html>