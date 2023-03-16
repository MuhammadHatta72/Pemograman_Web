<?php
include '../controller/function.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    editBook($id);
    echo "
    <script>
        alert('Buku Berhasil diubah');
        document.location.href = '../pages/booksA.php';
    </script>
    ";
} else {
    echo "
            <script>
                alert('Edit Buku Terlebih dahulu!');
                document.location.href = '../pages/booksA.php';
            </script>
        ";
}
