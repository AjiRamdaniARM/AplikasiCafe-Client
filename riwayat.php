<?php
session_start();
//koneksi ke database
include ('config/koneksi.php');
if (empty($_SESSION["pengunjung"]) OR !isset($_SESSION["pengunjung"]))  {
  echo "<script>alert('Silahkan Booking Dulu');</script>";
  echo "<script>location='booking.php';</script>";
  exit();
}
 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Restoran Donburi</title>
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

  <section class="riwayat">
    <div class="container">
      <h3>Riwayat Pemesanan <?php echo $_SESSION["pengunjung"]["nama_pengunjung"] ?></h3>

      <table class="table table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Total</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $nomor=1;
          // mendapatkan pengunjung yg login dari session
          $id_pengunjung = $_SESSION["pengunjung"]['id_pengunjung'];

          $ambil = $koneksi->query("SELECT * FROM tb_pemesanan WHERE id_pengunjung='$id_pengunjung'");
          while($pecah = $ambil->fetch_assoc()){
           ?>
          <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah["tgl_pemesanan"] ?></td>
            <td><?php echo $pecah["status_pemesanan"] ?></td>
            <td>Rp. <?php echo number_format($pecah["total_pemesanan"]) ?></td>
            <td>
              <a href="nota.php?id=<?php echo $pecah["id_pemesanan"] ?>" class="btn btn-info">Nota</a>
            </td>
          </tr>
          <?php $nomor++; ?>
        <?php } ?>
        </tbody>
      </table>

    </div>

  </section>
  </body>

</html>
