<?php
include '../config/service.php';

if (!isset($_SESSION['pdf'])) {
    header('Location: ' . $BASE_URL . '/index.php');
    // $pdf = $BASE_URL . '/assets/pdf/md1.pdf';
}

$pdf = $_SESSION['pdf'];
var_dump($pdf);
header('content-type: application/pdf');
readfile($pdf);
