<?php 
// fungsi pengecekan level untuk menampilkan menu sesuai dengan hak akses
// jika hak akses = Super Admin, tampilkan menu
if ($_SESSION['hak_akses']=='Super Admin') { ?>
	<!-- sidebar menu start -->
    <ul class="sidebar-menu">
        <li class="header">MAIN MENU</li>

	<?php 
	// fungsi untuk pengecekan menu aktif
	// jika menu beranda dipilih, menu beranda aktif
	if ($_GET["module"]=="beranda") { ?>
		<li class="active">
			<a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
	  	</li>
	<?php
	}
	// jika tidak, menu home tidak aktif
	else { ?>
		<li>
			<a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
	  	</li>
	<?php
	}

  // jika menu data obat dipilih, menu data obat aktif
  if ($_GET["module"]=="obat" || $_GET["module"]=="form_obat") { ?>
    <li class="active">
      <a href="?module=obat"><i class="fa fa-folder"></i> Data Obat </a>
      </li>
  <?php
  }
  // jika tidak, menu data obat tidak aktif
  else { ?>
    <li>
      <a href="?module=obat"><i class="fa fa-folder"></i> Data Obat </a>
      </li>
  <?php
  }


  // jika menu data obat dipilih, menu data obat aktif
  if ($_GET["module"]=="persediaan" || $_GET["module"]=="form_obat") { ?>
    <li class="active">
      <a href="?module=persediaan"><i class="fa fa-folder"></i> Data Persediaan </a>
      </li>
  <?php
  }
  // jika tidak, menu data obat tidak aktif
  else { ?>
    <li>
      <a href="?module=persediaan"><i class="fa fa-folder"></i> Data Persediaan </a>
      </li>
  <?php
  }

  // jika menu data obat masuk dipilih, menu data obat masuk aktif
  if ($_GET["module"]=="penjualan" || $_GET["module"]=="form_penjualan") { ?>
    <li class="active">
      <a href="?module=penjualan"><i class="fa fa-clone"></i> Penjualan </a>
      </li>
  <?php
  }
  // jika tidak, menu data obat masuk tidak aktif
  else { ?>
    <li>
      <a href="?module=penjualan"><i class="fa fa-clone"></i> Penjualan </a>
      </li>
  <?php
  }


  // jika menu data obat masuk dipilih, menu data obat masuk aktif
  if ($_GET["module"]=="log1" || $_GET["module"]=="form_log1") { ?>
    <li class="active">
      <a href="?module=log1"><i class="fa fa-clone"></i> LOG </a>
      </li>
  <?php
  }
  // jika tidak, menu data obat masuk tidak aktif
  else { ?>
    <li>
      <a href="?module=log1"><i class="fa fa-clone"></i> LOG </a>
      </li>
  <?php
  }

	// jika menu Laporan Stok obat dipilih, menu Laporan Stok obat aktif
	if ($_GET["module"]=="lap_penjualan") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Januari</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li class="active"><a href="?module=lap_penjualan"><i class="fa fa-circle-o"></i> Laporan Penjualan </a></li>
        		
      		</ul>
    	</li>
    <?php
	}

  // jika menu Laporan tidak dipilih, menu Laporan tidak aktif
  else { ?>
    <li class="treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Januari</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=lap_penjualan"><i class="fa fa-circle-o"></i> laporan Penjualan</a></li>
            
          </ul>
      </li>
    <?php
  }

  // jika menu Laporan Stok obat dipilih, menu Laporan Stok obat aktif
  if ($_GET["module"]=="lap_penjualan2") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Febuari</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li class="active"><a href="?module=lap_penjualan2"><i class="fa fa-circle-o"></i> Laporan Penjualan </a></li>
            
          </ul>
      </li>
    <?php
  }

	
	// jika menu Laporan tidak dipilih, menu Laporan tidak aktif
	else { ?>
		<li class="treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Febuari</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li><a href="?module=lap_penjualan2"><i class="fa fa-circle-o"></i> laporan Penjualan</a></li>
        		
      		</ul>
    	</li>
    <?php
	}

// jika menu Laporan Stok obat dipilih, menu Laporan Stok obat aktif
  if ($_GET["module"]=="lap_penjualan3") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Maret</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li class="active"><a href="?module=lap_penjualan3"><i class="fa fa-circle-o"></i> Laporan Penjualan </a></li>
            
          </ul>
      </li>
    <?php
  }

  
  // jika menu Laporan tidak dipilih, menu Laporan tidak aktif
  else { ?>
    <li class="treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Maret</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=lap_penjualan3"><i class="fa fa-circle-o"></i> laporan Penjualan</a></li>
            
          </ul>
      </li>
    <?php
  }

	// jika menu user dipilih, menu user aktif
	if ($_GET["module"]=="user" || $_GET["module"]=="form_user") { ?>
		<li class="active">
			<a href="?module=user"><i class="fa fa-user"></i> Manajemen User</a>
	  	</li>
	<?php
	}
	// jika tidak, menu user tidak aktif
	else { ?>
		<li>
			<a href="?module=user"><i class="fa fa-user"></i> Manajemen User</a>
	  	</li>
	<?php
	}

	// jika menu ubah password dipilih, menu ubah password aktif
	if ($_GET["module"]=="password") { ?>
		<li class="active">
			<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
		</li>
	<?php
	}
	// jika tidak, menu ubah password tidak aktif
	else { ?>
		<li>
			<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
		</li>
	<?php
	}
	?>
	</ul>
	<!--sidebar menu end-->
<?php
}


//===================================================================================================================================================================================================================================================================================

// jika hak akses = Manajer, tampilkan menu
elseif ($_SESSION['hak_akses']=='Manajer') { ?>
	<!-- sidebar menu start -->
    <ul class="sidebar-menu">
        <li class="header">MAIN MENU</li>

	<?php 
	// fungsi untuk pengecekan menu aktif
	// jika menu beranda dipilih, menu beranda aktif
	if ($_GET["module"]=="beranda") { ?>
		<li class="active">
			<a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
	  	</li>
	<?php
	}
	// jika tidak, menu beranda tidak aktif
	else { ?>
		<li>
			<a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
	  	</li>
	<?php
	}

	// jika menu Laporan Stok obat dipilih, menu Laporan Stok obat aktif
  if ($_GET["module"]=="lap_penjualan") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Januari</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li class="active"><a href="?module=lap_penjualan"><i class="fa fa-circle-o"></i> Laporan Penjualan </a></li>
            
          </ul>
      </li>
    <?php
  }

  // jika menu Laporan tidak dipilih, menu Laporan tidak aktif
  else { ?>
    <li class="treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Januari</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=lap_penjualan"><i class="fa fa-circle-o"></i> laporan Penjualan</a></li>
            
          </ul>
      </li>
    <?php
  }

  // jika menu Laporan Stok obat dipilih, menu Laporan Stok obat aktif
  if ($_GET["module"]=="lap_penjualan2") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Febuari</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li class="active"><a href="?module=lap_penjualan2"><i class="fa fa-circle-o"></i> Laporan Penjualan </a></li>
            
          </ul>
      </li>
    <?php
  }

  
  // jika menu Laporan tidak dipilih, menu Laporan tidak aktif
  else { ?>
    <li class="treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Febuari</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=lap_penjualan2"><i class="fa fa-circle-o"></i> laporan Penjualan</a></li>
            
          </ul>
      </li>
    <?php
  }

// jika menu Laporan Stok obat dipilih, menu Laporan Stok obat aktif
  if ($_GET["module"]=="lap_penjualan3") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Maret</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li class="active"><a href="?module=lap_penjualan3"><i class="fa fa-circle-o"></i> Laporan Penjualan </a></li>
            
          </ul>
      </li>
    <?php
  }

  
  // jika menu Laporan tidak dipilih, menu Laporan tidak aktif
  else { ?>
    <li class="treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Maret</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=lap_penjualan3"><i class="fa fa-circle-o"></i> laporan Penjualan</a></li>
            
          </ul>
      </li>
    <?php
  }

	// jika menu ubah password dipilih, menu ubah password aktif
	if ($_GET["module"]=="password") { ?>
		<li class="active">
			<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
		</li>
	<?php
	}
	// jika tidak, menu ubah password tidak aktif
	else { ?>
		<li>
			<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
		</li>
	<?php
	}
	?>
	</ul>
	<!--sidebar menu end-->
<?php
}

//======================================================================================================================================================================================================================================================================================


// jika hak akses = Gudang, tampilkan menu
if ($_SESSION['hak_akses']=='Gudang') { ?>
	<!-- sidebar menu start -->
    <ul class="sidebar-menu">
        <li class="header">MAIN MENU</li>

	<?php 
	// fungsi untuk pengecekan menu aktif
	// jika menu beranda dipilih, menu beranda aktif
  if ($_GET["module"]=="beranda") { ?>
    <li class="active">
      <a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
      </li>
  <?php
  }
  // jika tidak, menu home tidak aktif
  else { ?>
    <li>
      <a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
      </li>
  <?php
  }

  // jika menu data obat dipilih, menu data obat aktif
  if ($_GET["module"]=="obat" || $_GET["module"]=="form_obat") { ?>
    <li class="active">
      <a href="?module=obat"><i class="fa fa-folder"></i> Data Obat </a>
      </li>
  <?php
  }
  // jika tidak, menu data obat tidak aktif
  else { ?>
    <li>
      <a href="?module=obat"><i class="fa fa-folder"></i> Data Obat </a>
      </li>
  <?php
  }

  // jika menu data obat dipilih, menu data obat aktif
  if ($_GET["module"]=="persediaan" || $_GET["module"]=="form_obat") { ?>
    <li class="active">
      <a href="?module=persediaan"><i class="fa fa-folder"></i> Data Persediaan </a>
      </li>
  <?php
  }
  // jika tidak, menu data obat tidak aktif
  else { ?>
    <li>
      <a href="?module=persediaan"><i class="fa fa-folder"></i> Data Persediaan </a>
      </li>
  <?php
  }

  // jika menu data obat masuk dipilih, menu data obat masuk aktif
  if ($_GET["module"]=="penjualan" || $_GET["module"]=="form_penjualan") { ?>
    <li class="active">
      <a href="?module=penjualan"><i class="fa fa-clone"></i> Penjualan </a>
      </li>
  <?php
  }
  // jika tidak, menu data obat masuk tidak aktif
  else { ?>
    <li>
      <a href="?module=penjualan"><i class="fa fa-clone"></i> Penjualan </a>
      </li>
  <?php
  }

  // jika menu Laporan Stok obat dipilih, menu Laporan Stok obat aktif
  if ($_GET["module"]=="lap_penjualan") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Januari</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li class="active"><a href="?module=lap_penjualan"><i class="fa fa-circle-o"></i> Laporan Penjualan </a></li>
            
          </ul>
      </li>
    <?php
  }

  // jika menu Laporan tidak dipilih, menu Laporan tidak aktif
  else { ?>
    <li class="treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Januari</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=lap_penjualan"><i class="fa fa-circle-o"></i> laporan Penjualan</a></li>
            
          </ul>
      </li>
    <?php
  }

  // jika menu Laporan Stok obat dipilih, menu Laporan Stok obat aktif
  if ($_GET["module"]=="lap_penjualan2") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Febuari</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li class="active"><a href="?module=lap_penjualan2"><i class="fa fa-circle-o"></i> Laporan Penjualan </a></li>
            
          </ul>
      </li>
    <?php
  }

  
  // jika menu Laporan tidak dipilih, menu Laporan tidak aktif
  else { ?>
    <li class="treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Febuari</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=lap_penjualan2"><i class="fa fa-circle-o"></i> laporan Penjualan</a></li>
            
          </ul>
      </li>
    <?php
  }

// jika menu Laporan Stok obat dipilih, menu Laporan Stok obat aktif
  if ($_GET["module"]=="lap_penjualan3") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Maret</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li class="active"><a href="?module=lap_penjualan3"><i class="fa fa-circle-o"></i> Laporan Penjualan </a></li>
            
          </ul>
      </li>
    <?php
  }

  
  // jika menu Laporan tidak dipilih, menu Laporan tidak aktif
  else { ?>
    <li class="treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Maret</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=lap_penjualan3"><i class="fa fa-circle-o"></i> laporan Penjualan</a></li>
            
          </ul>
      </li>
    <?php
  }


	// jika menu ubah password dipilih, menu ubah password aktif
	if ($_GET["module"]=="password") { ?>
		<li class="active">
			<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
		</li>
	<?php
	}
	// jika tidak, menu ubah password tidak aktif
	else { ?>
		<li>
			<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
		</li>
	<?php
	}
	?>
	</ul>
	<!--sidebar menu end-->
<?php
}
?>