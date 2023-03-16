<?php
include 'function.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
</head>

<body>

    <div class="container mt-2">
        <a href="students.php" class="btn btn-success mt-2">Kembali</a>
        <h2 class="text-center mt-2">TAMBAH MAHASISWA</h2>
        <div class="card">
            <div class="card-body">
                <form action="./addStudentProces.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required>
                    </div>
                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" required>
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-control" id="jurusan" name="jurusan" required>
                            <option value="">Pilih Jurusan</option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Teknik Mesin">Teknik Mesin</option>
                            <option value="Teknik Industri">Teknik Industri</option>
                            <option value="Teknik Elektro">Teknik Elektro</option>
                            <option value="Teknik Kimia">Teknik Kimia</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" class="form-control" id="gambar" name="gambar" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-block">SUBMIT</button>
                </form>
            </div>
        </div>

</body>

</html>