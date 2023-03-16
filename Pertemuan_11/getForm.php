<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
    <?php
    if(isset($_GET['myname']) AND isset($_GET['myaddress'])){
        echo "Selamat Datang " . $_GET["myname"] . "!! <br>";
        echo "Dari " . $_GET["myaddress"];
    }else{
        echo "Anda belum mengakses halaman ini dari form.html";
    }
    ?>
</body>

</html>