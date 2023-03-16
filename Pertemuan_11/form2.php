<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .error{
            color:#FF0000;
        }
    </style>
</head>
<body>
    <?php
    if(isset($_GET['error'])){
        $error = $_GET['error'];
    }else{
        $error = "";
    }

    $pesan = "";
    if($error == "variabel_belum_diset"){
        $pesan = "Anda harus mengakses halaman ini dari form2.ohp";
    }else if($error == "nama_kosong"){
        $pesan = "Nama harus diisi";
    }else if($error == "email_kosong"){
        $pesan = "Email harus diisi";
    }

    if(isset($_GET['nama']) AND isset($_GET['email']) AND isset($_GET['komentar'])){
        $nama = $_GET['nama'];
        $email = $_GET['email'];
        $komentar = $_GET['komentar'];
    }else{
        $nama = "";
        $email = "";
        $komentar = "";
    }
    ?>

    <span class="error"><?= $pesan; ?></span>

    <table>
        <form action="prosesForm_2.php" method="get">
            <tr>
                <td>Nama :</td>
                <td><input type="text" name="nama" value="<?= $nama; ?>"></td>
            </tr>
            <tr>
                <td>Email :</td>
                <td><input type="text" name="email" value="<?= $email; ?>"></td>
            </tr>
            <tr>
                <td>Komentar :</td>
                <td><textarea type="text" name="komentar" ><?= $komentar; ?></textarea></td>
            </tr>
            <tr>
                <td><input type="submit" value="Kirim" name="kirim"></td>
            </tr>
        </form>
    </table>
</body>
</html>