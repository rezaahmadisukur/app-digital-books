<?php
include '../../config/service.php';

if (isset($_SESSION['username'])) {
    header("Location: $BASE_URL");
}

$username = $_POST['username'] ?? null;

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $query = "SELECT * FROM tb_users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['fullname'] = $row['fullname'];
            header("Location: $BASE_URL");
            exit;
        }
    }

    $_SESSION['error'] = '<div class="alert alert-failed">Username atau Password salah</div>';


}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.css">
    <link rel="stylesheet" href="<?= "$BASE_URL/css/style.css" ?>">
    <link rel="stylesheet" href="<?= $BASE_URL . '/css/auth.css' ?>">
    <title>Digital Books | Login</title>
</head>

<body>

    <div class="container form-login">
        <div class="form-container">
            <h1>Login</h1>
            <?php if (isset($_SESSION['error'])): ?>
                <?= $_SESSION['error']; ?>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>
            <form action="" method="post">
                <div class="input-group">
                    <label for="username">
                        <span>
                            <i class="ri-user-add-line"></i>
                        </span>
                        <input type="text" name="username" id="username" placeholder="username . . ." autofocus
                            autocomplete="off" value="<?= old($username); ?>">
                    </label>
                </div>
                <div class=" input-group">
                    <label for="password">
                        <span>
                            <i class="ri-lock-line"></i>
                        </span>
                        <input type="password" name="password" id="password" placeholder="password . . ."
                            autocomplete="off">
                    </label>
                </div>
                <div class="input-group">
                    <button type="submit" name="login" class="btn btn-login">Login</button>
                </div>
                <div class="footer">
                    <p>if you haven't account ! you can register
                        <a href="<?= $BASE_URL . '/pages/auth/register.php' ?>">here</a>
                    </p>
                </div>
            </form>
        </div>
    </div>

</body>

</html>