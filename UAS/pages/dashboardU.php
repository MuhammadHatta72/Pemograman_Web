<?php
session_start();
include '../controller/function.php';

if (!$_SESSION['roleUser']) {
    header("location:../pages/login.php");
    exit;
}

$user = profileUser($_SESSION['id_user']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/img/logo.png">
    <title>Dashboard - Sistem Informasi Perpustakaan</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="dark:bg-slate-800 dark:text-slate-200">

    <div class="flex w-full bg-white dark:bg-slate-800">
        <div class="w-16 h-screen"></div>
        <!-- Menu -->
        <div class="w-16 h-screen bg-white rounded-r-xl shadow-2xl absolute mr-2 z-40 dark:bg-gray-900" id="sidebar">
            <div class="h-screen w-full">
                <div class="min-h-screen w-full overflow-x-hidden">
                    <div class="flex h-screen flex-col justify-between pt-2 pb-6">
                        <div>
                            <div class="flex flex-col mt-3" id="topMenu">
                                <div class="flex mx-auto" id="toggleMenu">
                                    <input type="checkbox" id="toggle" class="hidden" />
                                    <label for="toggle">
                                        <svg class=" w-6 h-6 cursor-pointer" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                    </label>
                                </div>
                                <div class="w-max px-1 pt-2 mx-auto">
                                    <a href="./dashboardU.php" class="flex flex-row items-center">
                                        <img src="../assets/img/logo.png" alt="logo" class="w-10 h-10 inline-flex justify-center items-center ml-2">
                                        <div class="flex flex-col">
                                            <h2 class="ml-3 uppercase tracking-wide hidden font-bold text-orange-700" id="textMenu">Perpustakaan</h2>
                                            <h2 class="ml-3 uppercase tracking-wide hidden font-bold text-orange-700" id="textMenu">Online</h2>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <ul class="flex flex-col py-4 space-y-1">
                                <li class="px-4">
                                    <div class="flex flex-row items-center h-8">
                                        <div class="text-sm font-light tracking-wide text-gray-500 dark:text-gray-300">Menu</div>
                                    </div>
                                </li>
                                <li>
                                    <a href="./dashboardU.php" class="active:bg-red-700 relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-orange-500 hover:shadow-md pr-6 dark:hover:bg-gray-600">
                                        <span class="inline-flex justify-center items-center ml-4">
                                            <img src="../assets/img/speed.png" alt="user" class="w-5 h-5">
                                        </span>
                                        <span class="ml-2 text-sm tracking-wide font-semibold truncate dark:text-gray-300 hidden" id="textMenu">Dashboard</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="./booksU.php" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-orange-500 hover:shadow-md pr-6 dark:hover:bg-gray-600">
                                        <span class="inline-flex justify-center items-center ml-4">
                                            <img src="../assets/img/open-book.png" alt="user" class="w-5 h-5">
                                        </span>
                                        <span class="ml-2 text-sm tracking-wide font-semibold truncate dark:text-gray-300 hidden" id="textMenu">Buku</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="./transactionU.php" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-orange-500 hover:shadow-md pr-6 dark:hover:bg-gray-600">
                                        <span class="inline-flex justify-center items-center ml-4">
                                            <img src="../assets/img/contract.png" alt="user" class="w-5 h-5">
                                        </span>
                                        <span class="ml-2 text-sm tracking-wide font-semibold truncate dark:text-gray-300 hidden" id="textMenu">Pinjam Kembali Buku</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../controller/logout.php" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-orange-500 hover:shadow-md pr-6 dark:hover:bg-gray-600">
                                        <span class="inline-flex justify-center items-center ml-4">
                                            <img src="../assets/img/logout.png" alt="user" class="w-5 h-5">
                                        </span>
                                        <span class="ml-2 text-sm tracking-wide font-semibold truncate dark:text-gray-300 hidden" id="textMenu">Sign out</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Menu -->
        </div>
        <div class="w-full h-screen bg-gray-50 rounded-l-xl overflow-y-scroll dark:bg-slate-700" id="contentBar">
            <!-- Top Top Header -->
            <nav class="bg-white shadow-md px-2 sm:px-4 py-5 dark:bg-gray-900">
                <div class="container flex flex-wrap items-center justify-between mx-auto">
                    <div></div>
                    <div class="flex">
                        <div class="mr-3 flex justify-center">
                            <input type="checkbox" id="toggleDarkLight" class="hidden" />
                            <label for="toggleDarkLight">
                                <img class="w-8 h-8 item-center" id="darkMode" src="../assets/img/dark.png">
                                <img class="w-8 h-8 item-center hidden" id="ligthMode" src="../assets/img/light.png">
                            </label>
                        </div>
                        <button type="button" data-dropdown-toggle="user-dropdown" class="inline-flex items-center justify-center text-sm text-gray-500 rounded cursor-pointer">
                            <span class="mr-2 text-sm font-semibold tracking-wide truncate dark:text-slate-200">Hi, <?= $user['last_name']; ?></span>
                            <?php
                            if ($user["picture"] == '-') {
                                echo '<img class="w-8 h-8 rounded-full" src="../assets/img/userMale.jpg" alt="user photo">';
                            } else {
                                echo '<img class="w-8 h-8 rounded-full" src="../assets/pictureUser/' . $user["picture"] . '" alt="user photo">';
                            }
                            ?>
                        </button>
                        <!-- Dropdown menu -->
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-800 dark:border-gray-700" id="user-dropdown">
                            <div class="px-4 py-3">
                                <span class="block text-sm text-gray-900 dark:text-gray-300"><?= $user['first_name'] . " " . $user['last_name']; ?></span>
                                <span class="block text-sm font-medium text-gray-500 truncate dark:text-gray-300"><?= $user['email']; ?></span>
                            </div>
                            <ul class="py-1" aria-labelledby="user-menu-button">
                                <li>
                                    <a href="./profileU.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:border-b-2 hover:border-orange-500 dark:hover:bg-gray-600 dark:hover:text-white dark:text-gray-300">Profile</a>
                                </li>
                                <li>
                                    <a href="../controller/logout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:border-b-2 hover:border-orange-500 dark:hover:bg-gray-600 dark:hover:text-white dark:text-gray-300">Sign out</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- End Top Header -->

            <!-- Titlepage -->
            <div class="container mx-auto px-6 pt-4">
                <h3 class="text-gray-700 text-3xl font-medium dark:text-gray-50">Dashboard</h3>
                <p class="mt-1 text-gray-500 text-sm dark:text-gray-100">Welcome back, <?= $user['first_name'] . " " . $user['last_name']; ?></p>
            </div>
            <!-- End Titlepage -->

            <!-- Content -->
            <div class="container p-5">
                <!-- Image -->
                <div class="flex flex-col sm:flex-row sm:mt-4">

                    <div class="bg-white border border-gray-200 rounded-lg mb-3 sm:mb-0 sm:mr-3 sm:w-2/3 shadow-md overflow-hidden sm:h-96  dark:bg-gray-800 dark:border-gray-700">
                        <div class="p-5">
                            <h5 class="mb-2 text-2xl font-bold tracking-wide uppercase text-gray-900 dark:text-white">Perpustakaan Online</h5>
                            <!-- <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Perpustakaan digital (Inggris: digital library atau electronic library atau virtual library) adalah perpustakaan yang mempunyai koleksi buku sebagian besar dalam bentuk format digital dan yang bisa diakses dengan komputer.</p> -->
                        </div>
                        <img class="rounded-t-lg bg-center" src="../assets/img/library.jpg" alt="Library Online" />
                    </div>
                    <div class="p-4 bg-white border rounded-lg shadow-md sm:w-1/3 dark:bg-gray-800 dark:border-gray-700">
                        <h5 class="mb-2 text-base font-semibold text-gray-900 md:text-xl dark:text-white">
                            List Buku
                        </h5>
                        <a href="./booksU.php" class="inline-flex items-center text-sm text-blue-600 hover:underline">
                            Selengkapnya
                            <svg class="w-5 h-5 ml-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z"></path>
                                <path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z"></path>
                            </svg>
                        </a>
                        <ul class="my-4 space-y-3 h-64 sm:96 overflow-y-scroll">
                            <?php
                            $i = 1;
                            $allBooks = getAllBooks();
                            while ($row = mysqli_fetch_assoc($allBooks)) {
                            ?>
                                <li class="flex items-center p-3 text-base font-semibold text-gray-900 rounded-lg border-b-2 border-gray-100 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                                    <img src="../assets/img/list-book.png" alt="user" class="w-5 h-5 items-center justify-center">
                                    <span class="flex-1 ml-3 whitespace-nowrap"><?= $row['book_title']; ?></span>
                                    <!-- <span class="inline-flex items-center justify-center px-2 py-0.5 ml-3 text-xs font-medium text-gray-500 bg-gray-200 rounded dark:bg-gray-700 dark:text-gray-400">Popular</span> -->
                                </li>
                            <?php
                                $i++;
                            }
                            ?>
                        </ul>
                    </div>

                </div>
                <!-- End Image -->
            </div>

            <!-- Footer -->
            <footer class="py-4 sm:py-3 shadow dark:bg-gray-900">
                <hr class=" border-gray-200 dark:border-gray-600" />
                <span class="mt-4 sm:mt-3 block text-sm text-gray-500 text-center dark:text-gray-300">Copyrights© 2022 Muhammad Hatta.
                </span>
            </footer>
            <!-- End Footer -->
        </div>

        <script src="../assets/jsCustom/flowbite.js"></script>
        <script src="../assets/jsCustom/jquery-3.3.1.js"></script>
        <script src="../assets/jsCustom/custom.js"></script>
</body>

</html>