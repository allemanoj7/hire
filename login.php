<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f8f9fa;
        }

        header {
            background-color: #fff;
            color: #ff0000;
            padding: 20px;
            font-size: 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        header nav a {
            color: #000;
            text-decoration: none;
            margin-left: 20px;
            font-size: 16px;
        }

        .login-section {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 50px 0;
        }

        .login-section h2 {
            margin: 0;
            font-size: 36px;
        }

        .login-form {
            width: 30%;
            margin: 30px auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .login-form img {
            display: block;
            margin: 0 auto 20px auto;
            border-radius: 50%;
        }

        .login-form form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .login-btn {
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .login-form a {
            color: #007bff;
            text-decoration: none;
            font-size: 14px;
            text-align: center;
            display: block;
            margin-top: 10px;
        }

        .login-form p {
            text-align: center;
            font-size: 14px;
        }

        .login-form p a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <header>
        <div>Hire</div>
    </header>
    <section class="login-section">
        <h2>Login To Your Account</h2>
    </section>
    <div class="login-form">
        <form action="#" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name = "email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name = "password" placeholder="Password" required>
            </div>
            <button type="submit" class="login-btn" name = "sign_in">SIGN IN</button>
            <a href="#">Forgot your Password</a>
        </form>
    </div>
</body>
</html>

<?php
include("connection.php");

if(isset($_POST['sign_in'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = $conn->prepare("SELECT * FROM jobseeker WHERE email = ? AND password = ?");
    $query->bind_param("ss", $email, $password);
    
    $query->execute();
    $result = $query->get_result();
    $rows = $result->num_rows;
    
    if($rows == 1){
        $_SESSION['email'] = $email;
        header('location:jobseeker_home.php');
    }else{
        echo "Invalid Email or Password please try again";
    }
}

?>