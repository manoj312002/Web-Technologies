<?php
// Replace with your own database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sessions";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve the top 3 liked images from the img2 table
$sql = "SELECT username, image, l
        FROM img2
        ORDER BY l DESC
        LIMIT 3";
$result = mysqli_query($conn, $sql);

// Create the table header
echo '<table border=1 style="width:100%;">';
echo '<tr><th>Username</th><th>Image</th><th>Likes</th></tr>';

// Loop through the results and display each row in the table
while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>' . htmlspecialchars($row['username']) . '</td>';
    echo '<td><img style="width:150px;height:150px;"src="upload/' . htmlspecialchars($row['image']) . '"></td>';
    echo '<td>' . htmlspecialchars($row['l']) . '</td>';
    echo '</tr>';
}

// Close the table
echo '</table>';

// Close the database connection
mysqli_close($conn);
?>
