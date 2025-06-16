<?php
include '../service.php';

session_destroy();
session_unset();
header('Location: ' . base_url('pages/auth/login.php'));