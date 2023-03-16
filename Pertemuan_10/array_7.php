<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <h2>Sorting Array</h2>
    <?php
    $numbers = array(8, 4, 1, 9, 23, 54, 17, 30);
    rsort($numbers);

    $arrayLength = count($numbers);
    for ($x=0; $x < $arrayLength; $x++) { 
        echo $numbers[$x] . "<br>";
    }
    ?>
</body>
</html>