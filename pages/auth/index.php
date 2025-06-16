<?php
include '../service.php';

if (isset($_SESSION['user'])) {
    header('Location: ' . base_url());
} else {
    header('Location: ' . base_url('pages/auth/login.php'));
}