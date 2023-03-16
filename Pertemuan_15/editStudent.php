<?php
include 'function.php';
$id = $_GET["id"];
$student = getStudent($id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
</head>

<body>

    <div class="container mt-2">
        <a href="students.php" class="btn btn-success mt-2">Kembali</a>
        <h2 class="text-center mt-2">EDIT MAHASISWA</h2>
        <div class="card">
            <div class="card-body">
                <form action="./editStudentProces.php" method="post" enctype="multipart/form-data">
                    <input type="text" hidden name="id" value="<?= $student["id"]; ?>">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" value="<?= $student["nama"] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM" value="<?= $student["nim"] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" value="<?= $student["email"] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-control" id="jurusan" name="jurusan" required>
                            <option value="">Pilih Jurusan</option>
                            <option value="Teknik Informatika" <?= $student["jurusan"] == "Teknik Informatika" ? "selected" : ""; ?>>Teknik Informatika</option>
                            <option value="Teknik Mesin" <?= $student["jurusan"] == "Teknik Mesin" ? "selected" : ""; ?>>Teknik Mesin</option>
                            <option value="Teknik Industri" <?= $student["jurusan"] == "Teknik Industri" ? "selected" : ""; ?>>Teknik Industri</option>
                            <option value="Teknik Elektro" <?= $student["jurusan"] == "Teknik Elektro" ? "selected" : ""; ?>>Teknik Elektro</option>
                            <option value="Teknik Kimia" <?= $student["jurusan"] == "Teknik Kimia" ? "selected" : ""; ?>>Teknik Kimia</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" class="form-control" id="gambar" name="gambar">
                        <input type="text" hidden name="gambarLama" value="<?= $student["gambar"]; ?>">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-block">UPDATE</button>
                </form>
            </div>
        </div>

</body>

</html>