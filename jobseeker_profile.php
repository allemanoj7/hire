<?php
    session_start();
    include("connection.php");
$email = $_SESSION['email'];
$sql = "SELECT * FROM jobseeker_profile WHERE email = '$email'";
$result = $conn->query($sql);


$rows = $result->num_rows;
    if($rows == 0){
        $sql = "INSERT INTO jobseeker_profile(email) VALUES('$email')";
        $conn->query($sql);
        $query = "SELECT name FROM jobseeker WHERE email = '$email'";
        $result = $conn->query($query);
        $name = "";
        while($row = $result->fetch_assoc()){
            $name = $row['name'];
        }
        $fetch = "SELECT * FROM jobseeker_profile WHERE email = '$email'";
        $fetch_result = $conn->query($fetch);
        $name;
        $profile_pic;
        $dob;
        $gender;
        $education;
        $skills;
        while($row = $fetch_result->fetch_assoc()) {
            $name = $row['name'];
            $profile_pic = $row['profile_pic'];
            $dob = $row['dob'];
            $gender = $row['gender'];
            $education = $row['education'];
            $skills = $row['skills'];
        }

        
    }else{
        $fetch = "SELECT * FROM jobseeker_profile WHERE email = '$email'";
        $fetch_result = $conn->query($fetch);
        $name;
        $profile_pic;
        $dob;
        $gender;
        $education;
        $skills;
        while($row = $fetch_result->fetch_assoc()) {
            $name = $row['name'];
            $profile_pic = $row['profile_pic'];
            $dob = $row['dob'];
            $gender = $row['gender'];
            $education = $row['education'];
            $skills = $row['skills'];
        }
        $profile_pic = "images/".$profile_pic;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .profile-container {
            width: 80%;
            max-width: 800px;
            background-color: #fff;
            padding: 30px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center;
        }
        .profile-container img {
            max-width: 150px;
            border-radius: 50%;
            margin-bottom: 20px;
        }
        .profile-container h1 {
            margin-bottom: 20px;
            font-size: 2.5em;
            color: #333;
        }
        .profile-container p {
            font-size: 1.2em;
            margin: 10px 0;
            color: #555;
        }
        .profile-container p strong {
            color: #333;
        }
        .update-button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            font-size: 1.1em;
            color: #fff;
            background-color: #28a745;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .update-button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <img src="<?php echo htmlspecialchars($profile_pic); ?>" alt="User Image">
        <h1><?php echo htmlspecialchars($name); ?></h1>
        <p><strong>Date of Birth:</strong> <?php echo htmlspecialchars($dob); ?></p>
        <p><strong>Gender:</strong> <?php echo htmlspecialchars($gender); ?></p>
        <p><strong>Education:</strong> <?php echo htmlspecialchars($education); ?></p>
        <p><strong>Skills:</strong> <?php echo htmlspecialchars($skills); ?></p>
        <a href="update_profile.php" class="update-button">Update</a>
    </div>
</body>
</html>
