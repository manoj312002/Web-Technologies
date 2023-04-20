<html>

<head>
 <style>
        body {
  margin: 0;
  padding: 0;
  font-family: sans-serif;
}

nav {
  background-color:cornflowerblue;
  color: #fff;
  display: flex;
  justify-content: space-evenly;
  align-items: center;
  height: 80px;
  padding: 0 20px;
}

h1, nav ul {
  margin: 0;
  padding: 0;
}

h1 {
  font-size: 3em;
}

nav ul {
  list-style: none;
  display: flex;
}

nav ul li a {
  color: #fff;
  text-decoration: none;
  padding: 10px;
  border-radius: 5px;
}

nav ul li a:hover {
  background-color: #555;
}



.widgets {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  align-items: center;
}

.widget {
  background-color: #f2f2f2;
  padding: 20px;
  border-radius: 5px;
  width: 30%;
  margin-bottom: 20px;
}

.widget h2 {
  margin-top: 0;
}
main {
        margin-left: 500px;
        margin-right: 500px;
        margin-top: 200px;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        text-align: center;
        font-size: 24px;
      }
.widget p {
  margin-bottom: 0;
}
input[type="submit"]
{
    background-color:blue;
    color: #fff;
    width: 110%;
    height: 110%;
    margin-bottom: 4%;
    font-size:102%;
    cursor: pointer;
}
input[type="submit"]:hover{
  background-color: #555;
}
    </style>
</head>
<body>
<form action="se3.php" method="post">
<nav>
    <h1>facebook </h1>
    <ul>
      <li><a href="d.php">Home</a></li>
      <li></li>
      <li><a href="profile.php">Profile</a></li>
      <li></li>
      <li><a href="imgup.php">upload</a></li>
      <li></li>
      <li><a href="sess3.php" name="logout">Logout</a></li>
    </ul>
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
</form>
</body>
</html>
