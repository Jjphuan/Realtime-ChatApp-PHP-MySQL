<?php
    while($row = mysqli_fetch_assoc($sql)){
        $sql2 ="SELECT * FROM `message` WHERE (`outgoing_id`= $row[unique_id] OR `incoming_id`= $row[unique_id]) AND
        (`outgoing_id`= $outgoing_id OR `incoming_id`= $outgoing_id) ORDER BY `msg_id` DESC LIMIT 1";
        $query2 = mysqli_query($conn,$sql2);
        $row2 = mysqli_fetch_assoc($query2);
        if(mysqli_num_rows($query2) > 0){
            $result = $row2['msg_text'];
        }
        else{
            $result = "No any chat message...";
        }

        (strlen($result) > 26) ? $msg = substr($result,0,26).". . . . ." : $msg = $result;
        // ($outgoing_id == $row2['outgoing_id']) ? $you = "You:" : $you = "";
        ($row['status'] == 'offline') ? $offline = "offline" : $offline = "";

        $output .= '<a href="chatp.php?user_id='.$row['unique_id'].'" target="_self">
                        <div class="content">
                            <img src="user_image/'. $row['img'] .' "alt="frd-img">
                            <div class="user-details">
                                <span>'.$row['fname']." ".$row['lname'].'</span>
                                <p>'.$msg.'</p>
                            </div>
                        </div>
                        <div class="status-dot '.$offline.'">
                            <i class="fa-solid fa-circle"></i>
                        </div>
                    </a>';
    }
?>