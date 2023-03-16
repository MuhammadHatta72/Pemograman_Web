<?php
// membuat koneksi
$conn=mysqli_connect("localhost","root","","phpdatabase");
// cek koneksi jika error
if (!$conn) {
    die('Koneksi Error : '.mysqli_connect_errno() 
    .' - '.mysqli_connect_error());
 }
//ambil data dari tabel mahasiswa/query data mahasiswa
$result=mysqli_query($conn,"SELECT * FROM mahasiswa");  

// function query akan menerima isi paramater dari string query yg ada pada index2.php (line 3)
function query($query_kedua)
{
    // dikarenakan $conn diluar function query maka dibutuhkan scope global $conn
    global $conn; 
    $result = mysqli_query($conn,$query_kedua);
    // wadah kosong untuk menampung isi array pada saat looping line 16
    $rows = [];
    while ( $row = mysqli_fetch_assoc($result)){
        $rows[]=$row;    
    }
    return $rows;
}

function tambah ($data)
{
    global $conn;

    $nama   =htmlspecialchars($data["Nama"]) ;
    $nim    =htmlspecialchars($data["Nim"]);
    $email  =htmlspecialchars($data["Email"]);
    $jurusan=htmlspecialchars($data["Jurusan"]);
    // $gambar=htmlspecialchars($data["Gambar"]);

    $gambar=upload();
    if(!$gambar)
    {
        return false;
    }

    $query= " INSERT INTO mahasiswa
                VALUES
                ('','$nama','$nim','$email','$jurusan','$gambar')";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);

}

function upload()
{   
    //return false;
    //G ambar adalah nama dari inputan gambar
    $nama_file  =$_FILES['Gambar']['name'];
    $ukuran_file=$_FILES['Gambar']['size']; 
    $error      =$_FILES['Gambar']['error'];
    $tmpfile    =$_FILES['Gambar']['tmp_name'];

    // cek kondisi apakah user sudah melakukan proses upload
    // 4 merupakan indikasi bahwa tidak ada data yang diupload
    if($error===4)
    {
        //pastikan pada inputan gambar tidak terdapat atribut required
        echo "
            <script>
                alert('Tidak ada gambar yang diupload');
            </script>
        ";
        return false;
    }

    // cek apakah file gambar yang diupload
    $jenis_gambar=['jpg','jpeg','gif'];

    // kita akan memecah string menjadi array dengan function explode
    // function explode(delimiter,string)
    // delimiter disini digunakan untuk memecah string ke array 
    // (jika terdapat string sebagai contoh titik maka delimeter akan memecahnya menjadi array )
    // sebagai contoh andi.jpeg maka delimeter akan memecah menjadi array ['andi','jpeg' ]
    $pecah_gambar=explode('.',$nama_file); 

    // setelah kita pecah maka selanjutnya adalah mengambil string paling akhir menggunakan end
    // kita paksa extensinya menjadi huruf kecil semua (.JPG  menjadi .jpg) menggunakan strtolower
    // agar kita tidak menuliskan 2 kali pada $jenis_gambar 
    $pecah_gambar=strtolower(end($pecah_gambar));

    // in_array untuk mengecek apakah ada string didalam array
    // in_array(needles,$haystack) -> mencari jarum dalam jerami kata lainnya
    if(!in_array($pecah_gambar,$jenis_gambar))
    {
        echo "
            <script> 
                alert('yang anda upload bukan file gambar');
            </script>
            ";
            return false;
    }

    // cek kapasitas gambar dalam byte kalau 1000000 byte = 1 Megabyte
    if($ukuran_file > 10000000)
    {
        echo "
            <script> 
                alert('ukuran gambar terlalu besar');
            </script>    
        ";
        return false;
    }

    // jika data berhasil dicek maka file kita pindahkan dengan fungsi move_uploaded_file
    // dimana parameternya adalah (tempat temp sementara,ditaruh dimana)
    move_uploaded_file($tmp_name,'image/'.$nama_file);
    // var_dump($nama_file);die();

    // kita return nama file nya agar dapat masuk ke $gambar=$upload() pada function tambah
    return $nama_file;
}

function hapus ($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM mahasiswa WHERE id =$id ");
    return mysqli_affected_rows($conn);
}

function edit ($data){
    global $conn;

    $id=$data["id"];
    $nama=htmlspecialchars($data["Nama"]) ;
    $nim=htmlspecialchars($data["Nim"]);
    $email=htmlspecialchars($data["Email"]);
    $jurusan=htmlspecialchars($data["Jurusan"]);
    $gambar=htmlspecialchars($data["Gambar"]);

    $query= " UPDATE mahasiswa SET 
               Nama = '$nama',
               Nim = '$nim',
               Email = '$email',
               Jurusan = '$jurusan',
               Gambar = '$gambar' 
               WHERE id= $id ";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    $sql="SELECT * FROM mahasiswa
          WHERE
          Nama LIKE '%$keyword%' OR
          Nim LIKE '%$keyword%' OR
          Email LIKE '%$keyword%' OR
          Jurusan LIKE '%$keyword%'  
          ";

        // kembalikan ke function query dengan parameter $sql
      return query($sql);

     // cat: pastikan $keyword pada line 77 terdapat petik satu karena nilainya berupa string
}
?> 

