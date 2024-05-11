<!DOCTYPE html>
<head>
    <title>Blood Donation Website</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Blood Donation Website</h1>
        <a href="newdonor.html" class="btn">New Donor</a>
        <a href="request.html" class="btn">Request Donation</a>
        <a href="filter.php" class="btn">Filter</a>
        <ul class="donor-list">
            <?php
            $conn = mysqli_connect("localhost", "root", "", "blood_donation");
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $sql = "SELECT * FROM donors";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<li class='donor'>";
                    echo "<p>Name: " . $row["name"] . "</p>";
                    echo "<p>Blood Group: " . $row["blood_group"] . "</p>";
                    echo "<p>Contact: " . $row["contact"] . "</p>";
                    echo "</li>";
                }
            } else {
                echo "0 results";
            }
            mysqli_close($conn);
            ?>
        </ul>
    </div>
</body>
</html>
