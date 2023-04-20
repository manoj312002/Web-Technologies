<?php
// Replace with your own database connection details
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database_name";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve the top 3 liked images from the database
$sql = "SELECT users.username, images.image_url, COUNT(likes.user_id) AS like_count
        FROM images
        INNER JOIN users ON images.user_id = users.id
        LEFT JOIN likes ON images.id = likes.image_id
        GROUP BY images.id
        ORDER BY like_count DESC
        LIMIT 3";
$result = mysqli_query($conn, $sql);

// Create the table header
echo '<table>';
echo '<tr><th>Username</th><th>Image</th><th>Likes</th></tr>';

// Loop through the results and display each row in the table
while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>' . htmlspecialchars($row['username']) . '</td>';
    echo '<td><img src="' . htmlspecialchars($row['image_url']) . '"></td>';
    echo '<td>' . htmlspecialchars($row['like_count']) . '</td>';
    echo '</tr>';
}

// Close the table
echo '</table>';

// Close the database connection
mysqli_close($conn);
?>
