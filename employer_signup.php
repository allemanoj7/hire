<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .form-container {
            max-width: 800px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .form-group {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 15px;
        }
        .form-group label {
            width: 100%;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }
        .form-group.half-width {
            flex: 1 1 48%;
            margin-right: 4%;
        }
        .form-group.half-width:last-child {
            margin-right: 0;
        }
        .form-group input[type="file"] {
            padding: 3px;
        }
        .form-actions {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .form-actions button {
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #2196F3;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .form-actions button:hover {
            background-color: #1976D2;
        }
        .login{
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: green;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Registration Form</h2>
        <form action="insert_employer.php" method="post" enctype="multipart/form-data">
            <div class="form-group half-width">
                <label for="concern-person-name">Concern Person Name *</label>
                <input type="text" name="concern_person" id="concern-person-name" placeholder="Concern Person Name" required>
            </div>
            <div class="form-group half-width">
                <label for="email">Your Email *</label>
                <input type="email" name="email" id="email" placeholder="you@jobsalerts.com" required>
            </div>
            <div class="form-group half-width">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="e.g. 'Pass@20178'" required>
            </div>
            <div class="form-group half-width">
                <label for="company-name">Company Name</label>
                <input type="text" name="company_name" id="company-name" placeholder="Enter the Name of your Company">
            </div>
            <div class="form-group">
                <label for="tag_line">Tagline</label>
                <input type="text" name="tag_line" id="tag_line" placeholder="Briefly Describe about your Company">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" rows="4" placeholder="Describe your Company"></textarea>
            </div>
            <div class="form-group half-width">
                <label for="website">Website</label>
                <input name="website" id="website" placeholder="e.g. http://www.jobsalert.com">
            </div>
            <div class="form-group half-width">
                <label for="logo">Logo</label>
                <input type="file" id="logo" name="logo">
            </div>
            <div class="form-actions">
                <button type="submit">SIGN UP</button>
            </div>
        </form>
        <button class = "login" type="submit" onclick="window.location.href='login_employer.php'">SIGN IN</button>
    </div>
</body>
</html>
