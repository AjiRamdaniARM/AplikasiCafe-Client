<?php 
	$koneksi = new mysqli ("localhost","root","","pemesananmakanan");	
   if (!$koneksi) {
       die ("Koneksi gagal kak : " . mysqli_connect_error());
   }
   ?>