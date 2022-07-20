<?php
    while($row = mysqli_fetch_assoc($sql)){
        $sql2 = "SELECT * FROM messages WHERE (receiver_msg_id = {$row['unique_id']}
                    OR sender_msg_id = {$row['unique_id']}) AND (receiver_msg_id = {$sender_id}
                    OR sender_msg_id = {$sender_id}) ORDER BY msg_id DESC LIMIT 1";
        $query = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($query);
        if(mysqli_num_rows($query) > 0){
            $result = $row2['msg'];
            ($sender_id==$row2['sender_msg_id'])?$you = "You: ":$you = ""; 
        }
        else{
            $result = "No message available.";
            $you = "";
        }
        //Trimming the message
        (strlen($result)>28)? $msg = substr($result,0,25)."...": $msg = $result;
        ($row['status'] == "offline") ? $status = "offline" : $status = "";

        $output .= '
                <a href="chat.php?user_id='.$row['unique_id'].'">
                    <div class="content">
                        <img src="php/images/'.$row['img'].'" alt="">
                        <div class="details">
                            <span>'.$row['fname']." ".$row['lname'].'</span>
                            <p>'.$you.$msg.'</p>
                        </div>
                    </div>
                    <div class="status-dot '.$status.'">
                        <i class="fas fa-circle"></i>
                    </div>
                </a>';

    }
?>