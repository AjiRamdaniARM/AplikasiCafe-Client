<?php
include './config/koneksi.php';
$semuadata=array();
$tgl_mulai="-";
$tgl_selesai="-";
if (isset($_POST["kirim"])){
  $tgl_mulai = $_POST["tglm"];
  $tgl_selesai = $_POST['tgls'];
  $ambil = $koneksi->query("SELECT * FROM tb_pemesanan pm LEFT JOIN tb_pengunjung pl ON
  pm.id_pengunjung=pl.id_pengunjung WHERE tgl_pemesanan BETWEEN '$tgl_mulai' AND '$tgl_selesai'");
  while($pecah = $ambil->fetch_assoc())
  {
    $semuadata[]=$pecah;
  }
}
 ?>



<h3>Laporan Pemesanan dari <?php echo $tgl_mulai ?> hingga <?php echo $tgl_selesai ?></h3>
<hr>

<form method="post">
  <div class="row">
    <div class="col-md-5">
      <div class="form-group">
        <label>Tanggal Mulai</label>
        <input type="date" class="form-control" name="tglm" value="<?php echo $tgl_mulai ?>">
      </div>
    </div>
    <div class="col-md-5">
      <div class="form-group">
        <label>Tanggal Selesai</label>
        <input type="date" class="form-control" name="tgls" value="<?php echo $tgl_selesai ?>">
      </div>
    </div>
    <div class="col-md-2">
      <label>&nbsp;</label><br>
      <button class="btn btn-primary" name="kirim">Lihat</button>

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
    <?php foreach ($semuadata as $key => $value): ?>
      <?php $total+=$value['total_pemesanan'] ?>
    <tr>
      <td><?php echo $key+1; ?></td>
      <td><?php echo $value["nama_pengunjung"] ?></td>
      <td><?php echo $value["tgl_pemesanan"] ?></td>
      <td>Rp. <?php echo number_format($value["total_pemesanan"]) ?></td>
    </tr>
  <?php endforeach ?>
  </tbody>
  <tfoot>
    <tr>
      <th colspan="3">Total</th>
      <th>Rp. <?php echo number_format($total) ?></th>
    </tr>
  </tfoot>
</table>
<a href="index.php" class="btn btn-primary">Selesai</a>
<a class="btn btn-default btn-md" href=<?php echo "admin/cetakLaporan.php?from=$tgl_mulai&to=$tgl_selesai" ?> target="_blank" style="margin-left: 10px">
<span class="glyphicon glyphicon-print"></span>Print</a>
