<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = mysqli_real_escape_string($conn,$_POST['outgoing-msg']);
        $incoming_id = mysqli_real_escape_string($conn,$_POST['incoming-msg']);
        $output = "";

        $sql = "SELECT * FROM `users`
                RIGHT JOIN `message` ON 'users.unique_id' = 'message.outgoing_id'
                WHERE (`outgoing_id`= $outgoing_id AND `incoming_id`= $incoming_id) OR
                (`outgoing_id`= $incoming_id AND `incoming_id`= $outgoing_id) ORDER BY `msg_id` ASC";

        $sql2 = "SELECT `img` FROM `users` WHERE `unique_id` = $outgoing_id";
        
        $query = mysqli_query($conn,$sql);
        $query2 = mysqli_query($conn,$sql2);

        $row2 = mysqli_fetch_assoc($query2);

        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['outgoing_id'] === $outgoing_id){
                    $output .= '<div class="msg incoming">
                                    <div class="details">
                                        <p>'. $row['msg_text'] .'</p>
                                    </div>
                                </div>';
                }
                else{
                    $output .= '<div class="msg outgoing">
                                    <img src="user_image/'.$row2['img'].'" alt="friend-img" style="user-select: none;">
                                    <div class="details">
                                        <p>'.$row['msg_text'].'</p>
                                    </div>
                                </div>';
                }
            }
        }
        echo $output;
    }
    else{
        header("Location: ../login.php");
    }
?>