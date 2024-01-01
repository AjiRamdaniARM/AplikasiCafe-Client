<?php
    include "koneksi.php";
    $id = $_POST['id_meja'];
    if(empty($_POST['delete'])){
        $query = mysqli_query($koneksi, "DELETE FROM tb_meja WHERE id_meja='$id'");
        if($query){
            $message = '<script>alert("Data berhasil dihapus");
            window.location="../dashbord.php?admin=meja"</script>';
            
        }else{
            $message = '<script>alert("Data gagal dihapus");
            window.location="../dashbord.php?admin=meja"</script>';

        }echo $message;
    } 
?>