

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-folder-o icon-title"></i> Data Obat Kadaluarsa
  </h1>

</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">

    <?php

if ($_GET['alert'] == 'success') {
    echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data obat kadaluarsa berhasil dihapus.
            </div>";
}
?>

      <div class="box box-primary">
        <div class="box-body">
          <!-- tampilan tabel obat -->
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
            <!-- tampilan tabel header -->
            <thead>
              <tr>
                <th class="center">ID</th>
                <th class="center">Kode Obat</th>
                <th class="center">Nama Obat</th>
                <th class="center">Bentuk Obat</th>
                <th class="center">Tanggal Produksi</th>
                <th class="center">Tanggal EXP</th>
                <th class="center">Harga Satuan</th>
                <th></th>
              </tr>
            </thead>
            <!-- tampilan tabel body -->
            <tbody>
            <?php
$no = 1;
// fungsi query untuk menampilkan data dari tabel obat
$query = mysqli_query($mysqli, "SELECT obat_kadaluarsa.id, obat.kode_obat, obat.nama_obat, obat.bentuk_obat, obat.tgl_produksi, obat.tgl_kadaluarsa, obat.harga_satuan FROM obat_kadaluarsa LEFT JOIN obat ON obat_kadaluarsa.kode_obat = obat.kode_obat ORDER BY obat.kode_obat DESC")
or die('Ada kesalahan pada query tampil Data Obat: ' . mysqli_error($mysqli));

// tampilkan data
while ($data = mysqli_fetch_assoc($query)) {
    $harga_satuan = format_rupiah($data['harga_satuan']);
    // menampilkan isi tabel dari database ke tabel di aplikasi
    echo "<tr>
            <td width='30' class='center'>$data[id]</td>
            <td width='80' class='center'>$data[kode_obat]</td>
            <td width='80' class='center'>$data[nama_obat]</td>
            <td width='80' class='center'>$data[bentuk_obat]</td>
            <td width='80' class='center'>$data[tgl_produksi]</td>
            <td width='80' class='center'>$data[tgl_kadaluarsa]</td>
            <td width='100' align='right'>Rp. $harga_satuan</td>

            <td class='center' width='80'>
            <div>";
    ?>
                <a data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-sm" href="modules/obat-kadaluarsa/proses.php?act=delete&id=<?php echo $data['id']; ?>" onclick="return confirm('Anda yakin ingin menghapus obat <?php echo $data['id']; ?> ?');">
                    <i style="color:#fff" class="glyphicon glyphicon-trash"></i>
                </a>
<?php 
    echo "</div></td></tr>";
    $no++;
}
?>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content