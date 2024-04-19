<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $logout_id = mysqli_real_escape_string($conn,$GET['logout_id']);
        $status = "Offline";
        $sql = mysqli_query($conn,"UPDATE `users` SET `status` = 'offline' WHERE `users`.`unique_id` = $_SESSION[unique_id]" );
        if($sql){
            session_unset();
            session_destroy();
            header("Location: ../login.php");
        }
        else{
            header("Location: ../userpage.php");
        }
    }
    else{
        header("Location: ../login.php");
    }
    
?>