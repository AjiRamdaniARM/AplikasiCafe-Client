

<?php
error_reporting(E_ERROR | E_PARSE);
$query = mysqli_query($koneksi, "SELECT * FROM tb_meja WHERE 1 ");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>
 <body style="background-color: black">
 <div class="container" style="position:relative; margin:2px; top: 50px;  display: flex; flex-direction: column; align-items:center;">
 <h2 style="font-family: 'inter',sans-serif; font-weight: bold; color: white;">鬼ちゃん 日本料理</h2>
 <div class="d-flex gap-5">
 <h3 class="fw-bold text-light">Oniichan Data Meja Cafe</h3>
 <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#createMeja">Tambah Meja</button>
 </div>
 
<!-- modal tambah meja -->
<div class="modal fade" id="createMeja" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Tambah Meja</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script> 
      <center>
<dotlottie-player src="https://lottie.host/7dd73ac3-21e9-43bb-b9a7-c5dfb7f3d060/hyAj2JNm2y.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></dotlottie-player></center>
        <form action="./config/add-meja.php" method="post">
          <div class="mb-3">
            <label for="recipient-name " class="col-form-label text-white">Nomor Meja</label>
            <input type="number " name="meja" placeholder="nomor meja" class="form-control" id="recipient-name" required>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Create Meja</button>
      </div></form>
    </div>
  </div>
</div>

<?php 
            foreach ($result as $row ) {
            ?>
                    <!-- modal Edit meja -->
                    <div class="modal fade" id="ModalEditMeja<?php echo $row['id_meja'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Edit data Meja &nbsp;<?php echo $row['no_meja'] ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script> 
      <center>
<dotlottie-player src="https://lottie.host/7dd73ac3-21e9-43bb-b9a7-c5dfb7f3d060/hyAj2JNm2y.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></dotlottie-player></center>
        <form action="./config/edit-meja.php" method="post">
          <div class="mb-3">
            <label for="recipient-name " class="col-form-label text-white">Nomor Meja</label>
            <input type="number" name="meja" placeholder="nomor meja" class="form-control" id="recipient-name" value="<?php echo $row['no_meja'] ?>" required>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Create Meja</button>
      </div></form>
    </div>
  </div>
</div>

                    <!-- akhir edit -->
                     <!-- Modal Delete-->
                     <div class="modal fade" id="ModalDelete<?php echo $row['id_meja'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-fullscreen-md-down">
                        <div class="modal-content bg-dark text-white">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Menu</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="./config/del-meja.php" method="POST">
                                    <input type="hidden" value="<?php echo $row['id_meja'] ?>" name="id_meja">
                                    <center>
                                    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script> 

<dotlottie-player src="https://lottie.host/e455403c-6594-4105-9390-fca0701b10b8/vVDT1zZXLe.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></dotlottie-player>
                                    </center>
                                    <div class="col-lg-12">
                                        Apakah anda ingin menghapus no meja <b><?php echo $row['no_meja']?></b>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger" name="delete" >Hapus</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Akhir Modal Delete -->



            <?php
            }

            ?>
 
 <table class="table table-dark">
  <thead>
    <tr>
    <th scope="col">No.</th>
                                <th scope="col">No Meja</th>
                                <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
  <?php
      $no = 1;
        foreach ($result as $row) {
   ?>
           <tr>
            <th scope="row"><?php echo $no++ ?></th>
            <td><?php 
             if ($row['no_meja'] >= 100) {
              echo $row['no_meja'];
          } else {
              echo '0' . $row['no_meja'];
          } ?></td>
            <td>
            <button class="btn btn-warning btn-sm "  data-bs-toggle="modal" data-bs-target="#ModalEditMeja<?php echo $row['id_meja'] ?>">Edit</button>
                <button data-bs-target="#ModalDelete<?php echo $row['id_meja'] ?>" data-bs-toggle="modal" class="btn btn-danger btn-sm ">Delete</button>
            </td>
           </tr>
 <?php
    }
    ?>
  </tbody>
</table>
 </div>
 
 </body>