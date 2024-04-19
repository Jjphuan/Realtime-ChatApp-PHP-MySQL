<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        header("Location: userpage.php");
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
    <div class="signup-form">
        <section>
            <form action="signup.php" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="tittle">Real-Time Chat App</div>
                <div class="error-txt" style="display: none;"></div>
                <div class="user-details">
                    <div class="name-details">
                        <div class="field">
                            <label for="f-name">First Name:</label>
                            <input type="text" name="f-name" id="f-name" placeholder="First Name" required>
                        </div>
                        <div class="field">
                            <label for="l-name">Last Name:</label>
                            <input type="text" name="l-name" id="l-name" placeholder="Last Name" required>
                        </div>
                    </div>
                    <div class="field">
                        <label for="email">Email Address:</label>
                        <input type="email" name="email" id="email" placeholder="Email Address" required>
                    </div>
                    <div class="field">
                        <label for="pass">Passwords:</label>
                        <input type="password" name="pass" id="pass" placeholder="Passwords" required>
                        <i class="fa-solid fa-eye"></i>
                    </div>
                    <div class="field img">
                        <label for="choose">Choose Your Image</label>
                        <input type="file" name="choose" id="choose" placeholder="Choose Your Image" required>
                    </div>
                    <div class="button">
                        <input type="submit" value="Continue to Chat....">
                    </div>
                </div>
                <div class="sign">
                    <p>Already have an account?</p>
                    <a href="login.php" target="_self">Login Now</a>
                </div>
            </form>
        </section>
    </div>
    <script src="jas/sign.js"></script>
</body>
</html>