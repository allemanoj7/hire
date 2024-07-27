<?php
include("connection.php");
$role_name = isset($_GET['role_name']) ? htmlspecialchars($_GET['role_name']) : '';
$company_name = isset($_GET['company_name']) ? htmlspecialchars($_GET['company_name']) : '';
$sql = "SELECT applicant_email FROM applications
        WHERE company_name = '$company_name' AND role_name = '$role_name'";
$result = $conn->query($sql);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Applicants List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        h1 {
            text-align: center;
            margin-top: 20px;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f8f8f8;
        }
        tr:hover {
            background-color: #f9f9f9;
        }
        td.status {
            font-weight: bold;
            color: #fff;
            text-align: center;
            padding: 8px 12px;
            border-radius: 4px;
        }
        td.status.under-process {
            background-color: #007bff;
        }
        td.status.accepted {
            background-color: #28a745;
        }
        td.status.rejected {
            background-color: #dc3545;
        }
    </style>
    <script>
            function redirectToPage(role_name, company_name, applicant_email) {
            console.log(role_name);
            console.log(company_name);
            console.log(applicant_email);

            var url = 'applicant_details.php?role_name=' + encodeURIComponent(role_name) + '&company_name=' + encodeURIComponent(company_name) + '&applicant_email=' + encodeURIComponent(applicant_email);

            window.location.href = url;
        }
    </script>
</head>
<body>
    <h1>Applicants List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th></th>
        </tr>
        <?php




if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        $applicant_email = $row['applicant_email'];
        $sql = "SELECT name FROM jobseeker WHERE email = '$applicant_email'";
        $result2 = $conn->query($sql);
        while($row2 = $result2->fetch_assoc()) {
            $name =  $row2['name'];
        }
        //echo $row['applicant_email'];
        echo "<tr style= 'background-color : #6ac8e1' onclick='redirectToPage(\"" . htmlspecialchars($role_name) . "\", \"" . htmlspecialchars($company_name) . "\",\"" . htmlspecialchars($row["applicant_email"]) . "\")'><td>" . $name . "</td><td>" . $row["applicant_email"] . "</td><td>" .">>>>". "</td></tr>";
    }
} else {
            echo "<tr><td colspan='3'>No Applications Received</td></tr>";
        }
        ?>
    </table>
</body>
</html>