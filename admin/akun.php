<?php
include './config/koneksi.php';
$query = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE 1");
while($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}

?>
<!-- popup tambah data akun -->
<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal" >Tambah Akun</button>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="./config/add-user.php" method="post">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Username</label>
            <input type="text" name="username" placeholder="username akun" required class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" placeholder="NamaLengkap " required class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Password</label>
            <input class="form-control" name="password" id="password" type="password" placeholder="Password Akun" >
          </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-dark">Add</button>
      </div> </form>
    </div>
  </div>
</div>
          <?php 
            foreach ($result as $row ) {
            ?>
      <!-- Modal Delete-->
      <div class="modal fade" id="ModalDelete<?php echo $row['id_admin'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data User</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="./config/delete-user.php" method="POST">
                                    <input type="hidden" value="<?php echo $row['id_admin'] ?>" name="id_admin">
                                    Hapus data ini <?php echo $row['username'] ?>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger" name="delete_menu_validate" value="123" >Hapus</button>
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
    echo "akun tidak ada!!";
} else {
?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Username</th>
      <th scope="col">Nama_Lengkap</th>
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
      <td><?php echo $row['username'] ?></td>
      <td><?php echo $row['nama_lengkap'] ?></td>
      <td>
      
        <button class="btn btn-danger btn-sm me-1" data-toggle="modal" data-target="#ModalDelete<?php echo $row['id_admin'] ?>">Delete</button>
      </td>
    </tr>
    <?php 
    }
    ?>
  </tbody>
</table>
<?php
}
?>