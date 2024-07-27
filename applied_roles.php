<?php
session_start();
include("connection.php");
$applicant_email = $_SESSION['email'];


$sql = "SELECT company_name, role_name, status FROM applications
        WHERE applicant_email = '$applicant_email'";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Applied Roles</title>
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
</head>
<body>
    <h1>Applied Roles</h1>
    <table>
        <tr>
            <th>Company Name</th>
            <th>Role Name</th>
            <th>Application Status</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $status = "";
                if ($row["status"] == 0) {
                    $status = "Under Process";
                    $statusClass = "under-process";
                } elseif ($row["status"] == 1) {
                    $status = "Accepted";
                    $statusClass = "accepted";
                } elseif ($row["status"] == -1) {
                    $status = "Rejected";
                    $statusClass = "rejected";
                }
                echo "<tr><td>" . $row["company_name"] . "</td><td>" . $row["role_name"] . "</td><td class='status $statusClass'>" . $status . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No applications found</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>

