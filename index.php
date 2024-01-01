<?php
	session_start();
    include 'config/koneksi.php';
	$ambil = $koneksi->query("SELECT * FROM tb_produk ");
	    // Get the requested URL path
    ?>
	<!DOCTYPE html>
	<html>	 
         <head>	    
        <title>Oniichan Japanese </title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="template/dashboard/css/bootstrap.min.css" />
		<link rel="stylesheet" href="template/dashboard/css/bootstrap-responsive.min.css" />
		<script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script> 
		<link rel="stylesheet" href="template/dashboard/css/fullcalendar.css" />
		<link rel="stylesheet" href="template/dashboard/css/matrix-style.css" />
		<link rel="stylesheet" href="template/dashboard/css/matrix-media.css" />
		<link href="template/dashboard/font-awesome/css/font-awesome.css" rel="stylesheet" />
		<link rel="stylesheet" href="template/dashboard/css/jquery.gritter.css" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
	    <style type="text/css">
	      body {	     
			background-color: #1E1E1E;
                       
    }
	h3 {
		font-size: 30px;
	}
	p {
		font-size: 20px;
	}
	section {
		margin-top: 2em;
	}
	.card {
		background-color: white;
		border-radius: 10px;
		box-shadow: 1px 5px 20px black ;
	}
	    </style>
	  </head>
	  <body>
	  <?php include 'navbar.php'; ?>
	  	<div class="container d-flex flex-wrap justify-content-center align-items-center">
<dotlottie-player src="https://lottie.host/640de54d-5284-4acd-9719-b68c71816a6f/ArpuK88kZ2.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></dotlottie-player>
<div class="text">
	  <h1 class="text-warning fw-bold ">Oniichan Japanese Cuisine</h1>
	  <p class="text-white">Silahkan untuk memesan terimakasih :)</p></div>
	</div>
<br>
	<div class="container rounded bg-dark text-secondary px-4 py-5 text-center">
    <div class="py-5">
      <h1 class="display-5 fw-bold text-white">DAFTAR MAKANAN CAFE ONIICHAN</h1>
      <div class="col-lg-6 mx-auto">
        <p class="fs-5 mb-4">Banyak makanan dan minuman yang enak dan segar yang menantimu:) Yuk beli dan nikmati hidangannya</p>
       
      </div>
    </div>
  </div>

	<!--konten-->
	<section class="mx-auto">
		<div class="row px-5 ">
		<?php while ($row =  $ambil->fetch_assoc()) { ?>	
			<div class="col mt-3">
			<div class="card bg-dark text-white" style="width: 18rem;">
  <img src="assets/dataImage/<?php echo $row['foto_produk']; ?>" class="card-img-top w-100" alt="<?php echo $row['nama_produk']; ?>">
  <div class="card-body">
    <h5 class="card-title"><?php echo $row['nama_produk']; ?></h5>
	<a href="config/beli.php?id_produk=<?php echo $row['id_produk']; ?>" class="btn btn-warning">Pesan</a>
	<a href="detail.php?id_produk=<?php echo $row['id_produk']; ?>" class="btn btn-light text-dark">Detail</a>

  </div>
</div>
			</div>
			<?php } ?>
		</div>
	</section>
	<!-- <section class="konten">
	  <div class="container mx-auto ">
	<div class="row">
	  <?php while ($perproduk = $ambil->fetch_assoc()) { ?>	
	    <div class="col-sm">
	      <div class="card" style="width: 22rem;" >
	        <img src="assets/dataImage/<?php echo $perproduk['foto_produk']; ?>" class="card-img-top">
	        <div class="card-body " style="padding: 30px">
          <h3 class="card-title"><?php echo $perproduk['nama_produk']; ?></h3>
          <p class="card-text">Rp. <?php echo number_format($perproduk['harga_produk']); ?></p><br><br>


	          <a href="config/beli.php?id_produk=<?php echo $perproduk['id_produk']; ?>" class="btn btn-primary">Pesan</a>
	          <a href="detail.php?id_produk=<?php echo $perproduk['id_produk']; ?>" class="btn btn-danger">Detail</a>

			  
       </div>
	      </div>
    </div>
  <?php } ?>
	</div>
	  </div>
	</section> -->

	<!-- <footer>
		<div class="logo px-5 py-5">
			<img src="assets/img/logo.jpeg" width="100" alt="">
		</div>
	</footer> -->

	
	  </body>
	  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
	</html>

	

      
