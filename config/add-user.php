<?php
include 'koneksi.php';
$username = $_POST['username'];
$nama_lengkap = $_POST['nama_lengkap'];
$password = $_POST['password'];


            $query = mysqli_query($koneksi, "INSERT INTO `tb_admin`( `username`, `password`,`nama_lengkap`) VALUES ('$username','$password','$nama_lengkap') ");
              if($query) {
                    echo '<script>alert("Data Client berhasil dimasukkan");
                    window.location="../dashbord.php?admin=akun"</script>';
                } else {
                    echo '<script>alert("Data akun gagal dimasukkan");
                    window.location="../dashbord.php?admin=akun"</script>';
                } 
      

?>