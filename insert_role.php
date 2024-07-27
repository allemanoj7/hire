<?php
    session_start();
    $email = $_SESSION['email'];

    include("connection.php");

    $sql = "SELECT company_name FROM employer WHERE email = '$email'";
    $fetch_result = $conn->query($sql);

    $company_name = '';
    if ($fetch_result->num_rows > 0) {
        while($row = $fetch_result->fetch_assoc()) {
            $company_name = $row['company_name'];
        }
    }
    $role_name = $_POST["role_name"];
    $description = $_POST["description"]; 
    $qualification = $_POST["qualification"];
    $openings = $_POST["openings"];
    $required_skills = $_POST["required_skills"];
    $location = $_POST["location"];
    $salary = $_POST["salary"];

$sql = "INSERT INTO roles(company_name, role_name, description, qualification, openings, required_skills, location, salary) VALUES ('$company_name', '$role_name', '$description', '$qualification', '$openings', '$required_skills', '$location', '$salary')";

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
        <h2>Role posted successfully!</h2>
        <button id = 'home'>GO BACK TO HOME</button>
    </div>
    <script>
    document.getElementById('home').addEventListener('click', function() {
    window.location.href = 'employer_home.php';
});
</script>
</body>
</html>
";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
        
?>
