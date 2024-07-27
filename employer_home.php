<?php
    session_start();
    $email = $_SESSION['email'];
    include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hire</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

html {
    width: 100%;
    height: 100%;
    overflow: hidden;
    background-color: green;
}

main {
    height: 100vh;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: white;
    padding: 10px 20px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.logo {
    font-size: 24px;
    font-weight: bold;
    color: red;
}

nav ul {
    list-style-type: none;
    display: flex;
    margin: 0;
    padding: 0;
}

nav ul li {
    margin-right: 20px;
}

nav ul li a {
    text-decoration: none;
    color: black;
    font-weight: bold;
}


.search-section {
    color: white;
    text-align: center;
    padding: 50px 20px;
    height: inherit;
    margin-top: 30%;
}

.search-section h1 {
    font-size: 36px;
    margin-bottom: 20px;
}


.user-type-buttons {
    display: flex;
    justify-content: center;
    gap: 10px;
}

.user-type-buttons button {
    padding: 10px 20px;
    background-color: white;
    color: #007bff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

    </style>
</head>
<body>
    <header>
        <div class="logo">Hire</div>
        <?php 
            $sql = "SELECT company_name FROM employer WHERE email = '$email'";
            $fetch_result = $conn->query($sql);
        
            $company_name = '';
            if ($fetch_result->num_rows > 0) {
                while($row = $fetch_result->fetch_assoc()) {
                    $company_name = $row['company_name'];
                }
            }
        ?>
        <div class="company_name"><strong><?php echo htmlspecialchars($company_name); ?></strong></div>
        <nav>
            <ul>
                <li><a href="#">Profile</a></li>
                <li><a href="logout_employer.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="search-section">
            <?php
                 $sql = "SELECT concern_person FROM employer WHERE email = '$email'";
                 $fetch_result = $conn->query($sql);
             
                 $concern_person = '';
                 if ($fetch_result->num_rows > 0) {
                     while($row = $fetch_result->fetch_assoc()) {
                         $concern_person = $row['concern_person'];
                     }
                 }
            ?>

            <h1>WELCOME <?php echo htmlspecialchars($concern_person);?> !!!..</h1>
            <div class="user-type-buttons">
                <button onclick="window.location.href='post_role.php'">Post New Role</button>
                <button onclick="window.location.href='posted_roles.php'">View Posted Roles & Applications</button>
            </div>
        </div>
        
    </main>
</body>
</html>
