<?php
include("connection.php");

$company_name = isset($_POST['company_name']) ? htmlspecialchars($_POST['company_name']) : '';
$role_name = isset($_POST['role_name']) ? htmlspecialchars($_POST['role_name']) : '';
$applicant_email = isset($_POST['applicant_email']) ? htmlspecialchars($_POST['applicant_email']) : '';
$status = isset($_POST['status']) ? intval($_POST['status']) : 0;

$query = $conn->prepare("UPDATE applications SET status = ? WHERE company_name = ? AND role_name = ? AND applicant_email = ?");
$query->bind_param("isss", $status, $company_name, $role_name, $applicant_email);

if ($query->execute()) {
    echo "Status updated successfully.";
} else {
    echo "Error updating status.";
}

$conn->close();
?>
