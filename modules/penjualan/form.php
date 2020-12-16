

 <?php  
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?> 
  <!-- tampilan form add data -->
	<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Input Transaksi
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=penjualan"> Penjualan </a></li>
      <li class="active"> Jual </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/penjualan/proses.php?act=insert" method="POST">
            <div class="box-body">
             

              <div class="form-group">
                <label class="col-sm-2 control-label">Kode Obat</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="kode_obat" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal Transaksi</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="tgl_transaksi" autocomplete="off" required>
                </div>
              </div>

               <div class="form-group">
                <label class="col-sm-2 control-label">Jumlah Terjual</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="jumlah_terjual" autocomplete="off" required>
                </div>
              </div>
              
            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=penjualan" class="btn btn-default btn-reset">Batal</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}
// jika form edit data yang dipilih
// isset : cek data ada / tidak
elseif ($_GET['form']=='edit') { 
  if (isset($_GET['id'])) {
      // fungsi query untuk menampilkan data dari tabel obat
      $query = mysqli_query($mysqli, "SELECT kode_obat,tgl_transaksi,jumlah_terjual FROM penjualan WHERE kode_obat='$_GET[id]'") 
                                      or die('Ada kesalahan pada query tampil Data obat : '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>
  <!-- tampilan form edit data -->
  <!-- Content Header (Page header) -->

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Detail Transaksi
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=penjualan"> Penjualan </a></li>
      <li class="active"> Detail </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/penjualan/proses.php?act=update" method="POST">
            <div class="box-body">
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Kode Obat</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="kode_obat" autocomplete="off" value="<?php echo $data['kode_obat']; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal Transaksi</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="tgl_transaksi" autocomplete="off" value="<?php echo $data['tgl_transaksi']; ?>" readonly required>
                </div>
              </div>

               <div class="form-group">
                <label class="col-sm-2 control-label">Jumlah Terjual</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="jumlah_terjual" autocomplete="off" value="<?php echo $data['jumlah_terjual']; ?>" readonly required>
                </div>
              </div>
             
            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  
                  <a href="?module=penjualan" class="btn btn-default btn-reset">Cancel</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}
?>