<?php
include("../src/connect.php");

if (isset($_POST["Submit"])) {
    $name_student = $_POST["name_student"];
    $date_birth_student = $_POST["date_birth_student"];
    $gender_student = $_POST["gender_student"];
    $religion_student = $_POST["religion_student"];
    $address_student = $_POST["address_student"];
    $origin_school_student = $_POST["origin_school_student"];

    // var_dump($name_student, $date_birth_student, $gender_student, $religion_student, $address_student, $origin_school_student);
    // die;
    mysqli_query($conn, "INSERT INTO students VALUES(null, '$name_student','$date_birth_student','$gender_student', '$religion_student', '$address_student', '$origin_school_student')");
    header("Location: index.php");
} else {
    header("Location: tambah.php");
}
// INSERT INTO `students` (`id`, `name`, `date_birth`, `gender`, `religion`, `address`, `origin_school`) VALUES (NULL, 'Muhammad Hatta', '28-10-2002', 'Laki-laki', 'Islam', 'Tuban', 'SMKN 1 Tambakboyo');