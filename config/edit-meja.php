<?php
include 'koneksi.php';
$id_meja = (isset($_POST['id_meja'])) ? htmlentities($_POST['id_meja']) : "";
$meja = (isset($_POST['meja'])) ? htmlentities($_POST['meja']) : "";

if (!empty($_POST['edit_menu_validate'])) {
    $select = mysqli_query($koneksi, "SELECT * FROM tb_meja WHERE no_meja = '$meja'");
    if(mysqli_num_rows($select) > 0 ) {
        echo '<script>alert("Nomor Meja yang dimasukkan telah ada");
        window.location="../dashbord.php?admin=meja"</script>';
    } else {
        $query = mysqli_query($koneksi, "UPDATE tb_meja SET  no_meja='$meja' WHERE id_meja = '$id_meja'  ");
        if($query) {
            echo '<script>alert("Data berhasil dimasukkan");
            window.location="../dashbord.php?admin=meja"</script>';
        } else {
           echo'<script>alert("Data gagal dimasukkan");
            window.location="../dashbord.php?admin=meja"</script>';
        }
    }
}
?>