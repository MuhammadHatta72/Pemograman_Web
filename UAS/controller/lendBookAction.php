<?php
include '../controller/function.php';

if (isset($_POST['submit'])) {
    $id_book = $_POST['book'];
    $id_user = $_POST['user'];
    lendBook($id_book, $id_user);

    echo "
    <script>
        alert('Buku Berhasil dipinjam');
        document.location.href = '../pages/transactionU.php';
    </script>
    ";
} else {
    echo "
            <script>
                alert('Pinjam Buku Terlebih dahulu!');
                document.location.href = '../pages/transactionU.php';
            </script>
        ";
}
