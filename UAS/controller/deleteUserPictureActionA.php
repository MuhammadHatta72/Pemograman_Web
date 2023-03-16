<?php
include '../controller/function.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    deletePictureUser($id);
    echo "
    <script>
        alert('Foto Pengguna Berhasil dihapus');
        document.location.href = '../pages/profileA.php';
    </script>
    ";
} else {
    echo "
            <script>
                alert('Edit Foto Pengguna Terlebih dahulu!');
                document.location.href = '../pages/profileA.php';
            </script>
        ";
}
