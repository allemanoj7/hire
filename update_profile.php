<?php
    session_start();
    include("connection.php");
    $email = $_SESSION['email'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile Form</title>
    <style>
        body {
    font-family: 'Arial', sans-serif;
    background-color: #f7f9fc;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.form-container {
    background-color: #ffffff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
}

h1 {
    margin-bottom: 20px;
    font-size: 24px;
    color: #333333;
    text-align: center;
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
    color: #555555;
}

input[type="text"],
input[type="file"],
select {
    width: 100%;
    padding: 10px;
    border: 1px solid #cccccc;
    border-radius: 4px;
    box-sizing: border-box;
}

button.btn {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    border: none;
    border-radius: 4px;
    color: white;
    font-size: 16px;
    cursor: pointer;
}

button.btn:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body>
    <div class="form-container">
        <h1>User Profile</h1>
        <form action="#" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="profile_pic">Profile Image:</label>
                <input type="file" id="profile_pic" name="profile_pic" required>
            </div>
            <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="dob">DOB:</label>
                <input type="date" id="dob" name="dob" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select id="gender" name="gender" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="education">Education:</label>
                <input type="text" id="education" name="education" required>
            </div>
            <div class="form-group">
                <label for="skills">Skills:(seperated by commas)</label>
                <input type="text" id="skills" name="skills" required>
            </div>
            <button type="update" class="btn">Update..</button>
        </form>
    </div>
</body>
</html>

<?php
                 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                     $name = $_POST['name'];
                     $dob = $_POST['dob'];
                     $gender = $_POST['gender'];
                     $education = $_POST['education'];
                     $skills = $_POST['skills'];

                     $profile_pic = "";
                     if (isset($_FILES["profile_pic"]) && $_FILES["profile_pic"]["error"] == 0) {
                         $profile_pic = $_FILES["profile_pic"]["name"];
                     }
                 
                     include("connection.php");
                 
                     $sql = "UPDATE jobseeker_profile SET name = ?, profile_pic = ?, dob = ?, gender = ?, education = ?, skills = ? WHERE email = ?";
                     $stmt = $conn->prepare($sql);
                     $stmt->bind_param("sssssss", $name, $profile_pic, $dob, $gender, $education, $skills, $email);
                 
                     if ($stmt->execute()) {
                         echo "Updated Successfully";
                     } else {
                         echo "Error updating record: " . $stmt->error;
                     }
                     header('location:jobseeker_profile.php');

                     $stmt->close();
                 }
                 
            ?>
