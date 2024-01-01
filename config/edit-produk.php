<?php
include "koneksi.php";
$id_produk = (isset($_POST['id_produk'])) ? htmlentities($_POST['id_produk']) : "";
$nama_produk = (isset($_POST['nama_produk'])) ? htmlentities($_POST['nama_produk']) : "";
$harga_produk = (isset($_POST['harga_produk'])) ? htmlentities($_POST['harga_produk']) : "";
$deksripsi_produk = (isset($_POST['deskripsi_produk'])) ? htmlentities($_POST['deskripsi_produk']) : "";

$inputData = $_FILES['foto']['name'];
$target_dir = "../assets/dataImage/";
$target_file = $target_dir . basename($_FILES['foto']['name']);
$imageType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (!empty($_POST['edit_menu_validate'])) {
    // Cek apakah gambar atau bukan
    $cek = getimagesize($_FILES['foto']['tmp_name']);
    if ($cek === false) {
        $message = "Ini bukan file gambar";
        $statusUpload = 0;
    } else {
        $statusUpload = 1;
        if (file_exists($target_file)) {
            $message = "Maaf, File yang Dimasukkan Telah Ada";
            $statusUpload = 0;
        } else {
            if ($_FILES['foto']['size'] > 500000) { //500kb
                $message = "File foto yang diupload terlalu besar";
                $statusUpload = 0;
            } else {
                if ($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg" && $imageType != "gif") {
                    $message = "Maaf, hanya diperbolehkan gambar yang memiliki format JPG, JPEG, PNG dan GIF";
                    $statusUpload = 0;
                }
            }
        }
    }

    if ($statusUpload == 0) {
        $message = '<script>alert("'.$message.', Gambar tidak dapat diupload");
        window.location="../dashbord.php?admin=produk"</script>';
    } else {
        $select = mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE nama_produk = '$nama_produk'");
        if (mysqli_num_rows($select) > 0) {
            $message = '<script>alert("Nama menu yang dimasukkan telah ada");
                        window.location="../dashbord.php?admin=produk"</script>';
        } else {
            if(move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
                $query = mysqli_query($koneksi, "UPDATE tb_produk  SET  nama_produk='$nama_produk',harga_produk='$harga_produk',foto_produk='$inputData',deskripsi_produk='$deksripsi_produk' WHERE id_produk = '$id_produk'  ");
                if($query) {
                    $message = '<script>alert("Data berhasil dimasukkan");
                    window.location="../dashbord.php?admin=produk"</script>';
                } else {
                    $message = '<script>alert("Data gagal dimasukkan");
                    window.location="../dashbord.php?admin=produk"</script>';
                }
            } else {
                $message = '<script>alert("Maaf, terjadi kesalahan. File tidak dapat diupload");
                window.location="../dashbord.php?admin=produk"</script>';
            }
        }
    }
}
echo $message;
?>
