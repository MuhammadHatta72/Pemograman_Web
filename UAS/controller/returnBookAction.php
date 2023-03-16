<?php
include '../controller/function.php';

if (isset($_POST['submit'])) {
    $id_transaction = $_POST['transaction'];
    returnBook($id_transaction);

    echo "
    <script>
        alert('Buku Berhasil Dikembalikan');
        document.location.href = '../pages/returnBookA.php';
    </script>
    ";
} else {
    echo "
            <script>
                alert('Kembalikan Buku Terlebih dahulu!');
                document.location.href = '../pages/returnBookA.php';
            </script>
        ";
}
