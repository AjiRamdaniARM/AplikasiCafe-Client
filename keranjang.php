<?php
session_start();

include ('config/koneksi.php');

if(empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))
{
  echo "<script>alert('keranjang kosong, silahkan pesan dulu');</script>";
  echo "<script>location='index.php';</script>";
}
 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>keranjang belanja</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="template/dashboard/css/bootstrap.min.css" />
		<link rel="stylesheet" href="template/dashboard/css/bootstrap-responsive.min.css" />
		<link rel="stylesheet" href="template/dashboard/css/fullcalendar.css" />
		<link rel="stylesheet" href="template/dashboard/css/matrix-style.css" />
		<link rel="stylesheet" href="template/dashboard/css/matrix-media.css" />
		<link href="template/dashboard/font-awesome/css/font-awesome.css" rel="stylesheet" />
		<link rel="stylesheet" href="template/dashboard/css/jquery.gritter.css" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
  </head>
  <body>
    <?php include 'navbar.php'; ?>
    <section class="konten">
      <div class="container">
        <h1>Keranjang Belanja</h1>
        <hr>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Makanan</th>
              <th>Harga</th>
              <th>Jumlah</th>
              <th>Subharga</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $nomor=1; ?>
            <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
            <!-- menampilkan produk yg sedang deperulangkan berdasarkan id_produk -->
            <?php
            $ambil = $koneksi->query("SELECT * FROM tb_produk
              WHERE id_produk='$id_produk'");
            $pecah = $ambil->fetch_assoc();
            $subharga = $pecah["harga_produk"]*$jumlah;

            ?>
            <tr>
              <td><?php echo $nomor;?></td>
              <td><?php echo $pecah["nama_produk"]; ?></td>
              <td>Rp. <?php echo number_format($pecah["harga_produk"]); ?></td>
              <td><?php echo $jumlah; ?></td>
              <td>Rp. <?php echo number_format($subharga); ?></td>
              <td>
              <a href="hapuskeranjang.php?id=<?php echo $id_produk ?>" class="btn btn-danger btn-xs">hapus</a>
              </td>
            </tr>
            <?php $nomor++; ?>
          <?php endforeach ?>
          </tbody>
        </table>
        <a href="index.php" class="btn btn-default">Lanjutkan Pesanan</a>
        <a href="cetak.php" class="btn btn-primary">Cetak Nota</a>
      </div>

    </section>
  </body>
</html>
