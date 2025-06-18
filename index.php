<?php
include 'config/service.php';

$json = file_get_contents($BASE_URL . '/config/books.json');
$objs = json_decode($json, true)["Books"];
// var_dump($obj);
// die;

if (!isset($_SESSION['username'])) {
    header("Location: $BASE_URL/pages/auth/login.php");
}

if (isset($_POST['view'])) {
    $_SESSION['pdf'] = $BASE_URL . $_POST['pdf'];
    header('Location: ' . $BASE_URL . '/pages/read.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= "$BASE_URL/css/style.css" ?>">
    <title>Digital Books | Homepage</title>
</head>

<body>

    <!-- Start Navbar -->
    <nav>
        <div class="container navbar">
            <div class="logo">
                <h3>Logo</h3>
            </div>
            <div class="dropdown-profile">
                <div class="img-cover">
                    <img src="<?= "$BASE_URL/assets/images/profile.png" ?>" alt="">
                </div>
                <ul class="dropdown-links">
                    <li><a href="#">Profile</a></li>
                    <form action="<?= "$BASE_URL/pages/auth/logout.php" ?>">
                        <li><button type="submit">Logout</button></li>
                    </form>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Start Card Section -->
    <section class="container">
        <h1>Selamat Datang <?= $_SESSION['fullname'] ?></h1>
        <div class="card__container">
            <?php foreach ($objs as $obj): ?>
                <div class="card">
                    <div class="card__head">
                        <div class="card__image">
                            <img src="<?= $BASE_URL . $obj['cover'] ?>" alt="">
                        </div>
                    </div>
                    <div class="card__body">
                        <div class="card__title">
                            <span class="badge"><?= $obj['kategori'] ?></span>
                            <h5><?= $obj['judul'] ?></h5>
                        </div>
                        <form action="" method="post">
                            <input type="hidden" name="pdf" value="<?= $obj['file'] ?>">
                            <button name="view" class="btn btn-view">Baca &raquo;</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <!-- End Card Section -->

    <footer>
        <p>Digital Books | Copyright &copy; <?= date('Y') ?></p>
    </footer>

    <script src="<?= "$BASE_URL/js/script.js" ?>"></script>
</body>

</html>