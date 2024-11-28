<?php
include "connect.php";

// Ambil data dari form
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : " ";


// Inisialisasi variabel $message
$message = '';

if (!empty($_POST['input_user_validate'])) {
    // Query untuk menyimpan data
    $query = mysqli_query($conn, "DELETE FROM tb_user WHERE id='$id'");
    if ($query) {
        // Jika query gagal
        $message = '<script>alert("Data berhasil dihapus");
                    window.location="../user";</script>';
    }
    } else {$message = '<script>alert("Data gagal diHAPUS");</script>';
        // Jika query berhasil
        
}

// Tampilkan pesan
echo $message;
?>
