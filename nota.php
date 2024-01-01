<?php
session_start();
include ('config/koneksi.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>nota pembelian</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
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

            <h3>Nota Pemesanan</h3>
              <?php
              $ambil = $koneksi->query("SELECT * FROM tb_pemesanan JOIN tb_pengunjung ON tb_pemesanan.id_pengunjung=tb_pengunjung.id_pengunjung
                WHERE tb_pemesanan.id_pemesanan='$_GET[id]'");
            $detail = $ambil->fetch_assoc();
               ?>


               <!-- jika pelanggan yg beli tidak sama dengan pelanggan yg login, maka dilarikan ke riwayat.php karena dia tidak berhak melihat nota orang lain-->
               <!-- pelanggan yg beli harus pelanggan yg login-->

               <?php
               // mendapatkan id_pelanggan yg beli
               $idpelangganyangbeli = $detail["id_pengunjung"];

               // mendapatkan id_pelanggan yg Login
               $idpelangganyangbooking = $_SESSION["pengunjung"]["id_pengunjung"];

               ?>
            <div class="row">
                <div class="col-md-4">
                  <h3>Pemesanan</h3>
                  <p> No. Pemesanan: <?php echo $detail['id_pemesanan']; ?><br>
                  Tanggal : <?php echo $detail['tgl_pemesanan']; ?><br>
                  <strong>Total : Rp.<?php echo number_format($detail['total_pemesanan']); ?></strong><br>
                </p>

                </div>
                <div class="col-md-4">
                  <h3>Pengunjung</h3>
                  <strong><?php echo $detail['nama_pengunjung']; ?></strong><br>
                  <p>
                  No Meja : <?php echo $detail['no_meja']; ?><br>

                  </p>

                </div>
              </div>

            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>no</th>
                    <th>nama produk</th>
                    <th>harga</th>
                    <th>jumlah</th>
                    <th>subtotal</th>
                </tr>
            </thead>
            <tbody>
                  <?php $nomor=1;  ?>
                  <?php $ambil=$koneksi->query("SELECT * FROM pemesanan_produk JOIN tb_produk ON pemesanan_produk.id_produk=tb_produk.id_produk
                    WHERE pemesanan_produk.id_pemesanan='$_GET[id]'"); ?>
                  <?php while($pecah=$ambil->fetch_assoc()) {?>
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $pecah['nama_produk']; ?></td>
                        <td><?php echo number_format($pecah['harga_produk']); ?></td>
                        <td><?php echo $pecah['jumlah_produk']; ?></td>
                        <td>
                          <?php echo number_format($pecah['harga_produk']*$pecah['jumlah_produk']); ?>
                        </td>
                      </tr>
                      <?php $nomor++; ?>
                    <?php } ?>
                  </tbody>
                </table>

                <div class="row">
                  <div class="col-md-7">
                    <div class="alert alert-info">
                      <p>
                      Silahkan melakukan pembayaran Rp.<?php echo number_format($detail['total_pemesanan'] ); ?> Ribu Rupiah di kasir :)
                      </p>

                    </div>

                  </div>

                </div>


          </div>

        </section>

  </body>
</html>
