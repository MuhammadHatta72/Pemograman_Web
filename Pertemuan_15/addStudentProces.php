<?php
include 'function.php';

if(isset($_POST["submit"])){
    if(addStudent() > 0){
        echo "
    <script>
        alert('Data berhasil ditambahkan');
        document.location.href = 'students.php';
    </script>
    ";
    } else {
        echo "
    <script>
        alert('Data gagal ditambahkan');
        document.location.href = 'students.php';
    </script>
    ";
    }
}