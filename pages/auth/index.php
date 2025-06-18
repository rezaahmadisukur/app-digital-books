<?php
include '../../config/service.php';

if (isset($_SESSION['user'])) {
    header('Location: ' . $BASE_URL);
} else {
    header('Location: ' . $BASE_URL . '/pages/auth/login.php');
}