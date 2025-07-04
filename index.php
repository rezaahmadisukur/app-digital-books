<?php
include 'config/service.php';

$json = file_get_contents($BASE_URL . '/config/books.json');
$objs = json_decode($json, true)["Books"];

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
    <link rel="shortcut icon" href="<?= $BASE_URL . '/assets/images/icon.png' ?>" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.css">
    <link rel="stylesheet" href="<?= "$BASE_URL/css/style.css" ?>">
    <title>Digital Books | Homepage</title>
</head>

<body id="body">

    <!-- Start Navbar -->
    <nav>
        <div class="container">
            <div class="logo">
                <span><img src="<?= $BASE_URL . '/assets/images/icon.png' ?>" alt="icon" width="30px"
                        height="30px"></span>
                <h3>Logo</h3>
            </div>
            <div class="dropdown-profile">
                <div class="profile">
                    <div class="img-cover">
                        <img src="<?= "$BASE_URL/assets/images/profile.png" ?>" alt="photo-profile">
                    </div>
                    <span><?= $_SESSION['fullname'] ?></span>
                    <span><i class="ri-arrow-down-s-line"></i></span>
                </div>
                <ul class="dropdown-links">
                    <!-- <li>
                        <a href="">Profile</a>
                    </li> -->
                    <form action="<?= "$BASE_URL/pages/auth/logout.php" ?>">
                        <li>
                            <button type="submit" class="btn btn-logout">Logout</button>
                        </li>
                    </form>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Start Hero Section -->
    <section id="hero">
        <div class="container">
            <div class="hero__left">
                <div class="hero__image">
                    <img src="<?= $BASE_URL . '/assets/images/hero.png' ?>" alt="">
                </div>
            </div>
            <div class="hero__right">
                <div class="hero__header">
                    <h1>Unlimited Downloads</h1>
                    <h1>Unlimited Access</h1>
                    <h3>Audiobooks, e-books and more</h3>
                </div>
                <p>Unleash your mind with unlimited access to our full library of digital content. Read, listen, learn
                    and explore over 200.000 books, course, podcast and more</p>
                <a href="#main" class="btn go-books">Go to Books <i class="ri-arrow-right-line"></i></a>
            </div>
        </div>
    </section>
    <!-- End Hero Section -->



    <!-- Start Card Section -->
    <section id="main">
        <div class="container">
            <h1>🔥 HOT BOOKS 🔥</h1>
            <form action="" class="form__genre">
                <select name="" id="" class="form__genre-select">
                    <option value="">Select Genre</option>
                    <option value="komik">Komik</option>
                    <option value="technology">Technology</option>
                    <option value="nover">Novel</option>
                </select>
            </form>
            <div class="card__container">
                <?php foreach ($objs as $obj): ?>
                    <div class="card">
                        <div class="card__head">
                            <div class="card__image">
                                <img src="<?= $BASE_URL . $obj['cover'] ?>" alt="cover">
                                <span class="badge category"><?= ucwords($obj['kategori']) ?></span>
                                <div class="card__body">
                                    <div class="card__title">
                                        <p><?= strtoupper($obj['judul']) ?></p>
                                        <p class="card__sinopsis">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                            Dignissimos, obcaecati?
                                            Vitae tenetur vel consequuntur nihil.</p>
                                    </div>
                                    <form action="" method="post">
                                        <input type="hidden" name="pdf" value="<?= $obj['file'] ?>">
                                        <button name="view" class="btn btn-view">Baca &raquo;</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- End Card Section -->

    <!-- Start Up Arrow -->
    <a href="#body" class="arrow-up">
        <i class="ri-arrow-up-s-line"></i>
    </a>
    <!-- End Up Arrow -->

    <!-- Start Footer -->
    <footer>
        <p>Digital Books | Copyright &copy; <?= date('Y') ?></p>
    </footer>
    <!-- End Footer -->

    <!--Javascript -->
    <script src="<?= "$BASE_URL/js/script.js" ?>"></script>
</body>

</html>
