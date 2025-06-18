<?php
include '../../config/service.php';



if (isset($_SESSION['username'])) {
    header('Location: ' . $BASE_URL);
}

$fullname = $_POST['fullname'] ?? null;
$username = $_POST['username'] ?? null;

if (isset($_POST['register'])) {
    $sql_register = register($_POST);

    if ($sql_register > 0) {
        echo "<script>
                alert('Akun sukses terdaftar');
            </script>";
        header('Location: ' . $BASE_URL . '/pages/auth/login.php');
    } else {
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.css">
    <link rel="stylesheet" href="<?= $BASE_URL . '/css/style.css' ?>">
    <link rel="stylesheet" href="<?= $BASE_URL . '/css/auth.css' ?>">
    <title>Digital Books | Register</title>
</head>

<body>

    <div class="container">
        <div class="form-container">
            <h1>REGISTER</h1>
            <?php if (isset($_SESSION['error'])): ?>
                <?= $_SESSION['error']; ?>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>
            <form action="" method="post">
                <div class="input-group">
                    <label for="fullname">
                        <span>
                            <i class="ri-user-line"></i>
                        </span>
                        <input type="text" name="fullname" id="fullname" placeholder="fullname . . ." autofocus
                            autocomplete="off" value="<?= old($fullname) ?>">
                    </label>
                    <?php if (isset($_SESSION['fullname-error'])): ?>
                        <?= $_SESSION['fullname-error']; ?>
                        <?php unset($_SESSION['fullname-error']); ?>
                    <?php endif; ?>
                </div>
                <div class="input-group">
                    <label for="username">
                        <span>
                            <i class="ri-user-add-line"></i>
                        </span>
                        <input type="text" name="username" id="username" placeholder="username . . ." autofocus
                            autocomplete="off" value="<?= old($username); ?>">
                    </label>
                    <?php if (isset($_SESSION['username-error'])): ?>
                        <?= $_SESSION['username-error']; ?>
                        <?php unset($_SESSION['username-error']); ?>
                    <?php endif; ?>
                </div>
                <div class=" input-group">
                    <label for="password">
                        <span>
                            <i class="ri-lock-line"></i>
                        </span>
                        <input type="password" name="password" id="password" placeholder="password . . ."
                            autocomplete="off">
                    </label>
                    <?php if (isset($_SESSION['password-error'])): ?>
                        <?= $_SESSION['password-error']; ?>
                        <?php unset($_SESSION['password-error']); ?>
                    <?php endif; ?>
                </div>
                <div class="input-group">
                    <label for="confirmPassword">
                        <span>
                            <i class="ri-lock-unlock-line"></i>
                        </span>
                        <input type="password" name="confirmPassword" id="confirmPassword"
                            placeholder="Confirm Password . . ." autocomplete="off">
                    </label>
                    <?php if (isset($_SESSION['conf-pass-error'])): ?>
                        <?= $_SESSION['conf-pass-error']; ?>
                        <?php unset($_SESSION['conf-pass-error']); ?>
                    <?php endif; ?>
                </div>
                <div class="input-group">
                    <button type="submit" name="register" class="btn btn-register">Register</button>
                </div>
                <div class="footer">
                    <p>if you account you can login <a href="<?= $BASE_URL . '/pages/auth/login.php' ?>">here</a></p>
                </div>
            </form>
        </div>
    </div>

</body>

</html>