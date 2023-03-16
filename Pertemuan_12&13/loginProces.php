<?php
if(isset($_POST["submit"])){
    // cek email & password
    if($_POST["email"] == true && $_POST["password"] == true){
        // jika benar, redirect ke halaman admin
        header("Location: students.php");
        exit;
    } else {
        // jika salah, redirect ke halaman login
        header("Location: login.php");
        exit;
    }
}
?>