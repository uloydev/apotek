

<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// jika user sudah login, maka jalankan perintah untuk insert, update, dan delete
else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['simpan'])) {
            // ambil data hasil submit dari form
            $kode_obat  = mysqli_real_escape_string($mysqli, trim($_POST['kode_obat']));
            $nama_obat  = mysqli_real_escape_string($mysqli, trim($_POST['nama_obat']));
            $bentuk_obat = mysqli_real_escape_string($mysqli, trim($_POST['bentuk_obat']));
            $tgl_produksi  = mysqli_real_escape_string($mysqli, trim($_POST['tgl_produksi']));
            $tgl_kadaluarsa  = mysqli_real_escape_string($mysqli, trim($_POST['tgl_kadaluarsa']));
            $harga_satuan = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['harga_satuan'])));
            

           

            // perintah query untuk menyimpan data ke tabel obat
            $query = mysqli_query($mysqli, "INSERT INTO obat(kode_obat,nama_obat,bentuk_obat,tgl_produksi,tgl_kadaluarsa,harga_satuan) 
                                            VALUES('$kode_obat','$nama_obat','$bentuk_obat','$tgl_produksi','$tgl_kadaluarsa','$harga_satuan')")
                                            or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=obat&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['kode_obat'])) {
                // ambil data hasil submit dari form
                $kode_obat  = mysqli_real_escape_string($mysqli, trim($_POST['kode_obat']));
                $nama_obat  = mysqli_real_escape_string($mysqli, trim($_POST['nama_obat']));
                $bentuk_obat = mysqli_real_escape_string($mysqli, trim($_POST['bentuk_obat']));
                $tgl_produksi  = mysqli_real_escape_string($mysqli, trim($_POST['tgl_produksi']));
                $tgl_kadaluarsa  = mysqli_real_escape_string($mysqli, trim($_POST['tgl_kadaluarsa']));
                $harga_satuan = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['harga_satuan'])));

                

                // perintah query untuk mengubah data pada tabel obat
                $query = mysqli_query($mysqli, "UPDATE obat SET  nama_obat       = '$nama_obat',
                                                                 bentuk_obat     = '$bentuk_obat',
                                                                 tgl_produksi    = '$tgl_produksi',
                                                                 tgl_kadaluarsa  = '$tgl_kadaluarsa',
                                                                 harga_satuan    = '$harga_satuan'
                                                              WHERE kode_obat    = '$kode_obat'")
                                                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                // cek query
                if ($query) {
                    // jika berhasil tampilkan pesan berhasil update data
                    header("location: ../../main.php?module=obat&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $kode_obat = $_GET['id'];
    
            // perintah query untuk menghapus data pada tabel obat
            $query = mysqli_query($mysqli, "DELETE FROM obat WHERE kode_obat='$kode_obat'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=obat&alert=3");
            }
        }
    }       
}       
?>