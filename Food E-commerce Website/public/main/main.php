
<?php
session_start();
include"../database/database.php";


if(isset($_POST['signupBt'])){

    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];
    
    $name_regex = '/^(?! $)[a-zA-Z ]*$/';
    $email_regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
    $password_regex = '/^(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"/';

        $password_regex_upper = '/^(?=.*?[A-Z])/';
    $password_regex_lower  = '/^(?=.*?[a-z])/';
    $password_regex_digit  = '/^(?=.*?[0-9])/';
    $password_regex_char  = '/^(?=.*?[#?!@$%^&*-])/';
    $password_regex_length = '/^.{8,16}/';


if(!$name){
    $_SESSION['name_error'] = "Please Enter A Name";
    header("location: ../../authentication/signup.php");

}else if(!preg_match($name_regex, $name)){
    $_SESSION['name_error'] = "Please Enter A Valid Name";
    header("location: ../../authentication/signup.php");

}

if(!$email){
    $_SESSION['email_error'] = "Please Enter A Email";
    header("location: ../../authentication/signup.php");
}else if(!preg_match($email_regex, $email)){
    $_SESSION['email_error'] = "Please Enter A Valid Email";
    header("location: ../../authentication/signup.php");

}

if(!$password){
    $_SESSION['password_error'] = "Please Enter A Password";
    header("location: ../../authentication/signup.php");

}else if(!preg_match($password_regex_upper,$password)){
    $_SESSION['password_error'] = "please enter at least one upper case!!";
     header("location: ../../authentication/signup.php");
}else if(!preg_match($password_regex_lower,$password)){
    $_SESSION['password_error'] = "please enter At least one lower case English letter!!";
    header("location: ../../authentication/signup.php");
}else if(!preg_match($password_regex_digit,$password)){
    $_SESSION['password_error'] = "please enter At least one digit!!";
     header("location: ../../authentication/signup.php");
}else if(!preg_match($password_regex_char,$password)){
    $_SESSION['password_error'] = "please enter At least one special character!!";
    header("location: signup.php");
}else if(!preg_match($password_regex_length,$password)){
    $_SESSION['password_error'] = "please enter Minimum eight in length!!";
     header("location: ../../authentication/signup.php");


}
if(!$c_password){
    $_SESSION['c_password_error'] = "Please Enter A Confirmation Password";
     header("location: ../../authentication/signup.php");

}else if($c_password != $password){
    $_SESSION['c_password_error'] = "Password doest not match";
     header("location: ../../authentication/signup.php");
}else{

    // $encrypt_pass = sha1($password);
    $query = "INSERT INTO users (`name`, `email`, `password`) VALUES ('$name', '$email', '$password')";
    mysqli_query($db_connect,$query);
    $_SESSION['reg_done'] = "Congratulations Mr/Ms $name. <br>Your Registration Is Successful";
    header("location: ../../authentication/signin.php");
}

}

                // Login-process....



if(isset($_POST['signin_btn'])){
    echo "hello";

    $email = $_POST['email'];
    $password = $_POST['password'];

    $email_regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
    $password_regex = '/^(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"/';

        $password_regex_upper = '/^(?=.*?[A-Z])/';
    $password_regex_lower  = '/^(?=.*?[a-z])/';
    $password_regex_digit  = '/^(?=.*?[0-9])/';
    $password_regex_char  = '/^(?=.*?[#?!@$%^&*-])/';
    $password_regex_length = '/^.{8,16}/';

    $flag = false;

    if(!$email){
        $flag = true;
        $_SESSION['email_error'] = "Please Enter A Email";
        header("location: ../../authentication/signin.php");
    }


    else if(!preg_match($email_regex, $email)){
        $flag = true;
        $_SESSION['email_error'] = "Please Enter A Valid Email";
        header("location: ../../authentication/signup.php");
    
    }
    

    if(!$password){
        $flag = true;
        $_SESSION['password_error'] = "Please Enter A Password";
        header("location: ../../authentication/signin.php");
    
    }else if(!preg_match($password_regex_upper,$password)){
        $flag = true;
        $_SESSION['password_error'] = "please enter at least one upper case!!";
         header("location: ../../authentication/signin.php");
    }else if(!preg_match($password_regex_lower,$password)){
        $flag = true;
        $_SESSION['password_error'] = "please enter At least one lower case English letter!!";
        header("location: ../../authentication/signin.php");
    }else if(!preg_match($password_regex_digit,$password)){
        $flag = true;
        $_SESSION['password_error'] = "please enter At least one digit!!";
         header("location: ../../authentication/signin.php");
    }else if(!preg_match($password_regex_char,$password)){
        $flag = true;
        $_SESSION['password_error'] = "please enter At least one special character!!";
        header("location: signin.php");
    }else if(!preg_match($password_regex_length,$password)){
        $flag = true;
        $_SESSION['password_error'] = "please enter Minimum eight in length!!";
         header("location: ../../authentication/signin.php");
    
    
    }

    if(!$flag){
       
        $query = "SELECT COUNT(*) AS 'valid' FROM users WHERE email='$email' AND password='$password'";
        $connect = mysqli_query($db_connect,$query);

        $result = mysqli_fetch_assoc($connect);
        
        if($result['valid'] == 1){

            $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
            $connect = mysqli_query($db_connect,$query);
            $author = mysqli_fetch_assoc($connect);

            $_SESSION['author_name'] = $author['name'];
            $_SESSION['temp_name'] = $author['name'];
            $_SESSION['author_id'] = $author['id'];
            $_SESSION['author_email'] = $author['email'];
            $_SESSION['author_img'] = $author['image'];

            header('location:../dashboard/dashboard.php');


        }else{
            $_SESSION['login_failed'] = "Sorry we coudn't find any account. please create";
            header("location: ../../authentication/signin.php");
        }
    }

}





?>