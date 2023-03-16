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
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container">
        <a class="navbar-brand" href="#"><h1>POLINEMA</h1></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="students.php">Daftar Mahasiswa</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Logout</a>
      </li>
    </ul>
  </div>
        </div>
</nav>

<div class="container mt-2">
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
    <div class="row">
    <div class="col text-center">
        <div class="mt-2">
            <p>2022 All Rights Reserved by Muhammad Hatta</p>
        </div>
    </div>
</div>
    </div>

    <!-- Bootstrap Js -->
    <script src="./js/jquery-3.3.1.slim.min.js"></script>
<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
</body>
</html>