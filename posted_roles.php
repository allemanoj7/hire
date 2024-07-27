<?php
session_start();
include("connection.php");
$email = $_SESSION['email'];
$sql = "SELECT company_name FROM employer
        WHERE email = '$email'";

$result = $conn->query($sql);
$company_name = "";
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $company_name = $row['company_name'];
    }
}

$sql = "SELECT role_name, openings, salary, company_name FROM roles WHERE company_name = '$company_name'";

$result = $conn->query($sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Posted Roles</title>
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
            function redirectToPage(role_name, company_name) {
            console.log(role_name);
            console.log(company_name);

            var url = 'applications_received.php?role_name=' + encodeURIComponent(role_name) + '&company_name=' + encodeURIComponent(company_name);

            window.location.href = url;
        }
    </script>
</head>
<body>
    <h1>Posted Roles</h1>
    <table>
        <tr>
            <th>Role Name</th>
            <th>Openings</th>
            <th>Salary</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {

                echo "<tr onclick='redirectToPage(\"" . htmlspecialchars($row['role_name']) . "\", \"" . htmlspecialchars($row['company_name']) . "\")'><td>" . $row["role_name"] . "</td><td>" . $row["openings"] . "</td><td>" .$row['salary'] . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No roles posted</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>

