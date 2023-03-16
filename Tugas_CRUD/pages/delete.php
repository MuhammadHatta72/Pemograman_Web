<?php
include('../src/connect.php');

$id = $_POST['no'];

if ($id) {
    $query_student = mysqli_query($conn, "SELECT * FROM students WHERE id = $id");
    $result_student = mysqli_num_rows($query_student);
    if ($result_student > 0) {
        mysqli_query($conn, "DELETE FROM students WHERE id=$id");
        header("Location:index.php");
    } else {
        header("Location:index.php");
    }
} else {
    header("Location:index.php");
}
