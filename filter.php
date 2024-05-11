<!DOCTYPE html>
<head>
    <title>Blood Donation Website</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Blood Donation Website</h1>
        <a href="new_donor.php" class="btn">New Donor</a>
        <a href="request_donation.php" class="btn">Request Donation</a>
        <form action="" method="get">
            <label for="bloodGroup">Filter Donors with Blood Group:</label>
            <select name="bloodGroup" id="bloodGroup">
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
            </select>
            <input type="submit" value="Filter" class="btn">
        </form>
        <ul class="donor-list">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "blood_donation";
            $conn = new mysqli($servername, $username, $password, $database);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT * FROM donors";
            if (isset($_GET['bloodGroup'])) {
                $bloodGroup = $_GET['bloodGroup'];
                $sql .= " WHERE blood_group = '$bloodGroup'";
            }
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<li class='donor'>";
                    echo "<p>Name: " . $row["name"] . "</p>";
                    echo "<p>Blood Group: " . $row["blood_group"] . "</p>";
                    echo "<p>Contact: " . $row["contact"] . "</p>";
                    echo "</li>";
                }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
        </ul>
    </div>
</body>
</html>
