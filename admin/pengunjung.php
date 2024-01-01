<?php
error_reporting(E_ERROR | E_PARSE);
$query = mysqli_query($koneksi, "SELECT * FROM tb_pengunjung");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>
<div class="col-lg-20 mt-2 mx-auto">
<div class="card w-5 bg-light">
   <div class="card-header">
    Halaman Pengunjung
   </div>
   <div class="card-body">
   <div class="row">
   </div>
   <?php 
            foreach ($result as $row ) {
            ?>

                     <!-- Modal Delete-->
                     <div class="modal fade" id="ModalDelete<?php echo $row['id_pengunjung'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Menu</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="./config/delete-pengunjung.php" method="POST">
                                    <input type="hidden" value="<?php echo $row['id_pengunjung'] ?>" name="id_pengunjung">
                                    <div class="col-lg-12">
                                        Apakah anda ingin menghapus menu <b><?php echo $row['nama_pengunjung']?></b>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger" name="delete_menuu_validate" value="123">Hapus</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Akhir Modal Delete -->



            <?php
            }
            if (empty($result)) {
                echo "data user tidak ada";
            } else {
            ?>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-nowrap">
                                <th scope="col">No.</th>
                                <th scope="col">Nama</th>
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
                                    
                                    <td><?php echo $row['nama_pengunjung'] ?></td>
                                    <td><?php echo $row['no_meja'] ?></td>
                                    <td class="d-flex">
                                        <div class="d-flex">
                                            <button class="btn btn-danger btn-sm me-1" data-toggle="modal" data-target="#ModalDelete<?php echo $row['id_pengunjung'] ?>">Hapus</i></button>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            <?php
            }
            ?>

</div>
        </div>
        

