<?php
include("connection.php");
$role_name = isset($_GET['role_name']) ? htmlspecialchars($_GET['role_name']) : '';
$company_name = isset($_GET['company_name']) ? htmlspecialchars($_GET['company_name']) : '';
$applicant_email = isset($_GET['applicant_email']) ? htmlspecialchars($_GET['applicant_email']) : '';
$status = 0;

$sql = "INSERT INTO applications(company_name, role_name, applicant_email, status) VALUES ('$company_name', '$role_name', '$applicant_email', '$status')";

if ($conn->query($sql) === TRUE) {
    echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Registration Success</title>
    <style>
      body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f0f0f0;
}

.container {
    text-align: center;
}

h2 {
    color: #333;
}

button {
    padding: 10px 20px;
    margin-top: 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #0056b3;
}

    </style>

</head>
<body>
    <div class='container'>
        <h2>Application Submitted successfully!</h2>
        <p>You can track your applications in Applied Roles Section.</p>
    </div>

</body>
</html>
";
}

?>
