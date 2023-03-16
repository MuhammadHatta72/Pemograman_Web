<?php
$conn = mysqli_connect("localhost", "root", "", "dpw_p12");

function getAllStudents()
{
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM mahasiswa");
    return $result;
}

function deleteStudent($id)
{
    global $conn;
    //hapus gambar
    $sql = "SELECT * FROM mahasiswa WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $namaFile = $row["gambar"];
    unlink("./imgStudents/$namaFile");

    //hapus data
    $sql = "DELETE FROM mahasiswa WHERE id = $id";
    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
}

function addStudent()
{
    global $conn;
    $nama = $_POST["nama"];
    $nim = $_POST["nim"];
    $email = $_POST["email"];
    $jurusan = $_POST["jurusan"];
    // $gambar = $_POST["gambar"];

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];
    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "
            <script>
                alert('Pilih gambar terlebih dahulu');
            </script>
            ";
        return false;
    }
    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "
            <script>
                alert('Yang anda upload bukan gambar');
            </script>
            ";
        return false;
    }
    // cek jika ukurannya terlalu besar
    if ($ukuranFile > 1000000) {
        echo "
            <script>
                alert('Ukuran gambar terlalu besar');
            </script>
            ";
        return false;
    }
    // lolos pengecekan, gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = "img_" . $nama;
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, './imgStudents/' . $namaFileBaru);

    $sql = "INSERT INTO mahasiswa VALUES (NULL, '$nama', '$nim', '$email', '$jurusan', '$namaFileBaru')";
    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
}

function getStudent($id)
{
    global $conn;
    $sql = "SELECT * FROM mahasiswa WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}

function editStudent($id)
{
    global $conn;
    $nama = $_POST["nama"];
    $nim = $_POST["nim"];
    $email = $_POST["email"];
    $jurusan = $_POST["jurusan"];
    $gambarLama = $_POST["gambarLama"];

    // cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $namaFile = $gambarLama;
    } else {
        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];
        // cek apakah yang diupload adalah gambar
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "
                <script>
                    alert('Yang anda upload bukan gambar');
                </script>
                ";
            return false;
        }
        // cek jika ukurannya terlalu besar
        if ($ukuranFile > 1000000) {
            echo "
                <script>
                    alert('Ukuran gambar terlalu besar');
                </script>
                ";
            return false;
        }
        // lolos pengecekan, gambar siap diupload
        // generate nama gambar baru
        $namaFileBaru = "img_" . $nama;
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;
        move_uploaded_file($tmpName, './imgStudents/' . $namaFileBaru);
        $namaFile = $namaFileBaru;

        //hapus gambar lama
        unlink("./imgStudents/$gambarLama");
    }

    $sql = "UPDATE mahasiswa SET nama = '$nama', nim = '$nim', email = '$email', jurusan = '$jurusan', gambar = '$namaFile' WHERE id = $id";
    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
}

function searchStudent($keyword)
{
    global $conn;
    if ($keyword == "") {
        global $conn;
        $result = mysqli_query($conn, "SELECT * FROM mahasiswa");
        return $result;
    } else {
        $sql = "SELECT * FROM mahasiswa WHERE nama LIKE '%$keyword%' OR nim LIKE '%$keyword%' OR email LIKE '%$keyword%' OR jurusan LIKE '%$keyword%'";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
}
