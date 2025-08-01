
<?php
session_start();
if(isset($_SESSION['author_name'])){
    header("location: ../public/dashboard/dashboard.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">

    <title>Classic</title>

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="../public/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="../public/assets/plugins/pace/pace.css" rel="stylesheet">

    
    <!-- Theme Styles -->
    <link href="../public/assets/css/main.min.css" rel="stylesheet">
    <link href="../public/assets/css/custom.css" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="../public/assets/images/neptune.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="../public/assets/images/neptune.png" />

</head>
<body>
    <div class="app app-auth-sign-up align-content-stretch d-flex flex-wrap justify-content-end">
        <div class="app-auth-background">

        </div>
        <div class="app-auth-container">
            <div class="logo">
                <a href="index.html">Classic</a>
            </div>
            <p class="auth-description">Please enter your credentials to create an account.<br>Already have an account? <a href="signin.php">Sign In</a></p>
                
            
            <form action="../public/main/main.php" method="post">
            <div class="auth-credentials m-b-xxl">
                <label for="signUpUsername" class="form-label">Name</label>
                <input name="username" type="text" class="form-control m-b-md" id="signUpUsername" aria-describedby="signUpUsername" placeholder="Enter Name">

                <?php if(isset($_SESSION['name_error'])) { ?>
                <div id="emailHelp" class="form-text m-b-md text-danger"><?php echo $_SESSION['name_error'] ?></div>
                <?php } unset($_SESSION['name_error']) ?>

                <label for="signUpEmail" class="form-label">Email address</label>
                <input name="email" type="text" class="form-control m-b-md" id="signUpEmail" aria-describedby="signUpEmail" placeholder="example@neptune.com">

                <?php if(isset($_SESSION['email_error'])) { ?>
                <div id="emailHelp" class="form-text m-b-md text-danger"><?php echo $_SESSION['email_error'] ?></div>
                <?php } unset($_SESSION['email_error']) ?>

                <label for="signUpPassword" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="signUpPassword" aria-describedby="signUpPassword" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
               
                <?php if(isset($_SESSION['password_error'])) { ?>
                <div id="emailHelp" class="form-text m-b-md text-danger"><?php echo $_SESSION['password_error'] ?></div>
                <?php } unset($_SESSION['password_error']) ?>
               

                <label for="signUpPassword" class="form-label">Confirm Password</label>
              <input name="c_password" type="password" class="form-control" id="signUpPassword" aria-describedby="signUpPassword" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
            
              <?php if(isset($_SESSION['c_password_error'])) { ?>
                <div id="emailHelp" class="form-text m-b-md text-danger"><?php echo $_SESSION['c_password_error'] ?></div>
                <?php } unset($_SESSION['c_password_error']) ?>
            
            </div>

            <div class="auth-submit">
                <button name="signupBt" class="btn btn-primary" type="submit">Sign Up</button>
            </div>
            </form>

            <div class="divider"></div>            
        </div>
    </div>
    
    <!-- Javascripts -->
    <script src="../public/assets/plugins/jquery/jquery-3.5.1.min.js"></script>
    <script src="../public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../public/assets/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
    <script src="../public/assets/plugins/pace/pace.min.js"></script>
    <script src="../public/assets/js/main.min.js"></script>
    <script src="../public/assets/js/custom.js"></script>
</body>
</html>