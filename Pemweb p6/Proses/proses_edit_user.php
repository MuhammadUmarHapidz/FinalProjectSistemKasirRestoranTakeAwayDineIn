<?php
include "connect.php";

// Ambil data dari form
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : " ";
$name = (isset($_POST['nama'])) ? htmlentities($_POST['nama']) : " ";
$username = (isset($_POST['username'])) ? htmlentities($_POST['username']) : " ";
$level = (isset($_POST['level'])) ? intval($_POST['level']) : ""; // Pastikan level berupa integer
$nohp = (isset($_POST['nohp'])) ? htmlentities($_POST['nohp']) : " ";
$alamat = (isset($_POST['alamat'])) ? htmlentities($_POST['alamat']) : " ";
$password = md5('password'); // Default password terenkripsi

// Inisialisasi variabel $message
$message = '';

if (!empty($_POST['input_user_validate'])) {
    $select = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("Username yang dimasukan telah ada");
                    window.location="../user";</script>';
    } else {
        // Query untuk menyimpan data
        $query = mysqli_query($conn, "UPDATE tb_user SET nama='$name',username='$username', level='$level',
    nohp='$nohp', alamat='$alamat' WHERE id='$id'");
        if ($query) {
            // Jika query gagal
            $message = '<script>alert("Data berhasil diupdate");
                    window.location="../user";</script>';
        } else {
            $message = '<script>alert("Data gagal diupdate");</script>';
            // Jika query berhasil

        }
    }
}

// Tampilkan pesan
echo $message;
