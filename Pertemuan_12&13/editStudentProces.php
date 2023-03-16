<?php
include 'function.php';

// cek apakah tombol submit sudah ditekan atau belum
if(isset($_POST["submit"])){
    $id = $_POST["id"];
    if(editStudent($id) > 0){
        echo "
            <script>
                alert('Data berhasil diubah');
                document.location.href = 'students.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal diubah');
                document.location.href = 'students.php';
            </script>
        ";
    }
}