<?php
include "../controller/function.php";

if ($_GET['id']) {
    $id = $_GET['id'];
    if (deleteUser($id) > 0) {
        echo "
    <script>
        alert('Pengguna Berhasil Dihapus');
        document.location.href = './usersA.php';
    </script>
    ";
    } else {
        echo "
    <script>
        alert('Pengguna Gagal Dihapus');
        document.location.href = './usersA.php';
    </script>
    ";
    }
    mysqli_close($conn);
} else {
    echo "
    <script>
        alert('Pengguna Gagal Dihapus');
        document.location.href = './usersA.php';
    </script>
    ";
}
