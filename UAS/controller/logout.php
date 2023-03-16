<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ../pages/login.php");
    exit;
}

session_destroy();
session_unset();

echo "
    <script>
        alert('Logout Berhasil!');
        document.location.href = '../pages/login.php';
        </script>
    ";
