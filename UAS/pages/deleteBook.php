<?php
include "../controller/function.php";

if ($_GET['id']) {
    $id = $_GET['id'];
    if (deleteBook($id) > 0) {
        echo "
    <script>
        alert('Buku Berhasil Dihapus');
        document.location.href = './booksA.php';
    </script>
    ";
    } else {
        echo "
    <script>
        alert('Buku Gagal Dihapus');
        document.location.href = './booksA.php';
    </script>
    ";
    }
    mysqli_close($conn);
} else {
    echo "
    <script>
        alert('Buku Gagal Dihapus');
        document.location.href = './booksA.php';
    </script>
    ";
}
