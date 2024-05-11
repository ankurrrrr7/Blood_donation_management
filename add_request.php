<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    $sql = "INSERT INTO donation_requests (blood_group, contact) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $bloodGroup, $contact);
    if ($stmt->execute() === TRUE) {
        echo "Donation request added successfully <a href = 'index.php'> click here </a> ";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>
