<?php

$conn = mysqli_connect("localhost", "root", "", "dpw_uas");

function registerUser()
{
    global $conn;
    $nim = htmlspecialchars($_POST["nim"]);
    $email =  htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);
    $password_new = password_hash($password, PASSWORD_DEFAULT);

    $query_check_user = "SELECT * FROM users WHERE nim = '$nim'";
    $result = mysqli_query($conn, $query_check_user);
    if (mysqli_fetch_assoc($result)) {
        return mysqli_fetch_assoc($result);
    } else {
        $query = "INSERT INTO users VALUES (NULL, '$nim', '-', 'User', '-', '-', '-', '-', '-', '$email', '-', 2, '$password_new')";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }
}

function loginUser()
{
    global $conn;
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            session_start();
            $_SESSION["login"] = true;
            $_SESSION["id_user"] = $row["id_user"];
            $_SESSION["nim"] = $row["nim"];
            $_SESSION["first_name"] = $row["first_name"];
            $_SESSION["last_name"] = $row["last_name"];
            $_SESSION["gender"] = $row["gender"];
            $_SESSION["email"] = $row["email"];
            $_SESSION["departement"] = $row["departement"];
            $_SESSION["study_prog"] = $row["study_prog"];
            $_SESSION["year"] = $row["year"];
            $_SESSION["status_passed"] = $row["status_passed"];
            $_SESSION["picture"] = $row["picture"];
            $_SESSION["role"] = $row["role"];

            if ($row["role"] == 1) {
                $_SESSION["roleAdmin"] = true;
            } else if ($row["role"] == 2) {
                $_SESSION["roleUser"] = true;
            } else {
                $_SESSION["roleAdmin"] = false;
                $_SESSION["roleUser"] = false;
            }

            $return_login = [
                "role" => $row["role"],
            ];
            return $return_login;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function countBook()
{
    global $conn;
    $query = "SELECT * FROM books";
    $result = mysqli_query($conn, $query);
    return mysqli_num_rows($result);
}

function countBookReady()
{
    global $conn;
    $query = "SELECT SUM(available) AS 'countBookReady' FROM books";
    $result = mysqli_query($conn, $query);
    return $result;
}

function addBook()
{
    global $conn;
    $book_title = $_POST['book_title'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $year_public = $_POST['year_public'];
    $book_type = $_POST['book_type'];
    $bookcase_loc = $_POST['bookcase_loc'];
    $stocks = $_POST['stocks'];

    $namaFile = $_FILES['book_cover']['name'];
    $ukuranFile = $_FILES['book_cover']['size'];
    $error = $_FILES['book_cover']['error'];
    $tmpName = $_FILES['book_cover']['tmp_name'];
    // cek apakah tidak ada book_cover yang diupload
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
                alert('Yang anda upload bukan gambar!');
            </script>
            ";
        return false;
    }
    // cek jika ukurannya terlalu besar
    if ($ukuranFile > 1000000) {
        echo "
            <script>
                alert('Ukuran gambar terlalu besar!');
            </script>
            ";
        return false;
    }
    // lolos pengecekan, gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = "cover " . $book_title;
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, '../assets/coverBook/' . $namaFileBaru);

    $sql = "INSERT INTO books VALUES (NULL, '$book_title', '$publisher', '$author', '$year_public', '$book_type', '$bookcase_loc', '$stocks', '$stocks', '$namaFileBaru')";
    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
}

function getAllBooks()
{
    global $conn;
    $query = "SELECT * FROM books";
    $result = mysqli_query($conn, $query);
    return $result;
}

function getBook($id)
{
    global $conn;
    $query = "SELECT * FROM books WHERE id_book = $id";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($result);
}

function editBook($id)
{
    global $conn;
    $book_title = $_POST['book_title'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $year_public = $_POST['year_public'];
    $book_type = $_POST['book_type'];
    $bookcase_loc = $_POST['bookcase_loc'];
    // $stocks = $_POST['stocks'];
    $book_cover = $_POST['book_cover'];

    // var_dump($book_title, $author, $publisher, $year_public, $book_type, $bookcase_loc, $stocks, $book_cover);
    // die;

    // cek apakah user pilih gambar baru atau tidak
    if ($_FILES['book_cover_new']['error'] === 4) {
        $namaCoverNew = $book_cover;
    } else {
        $namaFile = $_FILES['book_cover_new']['name'];
        $ukuranFile = $_FILES['book_cover_new']['size'];
        $error = $_FILES['book_cover_new']['error'];
        $tmpName = $_FILES['book_cover_new']['tmp_name'];
        // cek apakah yang diupload adalah book_cover_new
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "
                <script>
                    alert('Yang anda upload bukan gambar!');
                </script>
                ";
            return false;
        }
        // cek jika ukurannya terlalu besar
        if ($ukuranFile > 1000000) {
            echo "
                <script>
                    alert('Ukuran gambar terlalu besar!');
                </script>
                ";
            return false;
        }
        // lolos pengecekan, gambar siap diupload

        //hapus gambar lama
        unlink("../assets/coverBook/$book_cover");

        // generate nama gambar baru
        $book_cover_new = "cover_" . $book_title;
        $book_cover_new .= '.';
        $book_cover_new .= $ekstensiGambar;
        move_uploaded_file($tmpName, '../assets/coverBook/' . $book_cover_new);
        $namaCoverNew = $book_cover_new;
    }

    $query = "UPDATE books SET book_title = '$book_title', author = '$author', publisher = '$publisher', year_public = '$year_public', book_type = '$book_type', bookcase_loc = '$bookcase_loc', book_cover = '$namaCoverNew' WHERE id_book = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function deleteBook($id)
{
    global $conn;
    //hapus cover
    $book = "SELECT * FROM books WHERE id_book = $id";
    $result = mysqli_query($conn, $book);
    $row = mysqli_fetch_assoc($result);
    $book_cover = $row["book_cover"];
    unlink("../assets/coverBook/$book_cover");

    //hapus data
    $query = "DELETE FROM books WHERE id_book = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function getBookReadyLend()
{
    global $conn;
    $query = "SELECT * FROM books WHERE available > 0";
    $result = mysqli_query($conn, $query);
    return $result;
}

function getAllUsers()
{
    global $conn;
    $query = "SELECT * FROM users WHERE role = 2";
    $result = mysqli_query($conn, $query);
    return $result;
}

function deleteUser($id)
{
    global $conn;
    //hapus gambar
    $user = "SELECT * FROM users WHERE id_user = $id";
    $result = mysqli_query($conn, $user);
    $row = mysqli_fetch_assoc($result);
    $picture = $row["picture"];
    if ($picture != "-") {
        unlink("../assets/pictureUser/$picture");
    }

    $query = "DELETE FROM users WHERE id_user = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function profileUser($id)
{
    global $conn;
    $query = "SELECT * FROM users WHERE id_user = $id";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($result);
}

function editUser($id)
{
    global $conn;
    $nim = $_POST['nim'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $departement = $_POST['departement'];
    $study_prog = $_POST['study_prog'];
    $year = $_POST['year'];
    $status_passed = $_POST['status_passed'];
    $password_old = $_POST['password_old'];
    $password_new = $_POST['password_new'];

    $user = "SELECT * FROM users WHERE id_user = $id";
    $result = mysqli_query($conn, $user);
    $row = mysqli_fetch_assoc($result);
    $password = $row["password"];

    if ($password_old === '' && $password_new === '') {
        $password_update = $password;
    } else {
        if (password_verify($password_old, $password)) {
            $password_update = password_hash($password_new, PASSWORD_DEFAULT);
        } else {
            $password_update = $password;
        }
    }

    $query = "UPDATE `users` SET `nim`='$nim',`first_name`='$first_name',`last_name`='$last_name',`departement`='$departement',`study_prog`='$study_prog',`year`='$year',`status_passed`='$status_passed',`gender`='$gender',`email`='$email', `password`='$password_update' WHERE id_user = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function editPictureUser($id)
{
    global $conn;
    $picture = $_FILES['picture']['name'];
    $ukuranFile = $_FILES['picture']['size'];
    $error = $_FILES['picture']['error'];
    $tmpName = $_FILES['picture']['tmp_name'];
    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $picture);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "
            <script>
                alert('Yang anda upload bukan gambar!');
            </script>
            ";
        return false;
    }
    // cek jika ukurannya terlalu besar
    if ($ukuranFile > 1000000) {
        echo "
            <script>
                alert('Ukuran gambar terlalu besar!');
            </script>
            ";
        return false;
    }
    // lolos pengecekan, gambar siap diupload

    //hapus gambar lama
    $user = "SELECT * FROM users WHERE id_user = $id";
    $result = mysqli_query($conn, $user);
    $row = mysqli_fetch_assoc($result);
    $picture_old = $row["picture"];
    if ($picture_old != "-") {
        unlink("../assets/pictureUser/$picture_old");
    }

    // generate nama gambar baru
    $picture_new = "picture_" . $row['nim'];
    $picture_new .= '.';
    $picture_new .= $ekstensiGambar;
    move_uploaded_file($tmpName, '../assets/pictureUser/' . $picture_new);
    $namaPictureNew = $picture_new;

    $query = "UPDATE users SET picture = '$namaPictureNew' WHERE id_user = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function deletePictureUser($id)
{
    global $conn;
    //hapus gambar lama
    $user = "SELECT * FROM users WHERE id_user = $id";
    $result = mysqli_query($conn, $user);
    $row = mysqli_fetch_assoc($result);
    $picture_old = $row["picture"];
    unlink("../assets/pictureUser/$picture_old");

    $query = "UPDATE users SET picture = '-' WHERE id_user = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


//Transaction
function lendBook($id_book, $id_user)
{
    global $conn;
    //kurangi 1 available
    $book = "SELECT * FROM books WHERE id_book = $id_book";
    $result = mysqli_query($conn, $book);
    $row = mysqli_fetch_assoc($result);
    $available = $row["available"];
    if ($available == 0) {
        echo "
            <script>
                alert('Buku tidak tersedia!');
            </script>
            ";
        return false;
    }
    $available_update = $available - 1;
    $query = "UPDATE books SET available = '$available_update' WHERE id_book = $id_book";
    mysqli_query($conn, $query);

    $date = date('Y-m-d');
    $date_return = date('Y-m-d', strtotime('+3 days', strtotime($date)));
    $queryTransaction = "INSERT INTO transaction_book VALUES (NULL, '$id_user', '$id_book', '$date', '$date_return', '-', 'Dipinjam', '-')";
    mysqli_query($conn, $queryTransaction);
    return mysqli_affected_rows($conn);
}

function returnBook($id_transaction)
{
    global $conn;
    $transaction = "SELECT * FROM transaction_book WHERE id_transaction = $id_transaction";
    $result = mysqli_query($conn, $transaction);
    $row = mysqli_fetch_assoc($result);

    $id_book = $row["id_book"];

    $date_return = $row["return_date"];
    $date_return_real = date('Y-m-d');
    if ($date_return < $date_return_real) {
        $date1 = new DateTime($date_return);
        $date2 = new DateTime($date_return_real);
        $diff = $date2->diff($date1)->format("%a");
        $fine = $diff * 10000;
        $condition_trans = "Terlambat";
    } else {
        $fine = 0;
        $condition_trans = "Tepat Waktu";
    }

    $query = "UPDATE transaction_book SET status = 'Dikembalikan', fine = '$fine', condition_trans = '$condition_trans' WHERE id_transaction = $id_transaction";
    mysqli_query($conn, $query);

    //tambah 1 available
    $book = "SELECT * FROM books WHERE id_book = $id_book";
    $result = mysqli_query($conn, $book);
    $row = mysqli_fetch_assoc($result);
    $available = $row["available"];
    $available_update = $available + 1;
    $query = "UPDATE books SET available = '$available_update' WHERE id_book = $id_book";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function getAllLendBook($id_user)
{
    global $conn;
    $query = "SELECT * FROM transaction_book JOIN users ON transaction_book.id_user = users.id_user JOIN books ON transaction_book.id_book = books.id_book WHERE status = 'Dipinjam' AND users.id_user = '$id_user'";
    $result = mysqli_query($conn, $query);
    return $result;
}

function getAllReturnBook($id_user)
{
    global $conn;
    $query = "SELECT * FROM transaction_book JOIN users ON transaction_book.id_user = users.id_user JOIN books ON transaction_book.id_book = books.id_book WHERE status = 'Dikembalikan' AND users.id_user = '$id_user'";
    $result = mysqli_query($conn, $query);
    return $result;
}

function getsLendBook()
{
    global $conn;
    $query = "SELECT * FROM transaction_book JOIN users ON transaction_book.id_user = users.id_user JOIN books ON transaction_book.id_book = books.id_book WHERE status = 'Dipinjam'";
    $result = mysqli_query($conn, $query);
    return $result;
}

function getsReturnBook()
{
    global $conn;
    $query = "SELECT * FROM transaction_book JOIN users ON transaction_book.id_user = users.id_user JOIN books ON transaction_book.id_book = books.id_book WHERE status = 'Dikembalikan'";
    $result = mysqli_query($conn, $query);
    return $result;
}

function getAllTransaction()
{
    global $conn;
    $query = "SELECT * FROM transaction_book JOIN users ON transaction_book.id_user = users.id_user JOIN books ON transaction_book.id_book = books.id_book";
    $result = mysqli_query($conn, $query);
    return $result;
}
