<?php
$conn = new mysqli("localhost", "root", "", "thrivehub");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST["taskName"]) && isset($_POST["priority"]) && isset($_POST["deadline"])) {
    $taskName = $conn->real_escape_string($_POST["taskName"]);
    $priority = $conn->real_escape_string($_POST["priority"]);
    $deadline = $conn->real_escape_string($_POST["deadline"]);

    $sql = "INSERT INTO tasks (task_name, priority, deadline) VALUES ('$taskName', '$priority', '$deadline')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Task Created Successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Missing required fields!";
}

$conn->close();
?>
