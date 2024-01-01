<?php
    include "koneksi.php";
    $id = (isset($_POST['id_admin'])) ? htmlentities($_POST['id_admin']) : "";
    if(!empty($_POST['delete_menu_validate'])){
        $query = mysqli_query($koneksi, "DELETE FROM tb_admin WHERE id_admin='$id'");
        if($query){
            unlink("../assets/dataImage/$foto");
            $message = '<script>alert("Data berhasil dihapus");
            window.location="../dashbord.php?admin=akun"</script>';
            
        }else{
            $message = '<script>alert("Data gagal dihapus");
            window.location="../dashbord.php?admin=akun"</script>';

        }
    }echo $message;
?>