<?php
include '../../config/service.php';

session_destroy();
session_unset();
header('Location: ' . $BASE_URL . '/pages/auth/login.php');