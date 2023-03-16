<?php
     require 'functions.php';
    $mahasiswa=query(" SELECT * FROM mahasiswa");

    //tombol cari ditekan
    //cari pada line 7 adalah name dari button
    if(isset($_POST["cari"]))
    {
        // cari line 10 adalah function cari dan keyword adalah name dari inputan text 
        $mahasiswa=cari($_POST["keyword"]);
    }
?>
 
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Mahasiswa</title>
</head>
<body>
<h1> Daftar Mahasiswa </h1>

<a href="tambah_data.php">Tambah Data Mahasiswa</a> 
<br><br>

<form action="" method="post">
    <!-- autofocus atribut pada html 5 yang digunakan untuk memberikan tanda pertama kali ke inputan pada saat page di reload-->
    <!-- placeholder atribut yang digunakan untuk menampilkan tulisan pada textbox -->
    <!-- autocomplete digunakan agar history pencarian dari user lain tidak ada -->
    <input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian" autocomplete="off">
    <button type="submit" name="cari"> cari </button>
</form>
<br>

<table border="1" cellpadding="10" cellspacing="0">
<tr>
    <th>No.</th>
    <th>Nama</th>
    <th>Nim</th>
    <th>Email</th>
    <th>Jurusan</th>
    <th>Gambar</th>
    <th>Aksi</th>
</tr>
<?php $i=1 ?>

<?php foreach ($mahasiswa as $row):?>
<tr>
    <td><?=  $i; ?></td>
    <td><?=  $row["Nama"]; ?></td>
    <td><?=  $row["Nim"]; ?></td>
    <td><?=  $row["Email"]; ?></td>
    <td><?=  $row["Jurusan"]; ?></td>
    <td> <img src="image/<?php echo $row["Gambar"]; ?>" alt="" height="100" width="100" srcset=""></td>
    <td>
        <a href="edit.php?id=<?php echo $row["id"];?>">Edit</a>
        <a href="hapus.php?id=<?php echo $row["id"];?>"onclick="return confirm('Apakah data ini akan dihapus')">Hapus</a>
    </td>
</tr>
<?php $i++ ?>
<?php endforeach;?>

</table>
</body>
</html>

