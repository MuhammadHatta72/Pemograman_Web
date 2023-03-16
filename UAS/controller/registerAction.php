<?php
include '../controller/function.php';

if (isset($_POST['submit'])) {
    if (registerUser() > 0) {
        echo "
                <script>
                    alert('Register Sukses!');
                    document.location.href = '../pages/login.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Register Gagal!');
                    document.location.href = '../pages/register.php';
                </script>
            ";
    }
} else {
    echo "
            <script>
                alert('Register Gagal');
                document.location.href = '../pages/register.php';
            </script>
        ";
}
