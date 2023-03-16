<?php
session_start();
include '../controller/function.php';

if (!$_SESSION['roleAdmin']) {
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
    <title>Edit Buku - Sistem Informasi Perpustakaan</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/dataTables.css">
    <style>
        .dataTables_wrapper {
            position: initial !important;
        }

        table.dataTable {
            border-collapse: collapse !important;
        }

        .dataTables_filter {
            margin-bottom: 10px;
        }

        .dataTables_info {
            font-size: small;
        }

        .paginate_button {
            font-size: small;
        }

        .dataTables_paginate span {
            font-size: small;
        }
    </style>
</head>

<body class="dark:bg-slate-800 dark:text-slate-200">

    <div class="flex w-full bg-white dark:bg-slate-800">
        <div class="w-16 h-screen"></div>
        <!-- Menu -->
        <div class="w-16 h-screen bg-white rounded-r-xl shadow-2xl mr-2 absolute z-40 dark:bg-gray-900" id="sidebar">
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
                                    <a href="./dashboardA.php" class="flex flex-row items-center">
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
                                    <a href="./dashboardA.php" class="active:bg-red-700 relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-orange-500 hover:shadow-md pr-6 dark:hover:bg-gray-600">
                                        <span class="inline-flex justify-center items-center ml-4">
                                            <img src="../assets/img/speed.png" alt="user" class="w-5 h-5">
                                        </span>
                                        <span class="ml-2 text-sm tracking-wide font-semibold truncate dark:text-gray-300 hidden" id="textMenu">Dashboard</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="./usersA.php" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-orange-500 hover:shadow-md pr-6 dark:hover:bg-gray-600">
                                        <span class="inline-flex justify-center items-center ml-4">
                                            <img src="../assets/img/people.png" alt="user" class="w-5 h-5">
                                        </span>
                                        <span class="ml-2 text-sm tracking-wide font-semibold truncate dark:text-gray-300 hidden" id="textMenu">Pengguna</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="./booksA.php" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-orange-500 hover:shadow-md pr-6 dark:hover:bg-gray-600">
                                        <span class="inline-flex justify-center items-center ml-4">
                                            <img src="../assets/img/open-book.png" alt="user" class="w-5 h-5">
                                        </span>
                                        <span class="ml-2 text-sm tracking-wide font-semibold truncate dark:text-gray-300 hidden" id="textMenu">Buku</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="./lendBookA.php" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-orange-500 hover:shadow-md pr-6 dark:hover:bg-gray-600">
                                        <span class="inline-flex justify-center items-center ml-4">
                                            <img src="../assets/img/contract.png" alt="user" class="w-5 h-5">
                                        </span>
                                        <span class="ml-2 text-sm tracking-wide font-semibold truncate dark:text-gray-300 hidden" id="textMenu">Peminjaman Buku</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="./returnBookA.php" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-orange-500 hover:shadow-md pr-6 dark:hover:bg-gray-600">
                                        <span class="inline-flex justify-center items-center ml-4">
                                            <img src="../assets/img/contract-breakdown.png" alt="user" class="w-5 h-5">
                                        </span>
                                        <span class="ml-2 text-sm tracking-wide font-semibold truncate dark:text-gray-300 hidden" id="textMenu">Pengembalian Buku</span>
                                    </a>
                                </li>
                                <li>
                                    <button id="doubleDropdownButton" data-dropdown-toggle="doubleDropdown" data-dropdown-placement="right-start" type="button" class="w-full relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-orange-500 hover:shadow-md pr-6 dark:hover:bg-gray-600">
                                        <span class="inline-flex justify-center items-center ml-4">
                                            <img src="../assets/img/report.png" alt="user" class="w-5 h-5">
                                        </span>
                                        <span class="ml-2 text-sm tracking-wide font-semibold truncate dark:text-gray-300 hidden" id="textMenu">Laporan</span>
                                    </button>
                                    <div id="doubleDropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="doubleDropdownButton">
                                            <li>
                                                <a href="./reportBookA.php" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white hover:border-b-2 hover:border-orange-500 dark:hover:border-slate-400">Buku</a>
                                            </li>
                                            <li>
                                                <a href="./reportTransaction.php" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white hover:border-b-2 hover:border-orange-500 dark:hover:border-slate-400">Peminjaman & Pengembalian Buku</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a href="#" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-orange-500 hover:shadow-md pr-6 dark:hover:bg-gray-600">
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
                                    <a href="./profileA.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:border-b-2 hover:border-orange-500 dark:hover:bg-gray-600 dark:hover:text-white dark:text-gray-300">Profile</a>
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
                <h3 class="text-gray-700 text-xl sm:text-3xl font-medium dark:text-gray-50">Edit Buku</h3>
            </div>
            <!-- End Titlepage -->

            <!-- Content -->
            <div class="container p-5">
                <!-- Row 1 -->
                <div class="bg-white border border-gray-200 w-full rounded-lg shadow-md p-3 dark:bg-gray-800 dark:border-gray-700">
                    <form class="px-4" enctype="multipart/form-data" method="POST" action="../controller/editBookAction.php">
                        <?php
                        $id = $_GET['id'];
                        $book = getBook($id);
                        ?>
                        <img src="../assets/coverBook/<?= $book['book_cover']; ?>" alt="Cover Book" class="mb-3 sm:w-96 rounded-sm sm:rounded-lg">
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <input type="hidden" name="id" value="<?= $book['id_book']; ?>">
                                <label for="book_title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul Buku</label>
                                <input type="text" id="book_title" name="book_title" value="<?= $book['book_title']; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Garis Waktu" required>
                            </div>
                            <div class="sm:row-start-2 sm:col-start-1">
                                <label for="author" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pengarang</label>
                                <input type="text" id="author" name="author" value="<?= $book['author']; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Fiersa Besari" required>
                            </div>
                            <div class="sm:row-start-3 sm:col-start-1">
                                <label for="publisher" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penerbit</label>
                                <input type="text" id="publisher" name="publisher" value="<?= $book['publisher']; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Fiersa Besari" required>
                            </div>
                            <div>
                                <label for="book_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Buku</label>
                                <input type="text" id="book_type" name="book_type" value="<?= $book['book_type']; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Novel" required>
                            </div>
                            <div class="sm:row-start-4 sm:col-start-1">
                                <label for="year_public" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun Terbit</label>
                                <input type="number" id="year_public" name="year_public" value="<?= $book['year_public']; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="2021" required>
                            </div>

                            <div>
                                <label for="bookcase_loc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lokasi Rak Buku</label>
                                <input type="text" id="bookcase_loc" name="bookcase_loc" value="<?= $book['bookcase_loc']; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="A-3" required>
                            </div>
                            <div>
                                <label for="book_cover_new" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cover Buku</label>
                                <input type="text" hidden name="book_cover" value="<?= $book["book_cover"]; ?>">
                                <input type="file" id="book_cover_new" name="book_cover_new" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Garis Waktu">
                            </div>
                            <div>
                                <!-- <label for="stocks" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total Buku</label>
                                <input type="number" id="stocks" name="stocks" value="<?= $book['stocks']; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="30" required> -->
                                <input type="submit" name="submit" value="Update" class="text-white bg-cyan-800 hover:bg-cyan-700 hover:shadow-md focus:ring-4 focus:outline-none focus:ring-cyan-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2 sm:px-14 text-center dark:bg-cyan-600 dark:hover:bg-cyan-700 dark:focus:ring-cyan-800 cursor-pointer">
                            </div>
                        </div>
                    </form>

                </div>
                <!-- End Row 1 -->

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
        <script src="../assets/jsCustom/dataTables.js"></script>
        <script>
            // Function Datatable
            $(document).ready(function() {
                $('#books').DataTable();
            });
        </script>
</body>

</html>