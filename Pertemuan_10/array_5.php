<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        table{
            border: 1px solid black;
            border-collapse: collapse;
            border-spacing : 0;
            width: 100%;
        }
        th, td{
            text-align:left;
padding: 16px;
        }
        tr:nth-child(even){
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Multidimensional Array</h2>
    <table>
        <tr>
            <th>Key</th>
            <th>Value</th>
        </tr>
        <?php
        $movie = array(
            array("Avengers Invinity", 2018, 8.7),
            array("The Avengers", 2012, 8.1),
            array("Guardians of the Galaxy", 2014, 6.1),
            array("Iron Man", 2018, 7.9)
        );

        echo "<tr>";
        echo "<td>" . $movie[0][0] . "</td>";
        echo "<td>" . $movie[0][1] . "</td>";
        echo "<td>" . $movie[0][2] . "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>" . $movie[1][0] . "</td>";
        echo "<td>" . $movie[1][1] . "</td>";
        echo "<td>" . $movie[1][2] . "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>" . $movie[2][0] . "</td>";
        echo "<td>" . $movie[2][1] . "</td>";
        echo "<td>" . $movie[2][2] . "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>" . $movie[3][0] . "</td>";
        echo "<td>" . $movie[3][1] . "</td>";
        echo "<td>" . $movie[3][2] . "</td>";
        echo "</tr>";
        ?>
    </table>
</body>
</html>