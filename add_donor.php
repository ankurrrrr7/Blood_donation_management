<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $bloodGroup = $_POST["bloodGroup"];
    $contact = $_POST["contact"];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "blood_donation";
    $conn = new mysqli($servername, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO donors (name, blood_group, contact) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $bloodGroup, $contact);
    if ($stmt->execute() === TRUE) {
        echo "New donor added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>
