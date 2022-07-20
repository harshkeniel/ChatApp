<?php
    session_start();
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];

    $receiver = "vishalpandey917@gmail.com";
    $subject = "Mail from $fname $lname ($email)";
    $sender = "From:addtogether917@gmail.com";
    if(mail($receiver, $subject, $msg, $sender)){
        echo "success";
    }else{
        echo "failed";
    }
?>