<?php
    include "koneksi.php";
    $id = (isset($_POST['id_pengunjung'])) ? htmlentities($_POST['id_pengunjung']) : "";

    if(!empty($_POST['delete_menuu_validate'])){
        $query = mysqli_query($koneksi, "DELETE FROM tb_pengunjung WHERE id_pengunjung='$id'");
        if($query){
            unlink("../assets/dataImage/$foto");
            $message = '<script>alert("Data berhasil dihapus");
            window.location="../dashbord.php?admin=pengunjung"</script>';
            
        }else{
            $message = '<script>alert("Data gagal dihapus");
            window.location="../dashbord.php?admin=pengunjung"</script>';

        }
    }echo $message;
?>