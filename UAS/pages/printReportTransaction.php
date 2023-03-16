<?php
include '../vendor/autoload.php'; //jika versi mPDFnya versi 7
include "../controller/function.php";

$transactions = getAllTransaction();
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
    <title>Laporan Daftar Peminjaman & Pengembalian Buku</title>
    <link rel="stylesheet" href="css/print.css"
</head>
<body>
    <h1 style="text-align: center;">LAPORAN DAFTAR PEMINJAMAN & PENGEMBALIAN BUKU</h1>
    <h2 style="text-align: center;">PERPUSTAKAAN ONLINE</h2>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Judul Buku</th>
            <th>Nama Peminjam</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
            <th>Kondisi</th>
            <th>Denda</th>
        </tr>';
$i = 1;
while ($row = mysqli_fetch_assoc($transactions)) {
    $html .= '<tr>
            <td>' . $i . '</td>
            <td>' . $row["book_title"] . '</td>
            <td>' . $row['first_name'] . " " . $row['last_name'] . '</td>
            <td>' . $row["borrow_date"] . '</td>
            <td>' . $row["return_date"] . '</td>
            <td>' . $row["status"] . '</td>
            <td>' . $row["condition_trans"] . '</td>
            <td>' . $row["fine"] . '</td>
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
$mpdf->Output('Laporan Daftar Peminjaman dan Pengembalian Buku.pdf', 'I');
