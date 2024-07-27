<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobseeker Signup</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f8f9fa;
        }

        header {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 24px;
        }

        .account-section {
            background-color: #28a745;
            color: white;
            text-align: center;
            padding: 20px;
        }

        .account-section button {
            background-color: white;
            color: #28a745;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }

        .signup-form {
            width: 50%;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .signup-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .signup-form form {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .form-group {
            flex: 1;
            min-width: 250px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group input[type="file"] {
            padding: 3px;
        }

        .form-group span {
            font-size: 12px;
            color: #6c757d;
        }

        .signup-btn {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <header>Jobseeker</header>
    <section class="account-section">
        <p>Have an Account?</p>
        <p>If you don't have an account you can create one below by entering your email address.</p>
        <button id="signin">SIGN IN NOW</button>
    </section>
    <div class="signup-form">
        <h2>Signup</h2>
        <form action="insert_jobseeker.php" method="post">
            <div class="form-group">
                <label for="fullname">Full Name<span>*</span></label>
                <input type="text" name ="name" id="fullname" placeholder="Full Name" required>
            </div>
            <div class="form-group">
                <label for="email">Your Email<span>*</span></label>
                <input type="email" name="email" id="email" placeholder="you@domain.com" required>
            </div>
            <div class="form-group">
                <label for="contact">Contact Number<span>*</span></label>
                <input type="text" name="contact" id="contact" placeholder="e.g. 1234567890" required>
            </div>
            <div class="form-group">
                <label for="password">Password<span>*</span></label>
                <input type="password" name="password" id="password" placeholder="e.g. Pass@20178" required>
            </div>
            <button type="submit" class="signup-btn">SIGN UP</button>
        </form>
    </div>
    <script src="jobseeker_script.js"></script>
</body>
</html>
