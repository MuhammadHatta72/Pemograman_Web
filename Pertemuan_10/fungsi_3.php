<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <h2>Fungsi Menghitung Luas Lingkaran</h2>
    <?php
    echo "Luas Lingkaran dengan jari-jari 3 cm adalah " . luasLingkaran(3) . " cm";

    function luasLingkaran($jariJari) {
        return 3.14 * $jariJari * $jariJari;
    }
    ?>
</body>
</html>