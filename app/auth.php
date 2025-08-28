<?php
session_start();
require_once __DIR__ . '/init.php';

// Daftar halaman publik yang boleh diakses tanpa login
$publicPages = ['login.php', 'register.php', 'index.php'];

$currentPage = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

if (!isset($_SESSION['user']) && !in_array($currentPage, $publicPages)) {
    header("Location: login.php");
    exit;
}
