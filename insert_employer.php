<?php

$concern_person = $_POST["concern_person"];
$email = $_POST["email"];
$password = $_POST["password"];
$company_name = $_POST["company_name"];
$tag_line = $_POST["tag_line"];
$description = $_POST["description"];
$website = $_POST["website"];
$logo = $_FILES["logo"]["name"];

$servername = "localhost";
$username = "root";
$pwd = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $pwd, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO employer(concern_person, email, password, company_name, tag_line, description, website, logo) VALUES ('$concern_person', '$email', '$password', '$company_name', '$tag_line', '$description', '$website', '$logo')";

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
        <h2>You are registered successfully!</h2>
        <button id = 'signin'>Login</button>
    </div>
    <script>
    document.getElementById('signin').addEventListener('click', function() {
    window.location.href = 'login_employer.php';
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
