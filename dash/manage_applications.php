<?php
session_start();
include 'db_connection.php';
$mentor_id = $_SESSION['user_id'];

// Get applications for projects owned by this mentor
// We join 3 tables: applications, projects, and users (to get student name)
$sql = "SELECT 
            applications.id as app_id, 
            applications.status, 
            users.name as student_name, 
            projects.title as project_title 
        FROM applications
        JOIN projects ON applications.project_id = projects.id
        JOIN users ON applications.user_id = users.id
        WHERE projects.mentor_id = '$mentor_id'";

$result = mysqli_query($conn, $sql);

echo "<h2>Review Applications</h2>";
echo "<table border='1'>
        <tr>
            <th>Project</th>
            <th>Student</th>
            <th>Status</th>
            <th>Action</th>
        </tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['project_title'] . "</td>";
    echo "<td>" . $row['student_name'] . "</td>";
    echo "<td>" . $row['status'] . "</td>";
    echo "<td>";
    
    // Action Buttons
    if ($row['status'] == 'pending') {
        echo "<form action='update_status.php' method='POST' style='display:inline;'>
                <input type='hidden' name='app_id' value='" . $row['app_id'] . "'>
                <button type='submit' name='action' value='accepted' style='color:green;'>Accept</button>
                <button type='submit' name='action' value='rejected' style='color:red;'>Reject</button>
              </form>";
    } else {
        echo "Decided";
    }
    
    echo "</td>";
    echo "</tr>";
}
echo "</table>";
?>