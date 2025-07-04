<?php
include '../config/service.php';

if (!isset($_SESSION['pdf'])) {
    header('Location: ' . $BASE_URL . '/index.php');
    exit;
}

$pdf = $_SESSION['pdf'];
header('content-type: application/pdf');
readfile($pdf);




