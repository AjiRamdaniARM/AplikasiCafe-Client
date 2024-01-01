<div class="container-lg ">




  <?php
  // include '../config/koneksi.php';
  $ambil = $koneksi->query("SELECT * FROM tb_pemesanan JOIN tb_pengunjung ON tb_pemesanan.id_pengunjung=tb_pengunjung.id_pengunjung
    WHERE tb_pemesanan.id_pemesanan='$_GET[id]'");
  $detail = $ambil->fetch_assoc();
   ?><div class="judul d-flex flex-wrap text-2xl">
   <div class="fw-normal">Detail Pemesanan</div>&nbsp;
<div style="font-weight: bold;"><?php echo $detail['nama_pengunjung']; ?></div></div> <br>
<p>
  No Meja:<?php echo $detail['no_meja']; ?> <br>
</p>
<p>
  Tanggal:<?php echo $detail['tgl_pemesanan']; ?> <br>
  Total:<?php echo $detail['total_pemesanan']; ?>
</p>
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
      <?php while($pecah = $ambil->fetch_assoc()) {?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah['nama_produk']; ?></td>
            <td><?php echo $pecah['harga_produk']; ?></td>
            <td><?php echo $pecah['jumlah_produk']; ?></td>
            <td>
              <?php echo $pecah['harga_produk']*$pecah['jumlah_produk']; ?>
            </td>
          </tr>
          <?php $nomor++; ?>
        <?php } ?>
      </tbody>
    </table>

    </div>
