<?php
error_reporting(E_ERROR | E_PARSE);
$query = mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE 1 ");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>
 <body style="background-color: black">
 <div class="container" style="position:relative; margin:2px; top: 50px;  display: flex; flex-direction: column; align-items:center;">
 <div class="d-flex  gap-5">
 <h2 style="font-family: 'inter',sans-serif; font-weight: bold; color: white;">Oniichan Data Produk</h2>
<button data-bs-toggle='modal' data-bs-target='#modaltambahProduk' class="btn btn-danger">Tambah Produk</button>
<!-- modal tambah menu -->
  <!-- Modal Tambah Menu-->
  <div class="modal fade" id="modaltambahProduk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content bg-dark ">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 text-white" id="exampleModalLabel" >Tambah Menu Makanan dan Minuman</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="./config/tambah-produk.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="file" class="form-control" id="uploadFoto" placeholder="Upload foto" name="foto" required>
                                            <label for="uploadFoto">Upload Foto Menu</label>
                                            <div class="invalid-feedback">
                                                Masukkan File Foto Menu
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Nama Menu" name="nama_produk" required>
                                            <label for="floatingInput">Nama Produk</label>
                                            <div class="invalid-feedback">
                                                Masukkan Nama Menu
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="deksripsi" name="deskripsi_produk">
                                            <label for="floatingPassword">Keterangan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                       
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput" placeholder="Harga" name="harga_produk" required>
                                            <label for="floatingInput">Harga</label>
                                            <div class="invalid-feedback">
                                                Masukkan Harga
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-warning" name="input_menu_validate" value="123">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Akhir Modal Tambah Menu -->
</div>
<?php 
            foreach ($result as $row ) {
            ?>

                     <!-- Modal Edit Menu -->
                     <div class="modal fade" id="ModalEdit<?php echo $row['id_produk'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                        <div class="modal-content bg-dark text-white">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Menu Makanan dan Minuman</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="./config/edit-produk.php" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" value="<?php echo $row['id_produk'] ?>" name="id_produk">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input type="file" class="form-control" id="uploadFoto" placeholder="Upload foto" name="foto" required>
                                                <label for="uploadFoto">Upload Foto Menu</label>
                                                <div class="invalid-feedback">
                                                    Masukkan File Foto Menu
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input required type="text" class="form-control" id="floatingInput" value="<?php echo $row['nama_produk'] ?>" name="nama_produk">
                                                <label for="floatingInput">Nama Menu</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Nama Menu
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput" value="<?php echo $row['deskripsi_produk'] ?>" name="deskripsi_produk">
                                                <label for="floatingPassword">Keterangan</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-floating mb-3">
                                                <input required type="number" class="form-control" id="floatingInput" value="<?php echo $row['harga_produk'] ?>" name="harga_produk">
                                                <label for="floatingInput">Harga</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Harga
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="edit_menu_validate" value="123">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Akhir Modal Edit -->

<!-- modal delete -->
  <!-- Modal Delete-->
  <div class="modal fade" id="ModalDelete<?php echo $row['id_produk'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-fullscreen-md-down">
                        <div class="modal-content bg-dark text-white">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Produk</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="./config/delete-produk.php" method="POST">
                                    <input type="hidden" value="<?php echo $row['id_produk'] ?>" name="id_produk">
                                    <center>
                                    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script> 

<dotlottie-player src="https://lottie.host/e455403c-6594-4105-9390-fca0701b10b8/vVDT1zZXLe.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></dotlottie-player>
                                    </center>
                                    <div class="col-lg-12">
                                        Apakah anda ingin menghapus menu <b><?php echo $row['nama_produk']?></b>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger" name="delete_menu_validate" value="123">Hapus</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

<?php
            }
?>

 <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">no</th>
      <th scope="col">nama produk</th>
      <th scope="col">harga produk</th>
      <th scope="col">poto produk</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
    foreach ($result as $row) { 
    ?>
          <tr>
      <th scope='row'><?php echo $no++ ?></th>
      <td><?php echo $row['nama_produk'] ?></td>
      <td><?php echo $row['harga_produk'] ?></td>
      <td><img width='90px' src='assets/dataImage/<?php echo $row['foto_produk'] ?>' class='img-thumbnail' alt='{$row['nama_produk']}'></td>
      <td>
      <button  data-bs-target='#ModalEdit<?php echo $row['id_produk'] ?>' data-bs-toggle='modal'  class='btn btn-warning'>Edit</button>
      <button data-bs-target="#ModalDelete<?php echo $row['id_produk'] ?>" data-bs-toggle="modal" class='btn btn-danger'>Delete</button>
  </td>
    </tr>
 <?php
    }
    ?>
  </tbody>
</table>
 </div>
 
 </body>

