

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
            $tgl_transaksi = mysqli_real_escape_string($mysqli, trim($_POST['tgl_transaksi']));
            $jumlah_terjual = mysqli_real_escape_string($mysqli, trim($_POST['jumlah_terjual']));
            
        

            // perintah query untuk menyimpan data ke tabel obat
            $query = mysqli_query($mysqli, "INSERT INTO penjualan(kode_obat,tgl_transaksi,jumlah_terjual) 
                                            VALUES('$kode_obat','$tgl_transaksi','$jumlah_terjual')")
                                            or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=log1&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['kode_obat'])) {
                // ambil data hasil submit dari form
                $kode_obat  = mysqli_real_escape_string($mysqli, trim($_POST['kode_obat']));
                $tgl_transaksi = mysqli_real_escape_string($mysqli, trim($_POST['tgl_transaksi']));
                $jumlah_terjual = mysqli_real_escape_string($mysqli, trim($_POST['jumlah_terjual']));

                

                // perintah query untuk mengubah data pada tabel obat
                $query = mysqli_query($mysqli, "UPDATE penjualan SET  tgl_transaksi    = '$tgl_transaksi'
                                                                      jumlah_terjual    = '$jumlah_terjual'
                                                                      WHERE kode_obat    = '$kode_obat'")
                                                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                // cek query
                if ($query) {
                    // jika berhasil tampilkan pesan berhasil update data
                    header("location: ../../main.php?module=log1&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $waktu_perubahan = $_GET['id'];
    
            // perintah query untuk menghapus data pada tabel obat
            $query = mysqli_query($mysqli, "DELETE FROM log_obat WHERE waktu_perubahan='$waktu_perubahan'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=log1&alert=3");
            }
        }
    }       
}       
?>