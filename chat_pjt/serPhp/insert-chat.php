<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = mysqli_real_escape_string($conn,$_POST['outgoing-msg']);
        $incoming_id = mysqli_real_escape_string($conn,$_POST['incoming-msg']);
        $message = mysqli_real_escape_string($conn,$_POST['type-area']);

        if(!empty($message)){
            $sql = mysqli_query($conn,"INSERT INTO `message`(`outgoing_id`,`incoming_id`,`msg_text`)
                                VALUES ('$outgoing_id','$incoming_id','$message')");
        }
    }
    else{
        header("Location: ../login.php");
    }
?>