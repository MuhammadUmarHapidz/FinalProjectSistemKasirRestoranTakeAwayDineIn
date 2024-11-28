<?php
//session_start();
if (!isset($_SESSION['username_sekawan_rehat'])) {
    header('Location: login.php');
    exit();
}

include "proses/connect.php";

// Data user
$query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '" . $_SESSION['username_sekawan_rehat'] . "'");
$hasil = mysqli_fetch_array($query);

// Menentukan halaman berdasarkan $_GET['x']
$page = 'home.php'; // Default halaman
if (isset($_GET['x'])) {
    switch ($_GET['x']) {
        case 'home':
            $page = "home.php";
            break;
        case 'order':
            $page = "order.php";
            break;
        case 'user':
            $page = ($_SESSION['level_sekawan_rehat'] == 1) ? "user.php" : "home.php";
            break;
        case 'menu':
            $page = "menu.php";
            break;
        case 'login':
            $page = "login.php";
            break;
        case 'logout':
            $page = "proses/proses_logout.php";
            break;
        default:
            $page = "home.php"; // Halaman default
    }
}

// Validasi apakah file ada sebelum di-include
if (!file_exists($page)) {
    die("Halaman tidak ditemukan!");
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sekawan Rehat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <!--Header-->
    <?php include "header.php"; ?>
    <!--End Header-->
    <div class="container lg">
        <div class="row">
            <!--Sidebar -->
            <?php include "sidebar.php"; ?>
            <!--End Sidebar -->

            <!--Content-->
            <?php include $page; ?>
            <!--End Content-->

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (() => {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
  })()
</script>
</body>
</html>
