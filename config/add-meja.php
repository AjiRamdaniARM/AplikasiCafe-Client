<?php
include 'koneksi.php';
$no_meja = $_POST['meja'];

        $select = mysqli_query($koneksi, "SELECT * FROM tb_meja WHERE no_meja = '$no_meja'");
            if (mysqli_num_rows($select) > 0) {
                echo'<script>alert("Nama menu yang dimasukkan telah ada");
                                window.location="../dashbord.php?admin=meja"</script>';
            } else {
                $query = mysqli_query($koneksi, "INSERT INTO tb_meja(no_meja ) VALUES ('$no_meja') ");
                if($query) {
                    echo '<script>alert("Data Client berhasil dimasukkan");
                    window.location="../dashbord.php?admin=meja"</script>';
                } else {
                        echo '<script>alert("Data meja gagal dimasukkan");
                        window.location="../dashbord.php?admin=meja"</script>';
                        } 
                }
        
      

?>