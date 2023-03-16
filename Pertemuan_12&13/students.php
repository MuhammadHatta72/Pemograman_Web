<?php
include 'function.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Mahasiswa</title>
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/datatables/jquery.dataTables.min.css">
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">
        <h1>POLINEMA</h1>
      </a>
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
    <a href="addStudent.php" class="btn btn-success mt-2">Tambah Mahasiswa</a>
    <h2 class="text-center mt-2 mb-2">DAFTAR MAHASISWA</h2>
    <div class="card">
      <div class="card-body">
        <table class="table" id="tableStudents">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama</th>
              <th>NIM</th>
              <th>Email</th>
              <th>Jurusan</th>
              <th>Gambar</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 1;
            while ($row = mysqli_fetch_assoc($result)) { ?>
              <tr>
                <td><?= $i; ?></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["nim"]; ?></td>
                <td><?= $row["email"]; ?></td>
                <td><?= $row["jurusan"]; ?></td>
                <td><img src="./imgStudents/<?= $row["gambar"]; ?>" width="50"></td>
                <td><a class="btn btn-primary" href="editStudent.php?id=<?= $row["id"]; ?>">Edit</a> | <a class="btn btn-warning" href="deleteStudent.php?id=<?= $row["id"]; ?>" onclick="return confirm('Apakah ingin menghapus mahasiswa?')">Hapus</a></td>
              </tr>
            <?php
              $i++;
            }
            ?>
          </tbody>
        </table>
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
  <script src="../assets/datatables/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#tableStudents').DataTable();
    });
  </script>
</body>

</html>