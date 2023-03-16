<?php
include '../controller/function.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    editUser($id);
    echo "
    <script>
        alert('Pengguna Berhasil diubah');
        document.location.href = '../pages/profileU.php';
    </script>
    ";
} else {
    echo "
            <script>
                alert('Edit Pengguna Terlebih dahulu!');
                document.location.href = '../pages/profileU.php';
            </script>
        ";
}
