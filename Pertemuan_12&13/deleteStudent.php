<?php
include 'function.php';

if($_GET['id']){
    $id = $_GET['id'];
    if(deleteStudent($id) > 0){
        echo "
    <script>
        alert('Data berhasil dihapus');
        document.location.href = 'students.php';
    </script>
    ";
    } else {
        echo "
    <script>
        alert('Data gagal dihapus');
        document.location.href = 'students.php';
    </script>
    ";
    }
    mysqli_close($conn);
}else{
    echo "
    <script>
        alert('Data gagal dihapus');
        document.location.href = 'students.php';
    </script>
    ";
}
?>