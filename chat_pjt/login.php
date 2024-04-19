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
</head>
<body>
    <div class="sigup-form">
        <section>
            <form action="login.php" method="post">
                <div class="tittle">Real-Time Chat App</div>
                <div class="error-txt" style="display: none;">This is Error message!</div>
                <div class="user-details">
                    <div class="field">
                        <label for="email">Email Address:</label>
                        <input type="email" name="email" id="email" placeholder="Email Address">
                    </div>
                    <div class="field">
                        <label for="pass">Passwords:</label>
                        <input type="password" name="pass" id="pass" placeholder="Passwords">
                    </div>
                    <div class="button">
                        <input type="submit" value="Login to Chat....">
                    </div>
                </div>
                <div class="sign">
                    <p>Have not account? </p>
                    <a href="signup.php" target="_self">Sign Up</a>
                </div>
            </form>
        </section>
    </div>
    <script src="jas/log.js"></script>
</body>
</html>