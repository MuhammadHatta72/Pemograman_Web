<?php
include('../src/connect.php');
$no = $_GET['no'];
$query_student = mysqli_query($conn, "SELECT * FROM students where id = $no");

while ($result_student = mysqli_fetch_array($query_student)) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CRUD WEB-Edit Siswa</title>
        <link rel="stylesheet" href="../assets/css/style.css">
    </head>

    <body>
        <h1 class="text-5xl text-center mt-5 mb-5 bg-gradient-to-r from-green-700 to-cyan-700 bg-clip-text text-transparent font-bold">EDIT SISWA-SISWI</h1>
        <hr>
        <section class="my-[20px]">
            <div class="max-w-3xl mx-auto my-0 border border-slate-300 rounded-xl shadow-xl p-6">
                <div class="mb-10">
                    <a href="./index.php" class="bg-green-500 text-white px-5 py-2 no-underline rounded-full shadow-md shadow-slate-700 hover:text-sky-100 hover:bg-green-700 hover:shadow-slate-100 font-bold">Daftar Siswa-Siswi</a>
                </div>
                <form action="./editProses.php" method="POST">
                    <label for="name_student">
                        <input type="hidden" name="no" value="<?= $result_student["id"]; ?>">
                        <span class="block font-semibold mb-1 text-slate-700 after:content-['*'] after:text-red-700 after:ml-2">Nama</span>
                        <input type="text" id="name_student" name="name_student" value="<?= $result_student["name"]; ?>" placeholder="Masukkan Nama" class="px-3 py-2 border shadow rounded w-full block text-sm placeholder:text-slate-400 focus:outline-none focus:ring-1 focus:ring-sky-500 focus:border-sky-500 invalid:text-pink-800 invalid:focus:ring-pink-800 invalid:focus:border-pink-800 peer" />
                        <p class="text-sm m-1 text-pink-800 invisible peer-invalid:visible">
                            Name invalid
                        </p>
                    </label>
                    <label for="date_birth_student">
                        <span class="block font-semibold mb-1 text-slate-700 after:content-['*'] after:text-red-700 after:ml-2">Tanggal Lahir</span>
                        <input type="date" id="date_birth_student" name="date_birth_student" value="<?= $result_student["date_birth"]; ?>" placeholder="Masukkan Tanggal Lahir" class="px-3 py-2 border shadow rounded w-full block text-sm placeholder:text-slate-400 focus:outline-none focus:ring-1 focus:ring-sky-500 focus:border-sky-500 invalid:text-pink-800 invalid:focus:ring-pink-800 invalid:focus:border-pink-800 peer" />
                        <p class="text-sm m-1 text-pink-800 invisible peer-invalid:visible">
                            Tanggal Lahir invalid
                        </p>
                    </label>
                    <label for="address_student">
                        <span class="block font-semibold mb-1 text-slate-700 after:content-['*'] after:text-red-700 after:ml-2">Alamat</span>
                        <input type="text" id="address_student" name="address_student" value="<?= $result_student["address"]; ?>" placeholder="Masukkan Alamat" class="px-3 py-2 border shadow rounded w-full block text-sm placeholder:text-slate-400 focus:outline-none focus:ring-1 focus:ring-sky-500 focus:border-sky-500 invalid:text-pink-800 invalid:focus:ring-pink-800 invalid:focus:border-pink-800 peer" />
                        <p class="text-sm m-1 text-pink-800 invisible peer-invalid:visible">
                            Alamat invalid
                        </p>
                    </label>
                    <label for="gender_student">
                        <span class="block font-semibold mb-1 text-slate-700 after:content-['*'] after:text-red-700 after:ml-2">Jenis Kelamin</span>
                        <div class="flex ">
                            <div class="form-check form-check-inline mr-2">
                                <input class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="gender_student" id="man" value="Laki-laki" <?= ($result_student['gender'] == 'Laki-laki') ? 'checked' : '' ?>>
                                <label class="form-check-label inline-block text-gray-800" for="man">Laki-laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="gender_student" id="woman" value="Perempuan" <?= ($result_student['gender'] == 'Perempuan') ? 'checked' : '' ?>>
                                <label class="form-check-label inline-block text-gray-800" for="woman">Perempuan</label>
                            </div>
                        </div>
                        <p class="text-sm m-1 text-pink-800 invisible peer-invalid:visible">
                            Jenis Kelamin invalid
                        </p>
                    </label>
                    <label for="religion_student">
                        <span class="block font-semibold mb-1 text-slate-700 after:content-['*'] after:text-red-700 after:ml-2">Agama</span>
                        <div class="mb-3">
                            <select id="religion_student" name="religion_student" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 shadow rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-sky-500 focus:outline-none" aria-label="Default select example">
                                <option value="">Pilih Agama</option>
                                <option value="Islam" <?= ($result_student['religion'] == 'Islam') ? 'selected' : '' ?>>Islam</option>
                                <option value="Kristen" <?= ($result_student['religion'] == 'Kristen') ? 'selected' : '' ?>>Kristen</option>
                                <option value="Katolik" <?= ($result_student['religion'] == 'Katolik') ? 'selected' : '' ?>>Katolik</option>
                                <option value="Hindu" <?= ($result_student['religion'] == 'Hindu') ? 'selected' : '' ?>>Hindu</option>
                                <option value="Budha" <?= ($result_student['religion'] == 'Budha') ? 'selected' : '' ?>>Budha</option>
                            </select>
                        </div>
                        <p class="text-sm m-1 text-pink-800 invisible peer-invalid:visible">
                            Agama invalid
                        </p>
                    </label>
                    <label for="origin_school">
                        <span class="block font-semibold mb-1 text-slate-700 after:content-['*'] after:text-red-700 after:ml-2">Asal Sekolah</span>
                        <input type="text" id="origin_school" name="origin_school_student" value="<?= $result_student["origin_school"]; ?>" placeholder="Masukkan Asal Sekolah" class="px-3 py-2 border shadow rounded w-full block text-sm placeholder:text-slate-400 focus:outline-none focus:ring-1 focus:ring-sky-500 focus:border-sky-500 invalid:text-pink-800 invalid:focus:ring-pink-800 invalid:focus:border-pink-800 peer" />
                        <p class="text-sm m-1 text-pink-800 invisible peer-invalid:visible">
                            Asal Sekolah invalid
                        </p>
                    </label>
                    <input type="submit" name="Submit" class="w-full bg-yellow-500 px-5 py-2 rounded-full text-white font-semibold block hover:bg-yellow-700 active:bg-yellow-900 focus:ring focus:ring-yellow-400" value="Save Changes" />
                </form>
            </div>
        </section>
    </body>

    </html>
<?php
}
?>