<?php session_start(); ?>
<?php include ('config/koneksi.php'); ?>
<?php
// mendapatkan id_produk dari url
$id_produk = $_GET["id_produk"];

// query ambil data
$ambil = $koneksi->query("SELECT * FROM tb_produk WHERE id_produk='$id_produk'");
$detail = $ambil->fetch_assoc();

 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>detail produk</title>
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
        <div class="container rounded bg-dark text-secondary px-4 py-5 text-center">
    <div class="py-5 d-flex justify-content-center align-items-center">
      <img class="w-50" src="assets/dataImage/<?php echo $detail["foto_produk"]; ?>" alt="">
      <div class="col-lg-6 text-start text-white mx-auto">
      <h1><?php echo $detail["nama_produk"] ?></h1>
      <p><?php echo $detail["deskripsi_produk"] ?></p>
      <h4>Rp. <?php echo number_format($detail["harga_produk"]); ?></h4>
      <form method="post">
                  <div class="form-group">
                    <div class="input-group">
                      <input type="number" min="1" class="form-control" name="jumlah">
                      <div class="input-group-btn">
                        <button class="btn btn-warning" name="beli">Beli</button>

                      </div>

                    </div>

                  </div>

                </form>
                <?php
                // jk ada tombol beli
                if (isset($_POST["beli"]))
                {
                  // mendapatkan jumlah yg diinputkan
                  $jumlah = $_POST["jumlah"];
                  // masukan di keranjang belanja
                  $_SESSION["keranjang"][$id_produk] = $jumlah;

                  echo "<script>alert('produk telah masuk ke keranang belanja');</script>";
                  echo "<script>location='keranjang.php';</script>";
                }
                 ?>
      </div>
    </div>
  </div>
        <!-- <section class="kontent">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <img src="assets/dataImage/<?php echo $detail["foto_produk"]; ?>" alt="" class="img-responsive">
              </div>
              <div class="col-md-6">
                <h2><?php echo $detail["nama_produk"] ?></h2>
                <h4>Rp. <?php echo number_format($detail["harga_produk"]); ?></h4>
                <form method="post">
                  <div class="form-group">
                    <div class="input-group">
                      <input type="number" min="1" class="form-control" name="jumlah">
                      <div class="input-group-btn">
                        <button class="btn btn-primary" name="beli">Beli</button>

                      </div>

                    </div>

                  </div>

                </form>
                <?php
                // jk ada tombol beli
                if (isset($_POST["beli"]))
                {
                  // mendapatkan jumlah yg diinputkan
                  $jumlah = $_POST["jumlah"];
                  // masukan di keranjang belanja
                  $_SESSION["keranjang"][$id_produk] = $jumlah;

                  echo "<script>alert('produk telah masuk ke keranang belanja');</script>";
                  echo "<script>location='keranjang.php';</script>";
                }
                 ?>

                <p><?php echo $detail["deskripsi_produk"]; ?></p>

              </div>

            </div>

          </div>

        </section> -->

  </body>
</html>
