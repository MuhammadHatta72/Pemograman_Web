<?php
include '../controller/function.php';

if (isset($_POST['submit'])) {
    if (addBook() > 0) {
        echo "
    <script>
        alert('Buku Berhasil ditambahkan');
        document.location.href = '../pages/booksA.php';
    </script>
    ";
    } else {
        echo "
    <script>
        alert('Buku Gagal ditambahkan');
        document.location.href = '../pages/booksA.php';
    </script>
    ";
    }
} else {
    echo "
            <script>
                alert('Tambah Buku Terlebih dahulu!');
                document.location.href = '../pages/booksA.php';
            </script>
        ";
}
