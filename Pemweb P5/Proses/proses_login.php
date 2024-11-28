<?php
    $username = (isset($_POST['username'])) ? htmlentities($_POST['username']) : " " ;
    $password = (isset($_POST['password'])) ? htmlentities($_POST['password']) : " " ;
    if(!empty ($_POST["submit_validate"])){
        if($username =="admin@admin.com" && $password =="hahaha"){
            header('location:../home');
        }else{?>
        <script>
            alert('Username Atau Password Yang Anda Inputkan Saalah');
            window.location='../login'
        </script>
<?php
        }
    }
?>