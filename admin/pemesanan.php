

<?php
error_reporting(E_ERROR | E_PARSE);
$query = mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE 1 ");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>
 <body style="background-color: black">
 <div class="container" style="position:relative; margin:2px; top: 50px;  display: flex; flex-direction: column; align-items:center;">
 <h2 style="font-family: 'inter',sans-serif; font-weight: bold; color: white;">鬼ちゃん 日本料理</h2>
 <h3 class="fw-bold text-light">Oniichan Data Pemesanan</h3>

 
 <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">no</th>
      <th scope="col">nama produk</th>
      <th scope="col">No Meja</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Harga</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
  <?php
            $nomor=1;
        $ambil = $koneksi->query("SELECT * FROM tb_pemesanan
        JOIN tb_pengunjung ON tb_pemesanan.id_pengunjung = tb_pengunjung.id_pengunjung");
        while($pecah = $ambil->fetch_assoc()){ 
      ?>
          <tr>
              <td><?php echo $nomor; ?></td>
              <td><?php echo $pecah['nama_pengunjung']; ?></td>
              <td><?php echo $pecah['no_meja']; ?></td>
              <td><?php echo $pecah['tgl_pemesanan']; ?></td>
              <td><?php echo $pecah['total_pemesanan']; ?></td>
      <td>
      <a href="dashbord.php?admin=detail&id=<?php echo $pecah['id_pemesanan']; ?>" class="btn btn-warning">detail</a>
                <a href="dashbord.php?admin=detail&id=<?php echo $pecah['id_pemesanan']; ?>" class="btn btn-success">Selesai</a>
  </td>
    </tr>
 <?php
    }
    ?>
  </tbody>
</table>
 </div>
 
 </body>



<!-- <h3>Data Pemesanan</h3>

<table class="table table-bordered">
      <thead>
          <tr>
                <th>No</th>
                <th>Nama</th>
                <th>No Meja</th>
                <th>Tangal</th>
                <th>Total</th>
                <th>Aksi</th>
          </tr>
      </thead>
      <tbody>
        <?php
            $nomor=1;
        $ambil = $koneksi->query("SELECT * FROM tb_pemesanan
        JOIN tb_pengunjung ON tb_pemesanan.id_pengunjung = tb_pengunjung.id_pengunjung");
        while($pecah = $ambil->fetch_assoc()){ 
      ?>

            
            <tr>
              <td><?php echo $nomor; ?></td>
              <td><?php echo $pecah['nama_pengunjung']; ?></td>
              <td><?php echo $pecah['no_meja']; ?></td>
              <td><?php echo $pecah['tgl_pemesanan']; ?></td>
              <td><?php echo $pecah['total_pemesanan']; ?></td>
              <td>
                <a href="dashbord.php?admin=detail&id=<?php echo $pecah['id_pemesanan']; ?>" class="btn btn-info">detail</a>
                <a href="dashbord.php?admin=detail&id=<?php echo $pecah['id_pemesanan']; ?>" class="btn btn-info">Selesai</a>
              </td>
            </tr>
            <?php $nomor++; ?>
          <?php } ?>
        </tbody>
      </table> -->
