<?php
include '../controller/function.php';

if (isset($_POST['submit'])) {
    if (loginUser() > 0) {
        if ($_SESSION['role'] == 1) {
            echo "
                <script>
                    alert('Login Sukses!');
                    document.location.href = '../pages/dashboardA.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Login Sukses!');
                    document.location.href = '../pages/dashboardU.php';
                </script>
            ";
        }
    } else {
        echo "
            <script>
                alert('Login Gagal!');
                document.location.href = '../pages/login.php';
            </script>
        ";
    }
} else {
    echo "
        <script>
            alert('Login Gagal');
            document.location.href = '../pages/login.php';
        </script>
    ";
}
