<?php
    include "koneksi.php";
    $id = (isset($_POST['id_produk'])) ? htmlentities($_POST['id_produk']) : "";
    $foto = (isset($_POST['foto_produk'])) ? htmlentities($_POST['foto_produk']) : "";

    if(!empty($_POST['delete_menu_validate'])){
        $query = mysqli_query($koneksi, "DELETE FROM tb_produk WHERE id_produk='$id'");
        if($query){
            unlink("../assets/dataImage/$foto");
            $message = '<script>alert("Data berhasil dihapus");
            window.location="../dashbord.php?admin=produk"</script>';
            
        }else{
            $message = '<script>alert("Data gagal dihapus");
            window.location="../dashbord.php?admin=produk"</script>';

        }
    }echo $message;
?>