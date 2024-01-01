<nav class="navbar justify-content-between navbar-expand-lg navbar-dark bg-dark p-4">
	<div class="logo rounded">
		<img src="assets/img/logo.jpeg" width="50" alt="logo">
	</div>
			<ul class=" navbar-nav d-flex justify-content-between items-center font-weight-bold">
				<li class="nav-item active text-dark"><a href="index.php" class="nav-link">Daftar Menu</a></li>
				<li class="nav-item"><a href="keranjang.php" class="nav-link">Keranjang</a></li>
				<?php if (isset($_SESSION["pengunjung"])): ?>
				<li class="nav-item"><a href="riwayat.php" class="nav-link">Riwayat Pemesanan</a></li>
				<li class="nav-item"><a href="selesaibooking.php" class="nav-link">Selesai Memesan</a></li>
				<?php else:?>
        		<li class="nav-item"><a class="nav-link" href="booking.php">Silahkan Booking</a></li>
      <?php endif ?>
			</ul>
		</nav><br>