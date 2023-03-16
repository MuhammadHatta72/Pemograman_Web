<?php
    session_start();

    if(!isset($_SESSION["login"]))
    {
        echo $_SESSION["login"];
        header("Location:login.php");
        exit;
    }
    require 'functions.php';
    
    //configuration pagination
    //data yang mau ditampilkan berapa perhalaman  
    $jumlahdataperhalaman=2;

    //cek jumlah seluruh data
    $jumlahdata=count(query("SELECT * FROM mahasiswa"));
    //rvar_dump($jumlahdata);

    //bulatkan hasil pembagian 
    //round-> pembulatan bilangan pecahan ke desimal terdekat
    //floor->pembulatan bilangan pecahan ke bawah
    //ceil->pembulatan bilangan pecahan ke atas
    $jumlahhalaman= ceil($jumlahdata/$jumlahdataperhalaman);
   
    //untuk mengetahui yang aktif di browser ada pada halaman keberapa
    //cara mengambil pada url browser
    //gunakan operator ternary
    // https://davidwalsh.name/php-shorthand-if-else-ternary-operators
    $halamanaktif=(isset($_GET["halaman"])?$_GET["halaman"]:1);
    // var_dump($halamanaktif);
    
    //semisal jumlahhalaman=2 halaman=2(halaman 1->index 0 dan index1, halaman 2->index 2 dan index 3)  maka awal_datanya=2(index ke 2) 
    $dataawal=($jumlahdataperhalaman*$halamanaktif)-$jumlahdataperhalaman;
    
    // limit terdapat 2 nilai -> nilai pertama index awal dan nilai kedua berapa data yang akan ditampilkan
    // limit 0,3 (0->index;3->3 data yang akan ditampilkan)
     $mahasiswa=query(" SELECT * FROM mahasiswa LIMIT $dataawal,$jumlahdataperhalaman");

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

<a href="logout.php">Logout</a>

<a href="tambah_data.php">Tambah Data Mahasiswa</a> 
<br><br>

<form action="" method="post">
    <!-- autofocus atribut pada html 5 yang digunakan untuk memberikan tanda pertama kali ke inputan pada saat page di reload-->
    <!-- placeholder atribut yang digunakan untuk menampilkan tulisan pada textbox -->
    <!-- autocomplete digunakan agar history pencarian dari user lain tidak ada -->
    <input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian" autocomplete="off">
    <button type="submit" name="cari"> cari </button>
</form>

<!-- navigasi -->
<?php for($i=0;$i<=jumlahhalaman;$i++):?>
<a href=""><?php echo $i; ?></a>
<?php endfor;?>

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

