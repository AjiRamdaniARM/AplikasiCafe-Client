<?php

$tgl_mulai="-";
$tgl_selesai="-";

$semuadata=array();
if (isset($_GET['from'])) {
$tglmulai = $_GET['from'];
}
if (isset($_GET['to'])) {
$tglselesai = $_GET['to'];
}

include ('../config/koneksi.php');

// if (isset($_POST["kirim"])){
//
//   // $tgl_mulai = $_GET["tglm"];
//   // $tgl_selesai = $_GET['tgls'];
//   $ambil = $koneksi->query("SELECT * FROM pembelian pm LEFT JOIN pelanggan pl ON
//   pm.id_pelanggan=pl.id_pelanggan WHERE tanggal_pembelian BETWEEN '$tglmulai' AND '$tglselesai'");
//   while($pecah = $ambil->fetch_assoc())
//   {
//     $semuadata[]=$pecah;
//   }
// }
 ?>



<h3>Laporan Pemesanan dari <?php echo $tglmulai ?> hingga <?php echo $tglselesai ?></h3>
<hr>

<form method="post">
  <div class="row">
    <div class="col-md-5">
      <div class="form-group">
        <label>Tanggal Mulai </label>
        <?php echo $tglmulai ?>
        <text type="date" class="form-control" name="tglm" value="<?php echo $tglmulai ?>">
      </div>
    </div>
    <div class="col-md-5">
      <div class="form-group">
        <label>Tanggal Selesai </label> <?php echo $tglselesai ?>
        <text type="date" class="form-control" name="tgls" value="<?php echo $tglselesai ?>">
      </div>
    </div>
    <div class="col-md-2">
      <label>&nbsp;</label><br>
      <!-- <button class="btn btn-primary" name="kirim">Lihat</button> -->

    </div>
  </div>
</form>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Pengujung</th>
      <th>Tanggal</th>
      <th>Jumlah</th>
    </tr>
  </thead>
  <tbody>
    <?php $total=0; ?>
    <?php $nomor=0; ?>
    <?php $ambil=$koneksi->query("SELECT * FROM tb_pemesanan pm LEFT JOIN tb_pengunjung pl ON
    pm.id_pengunjung=pl.id_pengunjung WHERE tgl_pemesanan BETWEEN '$tglmulai' AND '$tglselesai'"); ?>
    <?php while($value = $ambil->fetch_assoc()) {?>
      <?php $total+=$value['total_pemesanan'] ?>
    <tr>
      <td><?php echo $nomor+1; ?></td>
      <td><?php echo $value["nama_pengunjung"] ?></td>
      <td><?php echo $value["tgl_pemesanan"] ?></td>
      <td>Rp. <?php echo number_format($value["total_pemesanan"]) ?></td>
    </tr>
  <?php $nomor++; ?>
    <?php } ?>
  </tbody>
  <tfoot>
    <tr>
      <th colspan="3">Total</th>
      <th>Rp. <?php echo number_format($total) ?></th>
    </tr>
  </tfoot>
</table>
<script>
  window.print();
</script>
