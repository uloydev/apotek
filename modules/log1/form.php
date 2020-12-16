

 <?php  
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?> 
  <!-- tampilan form add data -->
	<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> LOG
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=log"> LOG </a></li>
      <li class="active"> LOG </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/log/proses.php?act=insert" method="POST">
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
                  <a href="?module=log" class="btn btn-default btn-reset">Batal</a>
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
      $query = mysqli_query($mysqli, "SELECT kode_obat,nama_obat,bentuk_obat,harga_lama,harga_baru,waktu_perubahan FROM log_obat WHERE kode_obat='$_GET[id]'") 
                                      or die('Ada kesalahan pada query tampil Data obat : '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>
  <!-- tampilan form edit data -->
  <!-- Content Header (Page header) -->

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Detail LOG
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=log"> LOG </a></li>
      <li class="active"> Detail </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/log/proses.php?act=update" method="POST">
            <div class="box-body">
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Kode Obat</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="kode_obat" autocomplete="off" value="<?php echo $data['kode_obat']; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Obat</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nama_obat" autocomplete="off" value="<?php echo $data['nama_obat']; ?>" readonly required>
                </div>
              </div>

               <div class="form-group">
                <label class="col-sm-2 control-label">Bentuk Obat</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="bentuk_obat" autocomplete="off" value="<?php echo $data['bentuk_obat']; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Harga Lama</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="harga_lama" autocomplete="off" value="<?php echo $data['harga_lama']; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Harga Baru</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="harga_baru" autocomplete="off" value="<?php echo $data['harga_baru']; ?>" readonly required>
                </div>
              </div>
             
             <div class="form-group">
                <label class="col-sm-2 control-label">Waktu Perubahan</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="waktu_perubahan" autocomplete="off" value="<?php echo $data['waktu_perubahan']; ?>" readonly required>
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  
                  <a href="?module=log1" class="btn btn-default btn-reset">Cancel</a>
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