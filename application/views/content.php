   
   <?php
   include "config/koneksi.php";
   include "config/library.php";
   include "config/fungsi_indotgl.php";
   include "config/fungsi_combobox.php";
   include "config/class_paging.php";

   // Bagian Home
   $level = $this->session->userdata('level');
   $mod = $this->uri->segment(3);
   if ($mod == 'home' || empty($mod)){
 
   if ($level == 'admin'){
   echo "
  
   <div id='main-content'>
   <div class='container_12'>
   <div class='grid_12'>
                             
   <p>Silahkan klik menu pilihan yang berada di sebelah kiri untuk mengelola konten website anda <br/>atau pilih ikon-ikon pada  
   Control Panel di bawah ini:</p>
   </div>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   <h1>MODUL ADMINISTRATOR</h1>
   <span></span> 
   </div>
   <div class='block-content'>
 
   <ul class='shortcut-list'>";
  
    ?>
   <li><a href=media.php?module=menu><img src='<?php echo base_url('ivory_src/img/modul.png'); ?>'/>Menu</a></li>
   <li><a href="media.php?module=berita"><img src='<?php echo base_url('ivory_src/img/berita.png'); ?>'/>Berita</a></li>
   <li><a href=media.php?module=templates><img src='<?php echo base_url('ivory_src/img/template.png'); ?>'/>Template</a></li>
   <li><a href=media.php?module=agenda><img src='<?php echo base_url('ivory_src/img/agenda.png'); ?>'/>Agenda</a></li>
   <li><a href=media.php?module=album><img src='<?php echo base_url('ivory_src/img/album.png'); ?>'/>Album Foto</a></li>
   <li><a href=media.php?module=galerifoto><img src='<?php echo base_url('ivory_src/img/foto.png'); ?>'/>Galeri Foto</a></li>
   <li><a href=media.php?module=poling><img src='<?php echo base_url('ivory_src/img/poling.png'); ?>'/>Jajak Pendapat</a></li>
   <li><a href=media.php?module=logo><img src='<?php echo base_url('ivory_src/img/gantilogo.png'); ?>'/>Logo Website</a></li>
   <li><a href=media.php?module=user><img src='<?php echo base_url('ivory_src/img/user.png'); ?>'/>User Admin</a></li>
   <li><a href=media.php?module=video><img src='<?php echo base_url('ivory_src/img/video.png'); ?>'/>Video</a></li>
   <li><a href=media.php?module=iklantengah><img src='<?php echo base_url('ivory_src/img/iklan1.png'); ?>'/>Iklan Home</a></li>
   <li><a href=media.php?module=pasangiklan><img src='<?php echo base_url('ivory_src/img/iklan2.png'); ?>'/>Iklan Sidebar</a></li>
   <li><a href=media.php?module=iklanatas><img src='<?php echo base_url('ivory_src/img/iklan3.png'); ?>'/>Iklan Layanan</a></li>
   <li><a href=media.php?module=hubungi><img src='<?php echo base_url('ivory_src/img/kontak.png'); ?>'/>Pesan Masuk</a></li>
   <li><a href=media.php?module=komentar><img src='<?php echo base_url('ivory_src/img/komentar.png'); ?>'/>Komentar</a></li>
   <li><a href=media.php?module=modul><img src='<?php echo base_url('ivory_src/img/module.png'); ?>'/>Modul Web</a></li>
   
   <?php
   echo "</ul><p align=right>Login : $hari_ini, ";
  echo tgl_indo(date("Y m d")); 
  echo " | "; 
  echo date("H:i:s");
  echo " WIB</p>";
  
   // Statistik user
  $ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
  $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
  $waktu   = time(); // 

  // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
   }else {
  
 echo "<div id='main-content'>
 <div class='container_12'>
 <div class='grid_12'>
                             
 <p>Silahkan klik menu pilihan yang berada di sebelah kiri untuk mengelola konten website anda. <br/></p>
 </div>
 <div class='grid_12'>

 <p align=right>Login : $hari_ini, ";
  echo tgl_indo(date("Y m d")); 
  echo " | "; 
  echo date("H:i:s");
  echo " WIB</p>";
  
   // Statistik user
  $ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
  $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
  $waktu   = time(); // 

  // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
  $s = mysql_query("SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
  // Kalau belum ada, simpan data user tersebut ke database
  if(mysql_num_rows($s) == 0){
    mysql_query("INSERT INTO statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
  } 
  else{
    mysql_query("UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
  }

  $pengunjung       = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip"));
  $totalpengunjung  = mysql_result(mysql_query("SELECT COUNT(hits) FROM statistik"), 0); 
  $hits             = mysql_fetch_assoc(mysql_query("SELECT SUM(hits) as hitstoday FROM statistik WHERE tanggal='$tanggal' GROUP BY tanggal")); 
  $totalhits        = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
  $tothitsgbr       = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
  $bataswaktu       = time() - 300;
  $pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE online > '$bataswaktu'"));

  $path = "counter/";
  $ext = ".png";

  $tothitsgbr = sprintf("%06d", $tothitsgbr);
  for ( $i = 0; $i <= 9; $i++ ){
	   $tothitsgbr = str_replace($i, "<img src='$path$i$ext' alt='$i'>", $tothitsgbr);
  }

  echo "
 <p align=right><b>Pengunjung Website : $pengunjungonline </b><br />
 <b>Hits Hari Ini: $hits[hitstoday] </b></p><br />";
  echo " </div>";
 }
}


// Bagian Option
elseif ($mod=='admin'){
  if ($level=='admin'){
    include "modul/mod_users/users.php";
  }
}

// (BARU) Bagian Header
elseif ($mod=='barang'){
  if ($level=='admin' OR $level=='user'){
    include "modul/mod_product/product.php";
  }
}
// Bagian Pasang Iklan
elseif ($mod=='satuan'){
  if ($level=='admin' OR $level=='user'){
    include "modul/mod_satuan/satuan.php";
  }
}

// Bagian Pasang Iklan
elseif ($mod=='merk'){
  if ($level=='admin' OR $level=='user'){
    include "modul/mod_merk/merk.php";
  }
}


// Bagian Pasang Iklan
elseif ($mod=='jenis_produk'){
  if ($level=='admin' OR $level=='user'){
    include "modul/mod_jenis_produk/jenis_produk.php";
  }
}



// Bagian User
elseif ($mod=='kota'){
    if ($level=='admin' OR $level=='user'){
    include "modul/mod_kota/kota.php";
  }
}

// Bagian Testimoni
elseif ($mod=='warna'){
   if ($level=='admin' OR $level=='user'){
    include "modul/mod_warna/warna.php";
  }
}
// Bagian User
elseif ($mod=='user'){
  if ($level=='admin' OR $_SESSION[leveluser]=='user'){
    include "modul/mod_users/users.php";
  }
}

elseif ($mod=='product'){
  if ($level=='admin'){
    include "modul/mod_product/product.php";
  }
}

// Bagian Modul
elseif ($mod=='main'){
   if ($level=='admin' OR $level=='user'){
    include "modul/mod_main/main.php";
  }
}
// Bagian Aktialita
elseif ($mod=='jasa'){
  if ($level=='admin' OR $level=='user'){
    include "modul/mod_jasa/jasa.php";                            
  }
}
// Bagian Kategori
elseif ($mod=='jenis_beban'){
   if ($level=='admin' OR $level=='user'){
    include "modul/mod_jenis_beban/jenis_beban.php";
  }
}

// Bagian Berita
elseif ($mod=='beban'){
  if ($level=='admin' OR $level=='user'){
    include "modul/mod_beban/beban.php";                            
  }
}

// Bagian Komentar Berita
elseif ($mod=='karyawan'){
  if ($level=='admin' OR $level=='user'){
    include "modul/mod_karyawan/karyawan.php";
  }
}

// Bagian Tag
elseif ($mod=='member'){
   if ($level=='admin' OR $level=='user'){
    include "modul/mod_penjualan/penjualan.php";
  }
}

// Bagian Hubungi Kami
elseif ($mod=='hubungi'){
   if ($level=='admin' OR $level=='user'){
    include "modul/mod_hubungi/hubungi.php";
  }
}

// Bagian Kata Jelek
elseif ($mod=='katajelek'){
   if ($level=='admin' OR $level=='user'){
    include "modul/mod_katajelek/katajelek.php";
  }
}
// Bagian Menu Utama
elseif ($mod=='menu'){
  if ($level=='admin' OR $level=='user'){
    include "modul/mod_menu/menu.php";
  }
}


// Bagian YM
elseif ($mod=='absensi'){
   if ($level=='admin' OR $level=='user'){
    include "modul/mod_absensi/absensi.php";
  }
}

// Bagian Video
elseif ($mod=='about'){
    if ($level=='admin' OR $level=='user'){
    include "modul/mod_about/background.php";
  }
}

elseif ($mod=='customer'){
  if ($level=='admin'){
    include "modul/mod_customer/customer.php";
  }
}

elseif ($mod=='r_penjualan'){
  if ($level=='admin'){
    include "modul/mod_r_penjualan/penjualan.php";
  }
}

elseif ($mod=='r_pembelian'){
  if ($level=='admin'){
    include "modul/mod_r_pembelian/pembelian.php";
  }
}

elseif ($mod=='bonbeli'){
  if ($level=='admin'){
    include "modul/mod_bonbeli/bon.php";
  }
}

else if($mod == 'r_rugilaba'){
if ($level=='admin'){
    include "modul/mod_rugilaba/rugilaba.php";
  }
}

else if($mod == 'view_absensi'){
if ($level=='admin'){
    include "modul/mod_absensi/view_absensi.php";
  }
}

// Apabila modul tidak ditemukan
else{
  echo "<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>";
}


?>
