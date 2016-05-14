<?php
$nama = $this->session->userdata('nama_user_ivory');
$a=mysql_fetch_array(mysql_query("SELECT * FROM admin WHERE nama='$nama'"));
echo "<div class='nama_user'>$a[nama]</div>"; 

?>
