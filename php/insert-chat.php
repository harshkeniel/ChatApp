<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $receiver_id = mysqli_real_escape_string($conn,$_POST['receiver_id']);
        $sender_id = mysqli_real_escape_string($conn,$_POST['sender_id']);
        $msg = mysqli_real_escape_string($conn,$_POST['message']);

        if(!empty($msg)){
            $sql = mysqli_query($conn,"INSERT INTO messages (receiver_msg_id,sender_msg_id,msg) VALUES ({$receiver_id},{$sender_id},'{$msg}')") or die();
        }
    }else{
        session_destroy();
        header("../login.php");
    }

?>