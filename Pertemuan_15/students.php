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
  <!-- <link rel="stylesheet" href="./css/bootstrap.min.css"> -->
</head>

<body>

  <div class="container mt-2">
    <a href="addStudent.php" class="btn btn-success mt-2">Tambah Mahasiswa</a>
    <form action="" method="GET">
      <input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian" autocomplete="off">
      <button type="submit" name="submit">Cari</button>
    </form>
    <h2 class="text-center mt-2 mb-2">DAFTAR MAHASISWA</h2>
    <div class="card">
      <div class="card-body">
        <table class="table" id="tableStudents">
          <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Email</th>
            <th>Jurusan</th>
            <th>Gambar</th>
            <th>Aksi</th>
          </tr>
          <?php
          $i = 1;
          if (isset($_GET["submit"])) {
            $keyword = $_GET["keyword"];
            $allStudents = searchStudent($keyword);
            if ($allStudents == false) {
              echo "
              <tr>
                <td colspan='7' class='text-center'>Data tidak ditemukan</td>
              </tr>
              ";
            } else {
              foreach ($allStudents as $student) {
          ?>
                <tr>
                  <td><?= $i++; ?></td>
                  <td><?= $student['nama']; ?></td>
                  <td><?= $student["nim"]; ?></td>
                  <td><?= $student["email"]; ?></td>
                  <td><?= $student["jurusan"]; ?></td>
                  <td><img src="./imgStudents/<?= $student["gambar"]; ?>" width="50"></td>
                  <td>
                    <a href="editStudent.php?id=<?= $student["id"]; ?>" class="btn btn-warning">Edit</a>
                    <a href="deleteStudent.php?id=<?= $student["id"]; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Delete</a>
                  </td>
                </tr>
              <?php
              }
            }
          } else {
            $allStudents = getAllStudents();
            while ($row = mysqli_fetch_assoc($allStudents)) { ?>
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
          }
          ?>
        </table>
      </div>
    </div>


    <!-- Bootstrap Js -->
    <!-- <script src="./js/jquery-3.3.1.slim.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script> -->


</body>

</html>