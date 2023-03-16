<?php
require 'functions.php';

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];


    $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");

    //cek username
    //mysqli_num_rows=untuk menghitung ada berapa baris yang akan dikembalikan oleh parameter
    //kalau ada yg dikembalikan nilainya adalah 1 kalau enggak ada nilainya 0

    if (mysqli_num_rows($result) === 1) {
        //var_dump($result);
        //cek password
        $row = mysqli_fetch_assoc($result);
        // var_dump($row);

        //digunakan untuk mengecek sebuah string apakah samakah dengan hashnya
        //terdapat 2 paramater (password yg blm di acak,password yg sudah diacak)
        if (password_verify($password, $row["password"])) {
            //redirect ke halaman index.php 
            header("Location:index.php");
            exit;
        }
    }
    $error = true;
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Login</title>
</head>

<body>
    <h1> Halaman Login</h1>

    <?php if (isset($error)) : ?>
        <p style="color:red; font-style:bold;">
            Username dan password salah</p>
    <?php endif ?>

    <form action="" method="post">
        <ul>
            <li>
                <label for="username">username</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">password</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <button type="submit" name="login">Login</button>
            </li>
        </ul>
    </form>
</body>

</html>