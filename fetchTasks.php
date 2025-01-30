<?php
// Database Connection
$conn = new mysqli("localhost", "root", "", "thrivehub");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch Tasks from Database
$sql = "SELECT task_name, priority, deadline FROM tasks";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li><strong>" . $row["task_name"] . "</strong> - Priority: " . $row["priority"] . " - Deadline: " . $row["deadline"] . "</li>";
    }
    echo "</ul>";
} else {
    echo "No tasks available.";
}

$conn->close();
?>
