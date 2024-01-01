<?php
session_start();
include ('config/koneksi.php');
 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Booking Meja</title>
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
    <div class="container-lg px-5">
    <form method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
    <input type="text" name="nama" class="form-control" id="exampleInputEmail1" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">No Meja</label>&nbsp;
   <select name="no" >
   <option>--Pilih No Meja--</option>
    <?php 
    $get = mysqli_query($koneksi, "SELECT * FROM tb_meja WHERE 1");
    while ($row = mysqli_fetch_array($get)) {
      $ambil[] = $row;
    }
    foreach($ambil as $pilih) {
      $selected = ($pilih['no_meja'] == $selectedNoMeja) ? 'selected' : '';
      echo "
        <option value='{$pilih['no_meja']}'>{$pilih['no_meja']}</option>
      ";

    }
    ?>
   
   </select>
  </div>

  <button type="submit" name="booking" class="btn btn-warning text-dark fw-bold">Booking</button>
</form>
<?php
              // jk ada tombol booking(tombol booking ditekan)
              if (isset($_POST["booking"]))
              {
              // mengambil isian nama,no
              $nama = $_POST["nama"];
              $no = $_POST["no"];
              //cek apakah meja sudah digunakan
              $ambil = $koneksi->query("SELECT*FROM tb_pengunjung WHERE no_meja='$no'");
              $yangcocok = $ambil->num_rows;
              if ($yangcocok==1)
              {
                echo "<script>alert ('booking gagal, nomor meja sudah dipesan');</script>";
                echo "<script>location='selesaibooking.php';</script>";
              }
              else
              {
              //query insert ke tabel pelanggan
              $koneksi->query("INSERT INTO tb_pengunjung (nama_pengunjung,no_meja)
              VALUES ('$nama','$no')");
              echo "<script>alert ('berhasil boking, silahkan pesan');</script>";
              echo "<script>location='index.php';</script>";
              }
              }
              ?>

              <?php
                if (isset($_POST["booking"]))
              {
                $nama = $_POST["nama"];
                $no = $_POST["no"];
                $ambil = $koneksi->query("SELECT * FROM tb_pengunjung WHERE nama_pengunjung='$nama' AND no_meja='$no'");
                $akunyangcocok = $ambil->num_rows;
                if ($akunyangcocok==1)
                {
                  $akun = $ambil->fetch_assoc();
                  $_SESSION["pengunjung"] = $akun;
                  echo "<script>alert('anda sukses booking');</script>";

                  // jk sudah belanja
                  if (isset($_SESSION["keranjang"]) OR !empty($_SESSION["keranjang"]) )
                  {
                  echo "<script>location='config/cetak.php';</script>";
                }else
                 {
                  echo "<script>location='riwayat.php';</script>";
                }
              }
              }

              ?>
    </div>
    <!-- <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Silahkan Booking Meja</h3>
            </div>
            <div class="panel-body">
              <form method="post" class="form-horizontal">
                <div class="form-group">
                  <label class="control-label col-md-3">Nama</label>
                  <div class="col-md-7">
                    <input type="text" class="form-control "name="nama" required>

                  </div>
                </div>
                  <div class="form-group">
                   <label class="control-label col-md-3">No Meja</label>
                   <div class="col-md-7">
                    <input type="text" class="form-control "name="no" required>

                </div>
                </div>
                <div class="form-group">
                  <div class="col-md-7 col-md-offset-3">
                    <button class="btn btn-primary" name="booking">booking</button>

                  </div>

                </div>
              </form>

              <?php
              // jk ada tombol booking(tombol booking ditekan)
              if (isset($_POST["booking"]))
              {
              // mengambil isian nama,no
              $nama = $_POST["nama"];
              $no = $_POST["no"];
              //cek apakah meja sudah digunakan
              $ambil = $koneksi->query("SELECT*FROM tb_pengunjung WHERE no_meja='$no'");
              $yangcocok = $ambil->num_rows;
              if ($yangcocok==1)
              {
                echo "<script>alert ('booking gagal, nomor meja sudah dipesan');</script>";
                echo "<script>location='selesaibooking.php';</script>";
              }
              else
              {
              //query insert ke tabel pelanggan
              $koneksi->query("INSERT INTO tb_pengunjung (nama_pengunjung,no_meja)
              VALUES ('$nama','$no')");

              echo "<script>alert ('berhasil boking, silahkan pesan');</script>";
              echo "<script>location='index.php';</script>";
              }
              }
              ?>

              <?php
                if (isset($_POST["booking"]))
              {
                $nama = $_POST["nama"];
                $no = $_POST["no"];
                $ambil = $koneksi->query("SELECT * FROM tb_pengunjung WHERE nama_pengunjung='$nama' AND no_meja='$no'");
                $akunyangcocok = $ambil->num_rows;
                if ($akunyangcocok==1)
                {
                  $akun = $ambil->fetch_assoc();
                  $_SESSION["pengunjung"] = $akun;
                  echo "<script>alert('anda sukses booking');</script>";

                  // jk sudah belanja
                  if (isset($_SESSION["keranjang"]) OR !empty($_SESSION["keranjang"]) )
                  {
                  echo "<script>location='config/cetak.php';</script>";
                }else
                 {
                  echo "<script>location='riwayat.php';</script>";
                }
              }
              }

              ?>



            </div>
          </div>
        </div> -->
        


  </body>
</html>
