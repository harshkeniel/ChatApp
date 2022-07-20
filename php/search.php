<?php
    session_start();
    include_once "config.php";
    $sender_id = $_SESSION['unique_id'];
    $inputSearch = mysqli_real_escape_string($conn , $_POST['inputsearch']);
    $output = "";
    $sql = mysqli_query($conn,"SELECT * FROM users WHERE NOT unique_id = {$sender_id} AND (fname LIKE '%{$inputSearch}%' OR lname LIKE '%{$inputSearch}%')");
    if(mysqli_num_rows($sql)>0){
        include "data.php";
    }else {
        $output = "No users found";
    }
    echo $output;



?>