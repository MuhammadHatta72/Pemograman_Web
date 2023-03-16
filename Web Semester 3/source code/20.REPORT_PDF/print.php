<?php
require_once __DIR__ . '/vendor/autoload.php';
require 'functions.php';
$mahasiswa=query(" SELECT * FROM mahasiswa ");
// $mpdf = new \Mpdf\Mpdf();//jika versi mPDFnya versi 7
$mpdf = new \mPDF('utf-8','A4',''); //karena versi dari mPdfnya versi 6

//perlu diingat mPDF ini kita akan bermain dengan string
$html='
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Mahasiswa</title>
    <link rel="stylesheet" href="css/print.css"
</head>
<body>
    <h1> Daftar Mahasiswa </h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Nim</th>
            <th>Email</th>
            <th>Jurusan</th>
            <th>Gambar</th>
        </tr>';
        $i=1;
        foreach($mahasiswa as $row)
        {
            $html .='<tr>
            <td>'.$i++.'</td>
            <td>'.$row["nama"].'</td>
            <td>'.$row["nim"].'</td>
            <td>'.$row["email"].'</td>
            <td>'.$row["jurusan"].'</td>
            <td> <img src="image/'.$row["gambar"]. '"height="100" width="100"/> </td>
            </tr>';
            
        }     
// .= artinya menggabungkan 2 string sebelumnya dan string sesudahnya 
 $html .='</table>
</body>
</html>
';
$mpdf->WriteHTML($html);
// $filename = $filename.".pdf";//You might be not adding the extension, 
$mpdf->Output();
