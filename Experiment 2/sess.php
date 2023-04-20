<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Facebook Login</title>
    <style>
      form {
        margin: 50px auto;
        width: 50%;
        text-align: center;
      }
      input[type=text], input[type=email], input[type=password] {
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
        width: 100%;
        max-width: 400px;
      }
      input[type=submit] {
        background-color: #1b892b;;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
        max-width: 400px;
      }
      a {
        color: #4267B2;
        text-decoration: none;
      }

      a:hover {
        text-decoration: underline;
      }
      label {
        display: inline-block;
        text-align: left;
        width: 100%;
        max-width: 400px;
      }
      .top{
                background-color: #4267B2;
                height: max-content;
                color:white;
                border-color: #2f4297;
      }
      input[type=submit]:hover {
			background-color:  #2f4297;  
      }    
    </style>
  </head>
  <body>
    <div class="top" >
        <centre><h1>FACEBOOK</h1></centre>
         <centre><h4>Connnect With Friends</h4></centre>
         </div>
    <div style="padding-left:-30px;margin-left:850px;">
    <form action="sess2.php" method="POST">
      <h1>Log in to Facebook</h1>
      <label for="username">Username:</label>
      <br>
      <input type="text" id="username" name="name">
      <br>
      <label for="email">Email:</label>
      <br>
      <input type="email" id="email" name="email">
      <br>
      <label for="password">Password:</label>
      <br>
      <input type="password" id="password" name="pas">
      <br>
      <input type="submit" value="Log In">
      <br>
      <a href="regis.html">no account? Sign Up</a>
    </form>
  </div>
</div style="background-color:yellow;margin-top:50px;">
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sessions";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT username, image, l
            FROM img2
            ORDER BY l DESC
            LIMIT 3";
    $result = mysqli_query($conn, $sql);


    echo '<table border=1 style="margin-top:-400px;margin-left:50px;width:50%;">';
    echo '<tr><th>Username</th><th>Image</th><th>Likes</th></tr>';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td align="center">' . htmlspecialchars($row['username']) . '</td>';
        echo '<td align="center"><img style="width:150px;height:150px;"src="upload/' . htmlspecialchars($row['image']) . '"></td>';
        echo '<td align="center">' . htmlspecialchars($row['l']) . '</td>';
        echo '</tr>';
    }
    echo '</table>';
  
    mysqli_close($conn);
    ?>
</div>
  </body>
</html>
