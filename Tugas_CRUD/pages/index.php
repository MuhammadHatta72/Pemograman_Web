<?php
include('../src/connect.php');

$query_students = mysqli_query($conn, "SELECT * FROM students");
$result_num = mysqli_num_rows($query_students);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD WEB</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="">
    <h1 class="text-5xl text-center mt-5 mb-5 bg-gradient-to-r from-green-700 to-cyan-700 bg-clip-text text-transparent font-bold">DAFTAR SISWA YANG SUDAH MENDAFTAR</h1>
    <hr>
    <section class="my-[20px]">
        <div class="max-w-[70%] mx-auto my-0 border border-slate-300 rounded-xl shadow-xl p-6">
            <div class="">
                <a href="./tambah.php" class="bg-orange-500 text-white px-5 py-2 no-underline rounded-full shadow-md shadow-slate-700 hover:text-orange-100 hover:bg-orange-700 hover:shadow-slate-100">Tambah Siswa-Siswi</a>
            </div>
            <div class="my-10">
                <table cellpadding="15">
                    <thead class="">
                        <th class=" border border-slate-400">No.</th>
                        <th class="border border-slate-400">Nama</th>
                        <th class="border border-slate-400">Tanggal Lahir</th>
                        <th class="border border-slate-400">Alamat</th>
                        <th class="border border-slate-400">Jenis Kelamin</th>
                        <th class="border border-slate-400">Agama</th>
                        <th class="border border-slate-400">Asal Sekolah</th>
                        <th class="border border-slate-400">Option</th>
                    </thead>
                    <tbody>
                        <?php
                        // var_dump($query_students);
                        $no = 1;
                        while ($result_student = mysqli_fetch_array($query_students)) {
                        ?>
                            <tr class="hover:bg-slate-300">
                                <td class="border border-slate-400 text-center"><?= $no++; ?>.</td>
                                <td class="border border-slate-400"><?= $result_student["name"]; ?></td>
                                <td class="border border-slate-400"><?= $result_student["date_birth"]; ?></td>
                                <td class="border border-slate-400"><?= $result_student["address"]; ?></td>
                                <td class="border border-slate-400"><?= $result_student["gender"]; ?></td>
                                <td class="border border-slate-400"><?= $result_student["religion"]; ?></td>
                                <td class="border border-slate-400"><?= $result_student["origin_school"]; ?></td>
                                <td class="border border-slate-400">
                                    <form action="./edit.php" method="GET">
                                        <input type="hidden" name="no" value="<?= $result_student["id"]; ?>">
                                        <button class="w-full bg-sky-500 px-2 py-2 rounded-full text-white font-semibold block hover:bg-sky-700 active:bg-sky-900 focus:ring focus:ring-sky-400 mb-3 shadow-lg">
                                            Edit
                                        </button>
                                    </form>
                                    <form action="./delete.php" method="POST">
                                        <input type="hidden" name="no" value="<?= $result_student["id"]; ?>">
                                        <button class="w-full bg-red-500 px-2 py-2 rounded-full text-white font-semibold block hover:bg-red-700 active:bg-red-900 focus:ring focus:ring-red-400 shadow-lg" onclick="return confirm('Apakah Ingin Hapus ?')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</body>

</html>