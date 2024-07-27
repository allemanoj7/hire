<?php
include("connection.php");
$role_name = isset($_GET['role_name']) ? htmlspecialchars($_GET['role_name']) : '';
$company_name = isset($_GET['company_name']) ? htmlspecialchars($_GET['company_name']) : '';
$applicant_email = isset($_GET['applicant_email']) ? htmlspecialchars($_GET['applicant_email']) : '';

$sql = "SELECT name, email, dob, gender, education, skills FROM jobseeker_profile WHERE email = '$applicant_email'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicant Details</title>
    <style>
         * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f9;
    color: #333;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 400px;
    text-align: center;
}

h1 {
    margin-bottom: 20px;
    color: #4CAF50;
}

.applicant-info {
    margin-bottom: 20px;
}

.info-item {
    margin-bottom: 10px;
    text-align: left;
}

label {
    font-weight: bold;
    display: inline-block;
    width: 120px;
}

span {
    display: inline-block;
    width: calc(100% - 120px);
}

.buttons {
    display: flex;
    justify-content: space-around;
}

button {
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
}

.select-btn {
    background-color: #4CAF50;
    color: white;
}

.select-btn:hover {
    background-color: #45a049;
}

.reject-btn {
    background-color: #f44336;
    color: white;
}

.reject-btn:hover {
    background-color: #e53935;
}
    </style>
</head>
<body>
    <div class="container">
        <h1>Applicant Details</h1>
        <?php
        while($row = $result->fetch_assoc()) {
            echo "<div class='applicant-info'>
                <div class='info-item'>
                    <label>Name:</label>
                    <span>" . htmlspecialchars($row["name"]) . "</span>
                </div>
                <div class='info-item'>
                    <label>Email:</label>
                    <span>" . htmlspecialchars($row["email"]) . "</span>
                </div>
                <div class='info-item'>
                    <label>Date of Birth:</label>
                    <span>" . htmlspecialchars($row["dob"]) . "</span>
                </div>
                <div class='info-item'>
                    <label>Gender:</label>
                    <span>" . htmlspecialchars($row["gender"]) . "</span>
                </div>
                <div class='info-item'>
                    <label>Education:</label>
                    <span>" . htmlspecialchars($row["education"]) . "</span>
                </div>
                <div class='info-item'>
                    <label>Skills:</label>
                    <span>" . htmlspecialchars($row["skills"]) . "</span>
                </div>
            </div>";
        }
        ?>
        <?php
        $sql = "SELECT status FROM applications WHERE company_name = '$company_name' AND role_name = '$role_name' AND applicant_email = '$applicant_email'";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
        if($row['status'] == 0){
            
            echo "<div class='buttons'>
            <button id='select-btn' class='select-btn' onclick='updateStatus(1)'>Select</button>
            <button id='reject-btn' class='reject-btn' onclick='updateStatus(-1)'>Reject</button>
        </div>";
        }else if($row['status'] == 1){
            echo    "<div class='buttons'>
            <button id='select-btn' class='select-btn' onclick='updateStatus(1)'>Selected</button>
            <button id='reject-btn' class='reject-btn' onclick='updateStatus(-1)'>Reject</button>
        </div>";
        }else{
            echo    "<div class='buttons'>
            <button id='select-btn' class='select-btn' onclick='updateStatus(1)'>Selecte</button>
            <button id='reject-btn' class='reject-btn' onclick='updateStatus(-1)'>Rejected</button>
        </div>";

        }
    }
        ?>
        

    </div>
    <script>
        function updateStatus(status) {
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "update_status.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    const selectButton = document.getElementById('select-btn');
                    const rejectButton = document.getElementById('reject-btn');

                    if (status === 1) {
                        selectButton.textContent = 'Selected';
                        rejectButton.textContent = 'Reject';
                        selectButton.style.backgroundColor = '#4CAF50';
                        selectButton.style.color = 'white';
                        selectButton.disabled = true;
                        rejectButton.disabled = true;
                    } else if (status === -1) {
                        rejectButton.textContent = 'Rejected';
                        SelectButton.textContent = 'Select';
                        rejectButton.style.backgroundColor = '#f44336';
                        rejectButton.style.color = 'white';
                        rejectButton.disabled = true;
                        selectButton.disabled = true;
                    }
                }
            };
            xhr.send("company_name=<?php echo $company_name; ?>&role_name=<?php echo $role_name; ?>&applicant_email=<?php echo $applicant_email; ?>&status=" + status);
        }
    </script>
</body>
</html>
