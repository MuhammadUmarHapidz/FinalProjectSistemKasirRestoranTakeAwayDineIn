<?php
session_start();
if (isset($_GET['x']) && $_GET['x'] == 'home') {
    $page = "home.php";
    include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'order') {
    $page = "order.php";
    include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'user') {
    if($_SESSION['level_sekawan_rehat']==1){
        $page = "user.php";
        include "main.php";
    }else{
        $page = "home.php";
        include "main.php";
    }

} elseif (isset($_GET['x']) && $_GET['x'] == 'menu') {
    $page = "menu.php";
    include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'login') {
    include "login.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'logout') {
    include "proses/proses_logout.php";
} else {
    include "main.php";
}
?>