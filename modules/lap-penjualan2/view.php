
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-file-text-o icon-title"></i> Laporan Penjualan Febuari

    <!--<a class="btn btn-primary btn-social pull-right" href="modules/lap-penjualan2/cetak.php" target="_blank">
      <i class="fa fa-print"></i> Cetak
    </a> -->
  </h1>

</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-body">
          <!-- tampilan tabel obat -->
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
            <!-- tampilan tabel header -->
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="center">Kode Obat</th>
                <th class="center">Nama Obat</th>
                <th class="center">Harga</th>
                <th class="center">Jumlah Terjual</th>
                <th class="center">Total Harga Terjual</th>
                <th class="center">Sisa Stok</th>
              </tr>
            </thead>
            <!-- tampilan tabel body -->
            <tbody>
            <?php  
            $no = 1;
            // fungsi query untuk menampilkan data dari tabel obat
            $query = mysqli_query($mysqli, "SELECT * from penjualan_februari")

              or die('Ada kesalahan pada query tampil Data Obat: '.mysqli_error($mysqli));
             $count  = mysqli_num_rows($query);
            // tampilkan data
            while ($data = mysqli_fetch_assoc($query)) { 
              $harga_satu = format_rupiah($data['harga_satuan']);
              $harga_total = format_rupiah($data['total_harga_terjual']);
              // menampilkan isi tabel dari database ke tabel di aplikasi
              echo "<tr>
                      <td width='30' class='center'>$no</td>
                      <td width='80' class='center'>$data[kode_obat]</td>
                      <td width='180'>$data[nama_obat]</td>
                      <td width='100' align='right'>Rp. $harga_satu</td>
                      <td width='100'>$data[jumlah_terjual]</td>
                      <td width='100' align='right'>Rp. $harga_total</td>
                      <td width='80' align='right'>$data[sisa_stok]</td>
                    </tr>";
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