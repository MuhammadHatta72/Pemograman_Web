<?php
include '../vendor/autoload.php'; //jika versi mPDFnya versi 7
include "../controller/function.php";

$books = getAllBooks();
// $mpdf = new \Mpdf\Mpdf();//jika versi mPDFnya versi 7
$mpdf = new \mPDF('utf-8', 'A4-L', ''); //karena versi dari mPdfnya versi 6

//perlu diingat mPDF ini kita akan bermain dengan string
$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Daftar Buku</title>
    <link rel="stylesheet" href="css/print.css"
</head>
<body>
    <h1 style="text-align: center;">LAPORAN DAFTAR BUKU</h1>
    <h2 style="text-align: center;">PERPUSTAKAAN ONLINE</h2>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Cover Buku</th>
            <th>Judul Buku</th>
            <th>Penerbit</th>
            <th>Pengarang</th>
            <th>Tahun Terbit</th>
            <th>Jenis Buku</th>
            <th>Jumlah Buku</th>
        </tr>';
$i = 1;
while ($row = mysqli_fetch_assoc($books)) {
    $html .= '<tr>
            <td>' . $i . '</td>
            <td> <img src="../assets/coverBook/' . $row["book_cover"] . '"height="100" width="100"/> </td>
            <td>' . $row["book_title"] . '</td>
            <td>' . $row["publisher"] . '</td>
            <td>' . $row["author"] . '</td>
            <td>' . $row["year_public"] . '</td>
            <td>' . $row["book_type"] . '</td>
            <td>' . $row["stocks"] . '</td>
            </tr>';
    $i++;
}
// .= artinya menggabungkan 2 string sebelumnya dan string sesudahnya 
$html .= '</table>
</body>
</html>
';
$mpdf->WriteHTML($html);
// $filename = $filename . ".pdf"; //You might be not adding the extension, 
$mpdf->Output('Laporan Daftar Buku.pdf', 'I');
