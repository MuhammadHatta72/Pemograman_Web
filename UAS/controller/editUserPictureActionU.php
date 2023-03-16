<?php
include '../controller/function.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    editPictureUser($id);
    echo "
    <script>
        alert('Foto Pengguna Berhasil diubah');
        document.location.href = '../pages/profileU.php';
    </script>
    ";
} else {
    echo "
            <script>
                alert('Edit Foto Pengguna Terlebih dahulu!');
                document.location.href = '../pages/profileU.php';
            </script>
        ";
}
