<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <?php
    $rawString = "Welcome Birmingham Parent. Your replacement is a pleasure to have!";
    $malestr = str_replace("replacement", "son", $rawString);
    $femalestr = str_replace("replacement", "daughter", $rawString);

    echo "Son : " . $malestr . "<br>";
    echo "Daughter : " . $femalestr . "<br>";
    ?>
</body>
</html>