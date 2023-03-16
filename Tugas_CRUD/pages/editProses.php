<?php
include("../src/connect.php");

if (isset($_POST["Submit"])) {
    $id = $_POST["no"];
    $name_student = $_POST["name_student"];
    $date_birth_student = $_POST["date_birth_student"];
    $gender_student = $_POST["gender_student"];
    $religion_student = $_POST["religion_student"];
    $address_student = $_POST["address_student"];
    $origin_school_student = $_POST["origin_school_student"];

    // var_dump($id, $name_student, $date_birth_student, $gender_student, $religion_student, $address_student, $origin_school_student);
    // die;
    $query = mysqli_query($conn, "UPDATE students SET name='$name_student', date_birth='$date_birth_student',gender='$gender_student', religion='$religion_student', address='$address_student',origin_school='$origin_school_student' WHERE id = $id");
    // if ($query) {
    //     echo "Berhasil";
    //     die;
    // } else {
    //     echo "gagal";
    //     die;
    // }
    header("Location: index.php");
} else {
    header("Location: edit.php");
}
// UPDATE `students` SET `id`=[value-1],`name`=[value-2],`date_birth`=[value-3],`gender`=[value-4],`religion`=[value-5],`address`=[value-6],`origin_school`=[value-7] WHERE 1