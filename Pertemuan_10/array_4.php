<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <h2>Associative Array</h2>
    <?php
    $mobil['merk']='Toyota';
    $mobil['type']='Fortuner';
    $mobil['tahun']='2018';

    echo '<table>
    <tr>
        <td>Key</td>
        <td>Value</td>
    </tr>';
foreach ($mobil as $key => $value) {
echo '<tr>
<td>'.$key.'</td>
<td>'.$value.'</td>
</tr>';
}

echo '</table>';
    ?>
</body>
</html>