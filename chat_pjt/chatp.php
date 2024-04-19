<?php
    session_start();
    if(!isset($_SESSION['unique_id'])){
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat App</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/46f0b8a7d4.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="chat-page">
        <section class="content">
            <header>
                <?php
                    include_once "serPhp/config.php";
                    $user_id = mysqli_real_escape_string($conn,$_GET['user_id']);
                    $sql = mysqli_query($conn, "SELECT * FROM `users` WHERE `unique_id` = '$user_id'");
                    if(mysqli_num_rows($sql) > 0){
                        $row = mysqli_fetch_assoc($sql);
                    }
                ?>
                <div class="left">
                    <a href="userpage.php" class="goback"><i class="fa-solid fa-arrow-left"></i></a>
                    <img src="user_image/<?php echo $row['img'] ?>" alt="user-img">
                    <div class="user-bar">
                        <span><?php echo $row['fname'] . "  " .$row['lname']; ?></span>
                        <p><?php if($row['status'] == 'Active'){echo "Active now";}?></p>
                    </div>
                </div>
                <a href="serPhp/logout.php?logout_id=<?php echo $row['unique_id']?>" class="logout">Logout</a>
            </header>
            <div class="chat-area">
                
            </div>
            <form action="chatp.php" class="send-message" autocomplete="off">
                <input type="text" name="outgoing-msg" value=<?php echo $_SESSION['unique_id']?> hidden>
                <input type="text" name="incoming-msg" value=<?php echo $user_id?> hidden>
                <input type="text" name="type-area" id="type-area" class="type-area">
                <input type="submit" value="Send" class="send-button">
            </form>
        </section>
    </div>
    <script src="jas/chatp.js"></script>
</body>
</html>