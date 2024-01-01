<?php
session_start();
include ('config/koneksi.php');

// jk ada session pelanggan(blm login,).mk di larikan ke login.php
if (!isset($_SESSION["pengunjung"]))
{
  echo "<script>alert('silahkan booking meja dulu');</script>";
  echo "<script>location='booking.php';</script>";
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Checkout</title>
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
            <h1>Keranjang Pemesanan</h1>
            <hr>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Produk</th>
                  <th>Harga</th>
                  <th>Jumlah</th>
                  <th>Subharga</th>
                  
                </tr>
              </thead>
              <tbody>
                <?php $nomor=1; ?>
                <?php $totalbelanja = 0; ?>
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
                </tr>
                <?php $nomor++; ?>
                <?php $totalbelanja+=$subharga; ?>
              <?php endforeach ?>
              </tbody>
              <tfoot>
                <tr>
                  <th colspan="4">Total Pesanan</th>
                  <th>Rp.<?php echo number_format($totalbelanja) ?> </th>
                </tr>
              </tfoot>
            </table>
            <form method="post">

            <div class="row">
              <div class="col-md-4">
            <div class="form-group">
              <input type="text" readonly value="<?php echo $_SESSION ["pengunjung"]["nama_pengunjung"]?>" class ="form-control">
            </div>
          </div>
          <div class="col-md-4">
        <div class="form-group">
          <input type="text" readonly value="<?php echo $_SESSION ["pengunjung"]["no_meja"]?>" class ="form-control">
        </div>
      </div>
  </div>

  <button class="btn btn-primary" name="checkout">Cetak Nota</button>
        </form>
        <?php
        if (isset($_POST["checkout"]))
        {
            $id_pelanggan = $_SESSION["penngunjung"]["id_pengunjug"];
            $tanggal_pembelian = date("Y-m-d");

            $total_pembelian=$totalbelanja+$harga_produk;

            $koneksi->query("INSERT INTO tb_pemesanan(id_pengunjung,tgl_pemesanan,total_pemesanan)
            VALUES ('$id_pelanggan','$tanggal_pembelian','$total_pembelian')");
            $id_pembelian_barusan = $koneksi->insert_id;

            foreach ($_SESSION["keranjang"] as $id_produk => $jumlah)
            {
              $ambil=$koneksi->query("SELECT * FROM tb_produk WHERE id_produk='$id_produk'");
              $perproduk=$ambil->fetch_assoc();
              $nama=$perproduk['nama_produk'];
              $harga=$perproduk['harga_produk'];
              $subtotal=$perproduk['harga_produk']*$jumlah;

              $koneksi->query("INSERT INTO pemesanan_produk(id_produk,id_pemesanan,jumlah_produk,nama_produk,harga_produk,subtotal)
              VALUES ('$id_produk','$id_pembelian_barusan','$jumlah','$nama','$harga','$subtotal') ON DUPLICATE KEY UPDATE id_pemesanan_pk ='$id_pembelian_barusan',  id_produk ='$id_produk', jumlah_produk ='$jumlah', nama_produk ='$nama', harga_produk ='$harga',  subtotal ='$subtotal'  ");
            }
            // mengkosongkan keranjang belanja
            unset($_SESSION["keranjang"]);

            // tampilan dialihkan ke dalam nota, nota dari pembelian yang barusan
            echo "<script>alert('pemesanan sukses');</script>";
            echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";

        }
        ?>

       
</div>
</section>

  </body>
</html>
