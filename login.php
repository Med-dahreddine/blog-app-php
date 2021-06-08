
<?php

class User{ 


        private $host = 'localhost';
        private $user = 'root';
        private $password = '';
        private $database = 'blog_oop';
        
        public $con = null;
        
        public function __construct(){
            //initialize connection property
            $this->con = mysqli_connect($this->host,$this->user,$this->password,$this->database);
            if($this->con->connect_error){
                echo "error" . $this->con->connect_error;
            }else{
                // echo 'succesful';
            }
        }

    public function login($email,$password){
        $sql = "SELECT * FROM user WHERE email= '$email' and password='$password'";
        // die($sql);
            if($result = $this->con->query($sql)){
                return($result->fetch_assoc());
                // if(count($result) > 0){
                //     return $result[0];
                // }else{
                //     return false;
                // }
            }else{
            return false;
        } 
    }
}
?>
<?php
session_start();
if(isset($_POST['login'])){
    $email = $_POST['uemail'];
    $password = $_POST['upass'];

    if (!empty($email) && !empty($password)) {

        $User = new User();
        $UserData = $User->login($email,$password);
        if ($UserData){
            $_SESSION['id'] = $UserData['id'];
            $_SESSION['login'] = true;
            header('location: index.php');
            echo "connected successfully";
        }else{
            echo 'Email or Password are wrong!';
        }
    }
}

?>   

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Login </title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merienda+One">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style1.css">

</head>

<body>
    <?php 

?>


    <div class="login-form">
        <form action="" method="POST">
            <div class="avatar"><i class="material-icons">&#xE7FF;</i></div>
            <h4 class="modal-title">Login to Your Account</h4>
            <div class="form-group">
                <input type="email" name="uemail" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="password" name="upass" class="form-control" placeholder="Password">
            </div>
            <div class="form-group small clearfix">
                <label class="form-check-label"><input type="checkbox"> Remember me</label>
                <a href="#" class="forgot-link">Forgot Password?</a>
            </div>
            <input type="submit" class="btn btn-primary btn-block btn-lg" name="login" value="Login">
        </form>
        <div class="text-center small">Don't have an account? <a href="#">Sign up</a></div>
    </div>

</body>

</html>
</body>

</html>