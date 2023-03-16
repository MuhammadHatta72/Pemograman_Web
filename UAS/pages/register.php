<?php
session_start();

if (isset($_SESSION["login"])) {
    if ($_SESSION["role"] == 1) {
        header("Location: ../pages/dashboardA.php");
        exit;
    } else {
        header("Location: ../pages/dashboardU.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<!-- <html lang="en" class="dark"> -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/img/logo.png">
    <title>Register - Sistem Informasi Perpustakaan</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        body {
            background-image: url("../assets/img/bg.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
    </style>
</head>

<body class="dark:bg-slate-800 dark:text-slate-200">

    <div class="w-72 sm:w-80 md:w-96 xl:w-96 mx-auto my-20 max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow-md sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
        <form class="space-y-6" action="../controller/registerAction.php" method="POST">
            <h5 class="text-xl font-medium text-gray-800 dark:text-white">Create Account</h5>
            <div>
                <label for="nim" class="block mb-2 text-sm font-medium text-gray-800 dark:text-white">Your nim</label>
                <input type="text" name="nim" id="nim" class="bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white peer" placeholder="2141720021" autocomplete="off" required>
            </div>
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-800 dark:text-white">Your email</label>
                <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white peer" placeholder="name@gmail.com" autocomplete="off" required>
            </div>
            <div>
                <label for="password" class="block mb-2 text-sm font-medium text-gray-800 dark:text-white">Your password</label>
                <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" autocomplete="off" required>
            </div>
            <input type="submit" name="submit" value="Register to create acount" class="w-full text-white bg-[#62B6B7] hover:bg-[#439A97] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 cursor-pointer">
            <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                Already account? <a href="./login.php" class="text-blue-700 hover:underline dark:text-blue-500">Login</a>
            </div>
        </form>
    </div>

</body>

</html>