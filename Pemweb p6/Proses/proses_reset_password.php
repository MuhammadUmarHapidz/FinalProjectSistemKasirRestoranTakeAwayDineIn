<?php
include "connect.php";

// Ambil data dari form
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : " ";


// Inisialisasi variabel $message
$message = '';

if (!empty($_POST['input_user_validate'])) {
    // Query untuk menyimpan data
    $query = mysqli_query($conn, "UPDATE tb_user SET password=md5('yoi') WHERE id='$id'");
    if ($query) {
        // Jika query gagal
        $message = '<script>alert("Password berhasil direset");
                    window.location="../user";</script>';
    }
    } else {$message = '<script>alert("Password gagal direset");</script>';
        // Jika query berhasil
        
}

// Tampilkan pesan
echo $message;
?>