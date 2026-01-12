<?php
session_start();
include("./webpages/database.php"); // Your DB connection file

// 1. Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    die("Please login first.");
}

if (isset($_POST['apply_btn'])) {
    $user_id = $_SESSION['user_id'];
    $project_id = $_POST['project_id'];

    // 2. Double check: prevent duplicate entries on the server side
    $check_sql = "SELECT * FROM applications WHERE project_id = ? AND user_id = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param("ii", $project_id, $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('You have already applied!'); window.location.href='projects.php';</script>";
    } else {
        // 3. Insert the application
        $insert_sql = "INSERT INTO applications (project_id, user_id, status) VALUES (?, ?, 'pending')";
        $stmt = $conn->prepare($insert_sql);
        $stmt->bind_param("ii", $project_id, $user_id);
        
        if ($stmt->execute()) {
            echo "<script>alert('Application submitted successfully!'); window.location.href='projects.php';</script>";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>