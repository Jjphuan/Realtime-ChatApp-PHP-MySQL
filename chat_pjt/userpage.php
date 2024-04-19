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
    <div class="chat-wrapper">
        <section class="content">
            <header>
                <?php
                    include_once "serPhp/config.php";
                    $sql = mysqli_query($conn, "SELECT * FROM `users` WHERE `unique_id` = '$_SESSION[unique_id]'");
                    if(mysqli_num_rows($sql) > 0){
                        $row = mysqli_fetch_assoc($sql);
                    }
                ?>
                <div class="status">
                    <img src="user_image/<?php echo $row['img']?>" alt="user-img">
                    <div class="details">
                        <span><?php echo $row['fname'] . "  " .$row['lname']; ?></span>
                        <p><?php if($row['status'] == 'Active'){echo "Active now";}?></p>
                    </div>
                </div>
                <a href="serPhp/logout.php?logout_id=<?php echo $row['unique_id']?>" name="logout" class="logout">Logout</a>
            </header>
            <div class="search">
                <input type="text" name="search-box" class="search-box" placeholder="Search your friend...">
                <div class="searchBtn"><i class="fa-solid fa-magnifying-glass"></i></div>
            </div><hr>
            <div class="friend-list">

            </div>
        </section>
    </div>
    <script src="jas/user.js"></script>
</body>
</html>

<?php
    
?>