<?php
    include("connection.php");

    $role_name = $_POST["role_name"];
    $company_name = $_POST["company_name"];

    $stmt = $conn->prepare("SELECT role_name, company_name, location, salary, interests FROM roles WHERE role_name = ? OR company_name = ?");
    $role_name = $role_name;
    $company_name = $company_name;
    $stmt->bind_param("ss", $role_name, $company_name);

    $stmt->execute();

    $result = $stmt->get_result();

    echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Job Search Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .search-results {
            width: 100%;
            padding: 10px;
        }

        .job-result {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 10px;
            width: 100%;
            box-sizing: border-box;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .job-info {
            max-width: 80%;
        }

        .apply-btn {
            background-color: green;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .apply-btn:hover {
            background-color: darkgreen;
        }

        @media (max-width: 768px) {
            .job-result {
                flex-direction: column;
                align-items: flex-start;
            }

            .apply-btn {
                width: 100%;
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>
    <div class='search-results'>
        <h1>Search Results:</h1>";  
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {


            echo "<div class='job-result'  onclick='redirectToPage(\"" . htmlspecialchars($row['role_name']) . "\", \"" . htmlspecialchars($row['company_name']) . "\")'>
            <div class='job-info'>
                <h2>".htmlspecialchars($row['role_name'])."</h2>
                <p>".htmlspecialchars($row['company_name'])."</p>
                <p>".htmlspecialchars($row['location'])."</p>
                <p>".htmlspecialchars($row['salary'])."</p>
            </div>
        </div>";

        }

        echo "</div>

        <script>
            function redirectToPage(role_name, company_name) {
            console.log(role_name);
            console.log(company_name);

            var url = 'role_details.php?role_name=' + encodeURIComponent(role_name) + '&company_name=' + encodeURIComponent(company_name);

            window.location.href = url;
        }
        </script>
        </body>
        </html>";
    } else {
        echo "<p>No results found</p>";
    }
?>