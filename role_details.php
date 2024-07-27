<?php
session_start();
$email = $_SESSION['email'];
include("connection.php");
$role_name = isset($_GET['role_name']) ? htmlspecialchars($_GET['role_name']) : '';
$company_name = isset($_GET['company_name']) ? htmlspecialchars($_GET['company_name']) : '';

$stmt = $conn->prepare("SELECT role_name, company_name, qualification, required_skills, location, salary, description FROM roles WHERE role_name = ? and company_name = ?");
$stmt->bind_param("ss", $role_name, $company_name);
$stmt->execute();

$result = $stmt->get_result();

echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Job Details</title>
    <style>
        /* styles.css */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f2f5;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
            padding: 20px; /* Added padding to ensure some space around the content */
            box-sizing: border-box;
        }

        .job-details {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 100%;
            max-width: 800px; /* Adjusted max width */
            box-sizing: border-box;
        }

        h1.role-name {
            font-size: 2rem;
            color: #333;
            margin: 0;
        }

        h2.company-name {
            font-size: 1.5rem;
            color: #666;
            margin: 10px 0;
        }

        .details p {
            margin: 10px 0;
            color: #555;
        }

        .description h3 {
            margin: 20px 0 10px;
            color: #333;
        }

        .description p {
            color: #555;
            line-height: 1.6;
        }

        .apply-button {
            display: block;
            width: 100%;
            padding: 15px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            text-align: center;
            margin-top: 20px;
        }

        .apply-button:hover {
            background-color: #0056b3;
        }

    </style>
</head>
<body>
    <div class='container'>
        <div class='job-details'>
            <h1 class='role-name'>" . htmlspecialchars($role_name) . "</h1>
            <h2 class='company-name'>" . htmlspecialchars($company_name) . "</h2>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $qualification = $row['qualification'];
        $required_skills = $row['required_skills'];
        $location = $row['location'];
        $salary = $row['salary'];
        $description = $row['description'];
    }

    echo "<div class='details'>
            <p><strong>Qualification:</strong> " . htmlspecialchars($qualification) . "</p>
            <p><strong>Skills Required:</strong> " . htmlspecialchars($required_skills) . "</p>
            <p><strong>Location:</strong> " . htmlspecialchars($location) . "</p>
            <p><strong>Salary:</strong> " . htmlspecialchars($salary) . "</p>
        </div>
        <div class='description'>
            <h3>Job Description</h3>
            <p>" . htmlspecialchars($description) . "</p>
        </div>";
}

$stmt = $conn->prepare("SELECT applicant_email FROM applications WHERE company_name = ? and role_name = ? and applicant_email = ?");
$stmt->bind_param("sss", $company_name, $role_name, $email);

// Execute the statement
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    
echo "<button id='applyButton' class='apply-button' onclick='redirectToPage(\"" . htmlspecialchars($company_name) . "\", \"" . htmlspecialchars($role_name) . "\",\"" . htmlspecialchars($email) . "\")'>Apply Now</button>";
}else{
    echo "<button  class='apply-button' >Applied</button>";
}
        echo "</div>
    </div>
    <script>
        function redirectToPage(company_name, role_name, applicant_email) {
            console.log(role_name);
            console.log(company_name);

            var url = 'apply.php?role_name=' + encodeURIComponent(role_name) + 
                      '&company_name=' + encodeURIComponent(company_name) + 
                      '&applicant_email=' + encodeURIComponent(applicant_email);

            window.location.href = url;
        }
    </script>
</body>
</html>";
?>
