<?php

    session_start();
    include_once "config.php";
    $sender_id = $_SESSION['unique_id'];
    $sql = mysqli_query($conn , "SELECT * FROM users WHERE NOT unique_id = {$sender_id}");
    $output = "";
    if(mysqli_num_rows($sql)==0){
        $output .= "No users are available to chat";
    }
    elseif(mysqli_num_rows($sql)>0){
        if(mysqli_affected_rows($conn)){
            include "data.php";
        }
    }
    echo $output;

?>