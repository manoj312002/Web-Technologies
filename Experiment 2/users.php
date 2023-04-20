<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Usernames</title>
    <style>
      nav {
        background-color: #4267B2;
        overflow: hidden;
      }
      nav a {
        float: right;
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
      }
      nav a:hover {
        background-color: black;
        color: white;
      }
      body{
        min-height: 100%;
        display: flex;
        flex-direction: column;
      }

      html{
        height:100%;
      }

      main {
        margin: auto;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        text-align: center;
        font-size: 24px;
      }
    </style>
  </head>
  <body>
  <nav>
    <a href="sess3.php" name="logout">Logout</a>
    <a href="display.php">Images</a>
    <a href="index.php">Upload</a>
    <a href="users.php">Users</a>
    <a href="profile.php">Profile</a>
    <a href="sess4.php">Home</a>  
    </nav>
    <main>
      <?php

        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "sessions";
        $conn = mysqli_connect($host, $username, $password, $database);
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }
        session_start();
        if (!isset($_SESSION["name"])) {
          header("Location: sess.php");
          exit();
        }
        $username = $_SESSION["name"];

        echo "<h1>Usernames</h1>";
        echo "<p>Here are all the active users of the Facebook:</p>";
        echo "<ul>";
        $stmt = $conn->prepare("SELECT Username FROM fb1 WHERE username != ?");
        $stmt->bind_param("s", $username);

        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
          echo "<li>" . $row["Username"] . "</li>";
        }
        $stmt->close();

        echo "</ul>";
        mysqli_close($conn);
      ?>
    </main>
  </body>
</html>
