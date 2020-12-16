

 <?php  
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?> 
  <!-- tampilan form add data -->
	<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Input Obat
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=obat"> Obat </a></li>
      <li class="active"> Tambah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/obat/proses.php?act=insert" method="POST">
            <div class="box-body">
              <?php  
              // fungsi untuk membuat id transaksi
              $query_id = mysqli_query($mysqli, "SELECT RIGHT(kode_obat,4) as kode FROM obat
                                                ORDER BY kode_obat DESC LIMIT 1")
                                                or die('Ada kesalahan pada query tampil kode_obat : '.mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {
                  // mengambil data kode_obat
                  $data_id = mysqli_fetch_assoc($query_id);
                  $kode    = $data_id['kode']+1;
              } else {
                  $kode = 1;
              }

              // buat kode_obat
              $buat_id   = str_pad($kode, 4, "0", STR_PAD_LEFT);
              $kode_obat = "BAAAA$buat_id";
              ?>

              <div class="form-group">
                <label class="col-sm-2 control-label">Kode Obat</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="kode_obat" value="<?php echo $kode_obat; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nama obat</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nama_obat" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Bentuk Obat</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="bentuk_obat" data-placeholder="-- Pilih --" autocomplete="off" required>
                    <option value="SALEP">SALEP</option>
                    <option value="SYRUP">SYRUP</option>
                    <option value="KAPLET">KAPLET</option>
                    <option value="TABLET">TABLET</option>
                  </select>
                </div>
              </div>

               <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal Produksi (t-b-h)</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="tgl_produksi" autocomplete="off" required>
                </div>
              </div>

               <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal EXP (t-b-h)</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="tgl_kadaluarsa" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Harga satuan</label>
                <div class="col-sm-5">
                  <div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                    <input type="text" class="form-control" id="harga_satuan" name="harga_satuan" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" required>
                  </div>
                </div>
              </div>

              
            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=obat" class="btn btn-default btn-reset">Batal</a>
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
      $query = mysqli_query($mysqli, "SELECT kode_obat,nama_obat,bentuk_obat,tgl_produksi,tgl_kadaluarsa,harga_satuan FROM obat WHERE kode_obat='$_GET[id]'") 
                                      or die('Ada kesalahan pada query tampil Data obat : '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>
  <!-- tampilan form edit data -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Ubah Obat
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=obat"> Obat </a></li>
      <li class="active"> Ubah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/obat/proses.php?act=update" method="POST">
            <div class="box-body">
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Kode Obat</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="kode_obat" value="<?php echo $data['kode_obat']; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nama obat</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nama_obat" autocomplete="off" value="<?php echo $data['nama_obat']; ?>" required>
                </div>
              </div>

               <div class="form-group">
                <label class="col-sm-2 control-label">Bentuk Obat</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="bentuk_obat" data-placeholder="-- Pilih --" autocomplete="off" required>
                    <option value="<?php echo $data['bentuk_obat']; ?>"><?php echo $data['bentuk_obat']; ?></option>
                    <option value="SALEP">SALEP</option>
                    <option value="SYRUP">SYRUP</option>
                    <option value="KAPLET">KAPLET</option>
                    <option value="TABLET">TABLET</option>
                  </select>
                </div>
              </div>

               <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal Produksi</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="tgl_produksi" autocomplete="off" value="<?php echo $data['tgl_produksi']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal Kadaluarsa</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="tgl_kadaluarsa" autocomplete="off" value="<?php echo $data['tgl_kadaluarsa']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Harga Satuan</label>
                <div class="col-sm-5">
                  <div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                    <input type="text" class="form-control" id="harga_satuan" name="harga_satuan" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo format_rupiah($data['harga_satuan']); ?>" required>
                  </div>
                </div>
              </div>

             

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=obat" class="btn btn-default btn-reset">Batal</a>
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