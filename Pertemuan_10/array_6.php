<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <h2>Fungsi count()</h2>
    <?php
    $menu = array("rawon", "sate", "nasi goreng");
    $arrayLength = count($menu);

    echo "Menu hari ini adalah : <br> ";
    for ($x=0; $x < $arrayLength; $x++) { 
        echo $menu[$x] . "<br>";
    }
    echo "<br> Saya lapar, saya ingin makan " . "<b>$menu[0]</b>";
    ?>
</body>
</html>