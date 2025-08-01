
<?php
session_start();
if(isset($_SESSION['author_name'])){
    header("location: ../public/dashboard/dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classic</title>
    <link rel="stylesheet" href="../public/my.css">

    
    <link rel="icon" type="image/png" sizes="32x32" href="../public/assets/images/neptune.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="../public/assets/images/neptune.png" />

</head>
<body>
    <div class="main">
    <div class="nav">
    </div>
    <div class="content">

        <div class="form">
            <h2>Sign-In</h2>

          <form action="../public/main/main.php" method="post"> 
           <input name="email" type="text" placeholder="Enter your email here">

           <?php if(isset($_SESSION['email_error'])) { ?>
                <div style="margin: 5% 25%;" class="form-text m-b-md text-danger"><?php echo $_SESSION['email_error'] ?></div>
                <?php } unset($_SESSION['email_error']) ?>

            <input name="password" type="password" placeholder="Enter your email password">

            <?php if(isset($_SESSION['password_error'])) { ?>
                <div style="margin: 5% 25%;" class="form-text m-b-md text-danger"><?php echo $_SESSION['password_error'] ?></div>
                <?php } unset($_SESSION['password_error']) ?>

                <!-- feedback -->
                <?php if(isset($_SESSION['login_failed'])) { ?>
                <div style="margin: 5% 25%;" class="form-text m-b-md text-danger"><?php echo $_SESSION['login_failed'] ?></div>
                <?php } unset($_SESSION['login_failed']) ?>
                <!-- feedback -->

            <button name="signin_btn" type="submit">Login</button>
            </form>

            <p class="link">Haven't an account<br>
                <a href="signup.php">Sign-up </a> here</a></p>
                <p class="para">Login with</p>
                <div class="logo">
                    <a href="https://www.facebook.com/"><ion-icon name="logo-facebook"></ion-icon></a>
                    <a href="#"><ion-icon name="logo-google"></ion-icon></a>
                    <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
                    <a href="#"><ion-icon name="logo-twitter"></ion-icon></a>
                    
                </div>
                <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
        </div>
    </div>
    </div>
    
</body>
</html>