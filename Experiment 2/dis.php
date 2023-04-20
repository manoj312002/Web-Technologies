<?php
// Check if the form has been submitted and the image ID has been sent via POST
if (isset($_POST['photo'])) {
    // Retrieve the image ID from the POST request
    $image_id = $_POST['photo'];

    // Create a database connection
    $conn = mysqli_connect('localhost', 'root', '', 'sessions');
    if (mysqli_connect_error()) {
        die('connection failed');
    }

    // Update the number of likes for the corresponding image in the database
    $sql = "UPDATE img2 SET l = l + 1 WHERE image = '$image_id'";
    mysqli_query($conn, $sql);

    // Close the database connection
    mysqli_close($conn);
}

// Display the images and like buttons
$conn=mysqli_connect('localhost',"root","","sessions");
$sql = "SELECT username,image,l FROM img2";
$files=glob("img/.");
$result = mysqli_query($conn, $sql);
if (mysqli_connect_error()){
    die('connection failed');
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Navigation Bar and Footer Example</title>
    <style>
      /* Navigation bar style */
      nav {
        background-color: #4267B2;
        overflow: hidden;

      }
     html{
       height:100%;
     }
      nav a {
        float: left;
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;

      }
   body{
     min-height: 100%;
     display: flex;
     flex-direction: column;
   }
   img {
       width: 300px;
       height: 200px;
   }
   body{
       background:url("d.jpg");
       background-size:cover;
       /* overflow-y:hidden; */
           }
      nav a:hover {
        background-color: #ddd;
        color: black;

      }

      /* Footer style */
      footer {
        background-color: #4267B2;
        color: white;
        text-align: center;
        padding: 10px;
        margin-top: auto;
      }
      img {
        width: 600px;
      height: 400px;
    margin: 0 auto;
      display: block;
      /* margin-top: 40px; */
      margin-right: 100px;
     margin-left: 500px;
      margin-bottom: 10px;
      box-shadow: 0px 0px 5px black;
      }

              .g{
                  display: flex;
                  flex-wrap: wrap;

              }
              .lb{
                  background-color: red;
                  color: white;
                  border: none;
                  padding: 10px;
                  border-radius: 5px;
                  cursor: pointer;
                  margin-left: 500px;
                  margin-bottom:40px;
                  box-shadow: 0px 0px 5px black;
              }
              .lb:hover{
                  background-color: white;
                  color:red;
              }
              .un{
                margin-left: 500px;
              }
              .l{
                color: red;
              }
    </style>
  </head>
  <body>
    <!-- Navigation bar -->
    <nav>
      <a href="sess4.php">Home</a>
      <a href="profile.php">Profile</a>
      <a href="users.php">Users</a>
      <a href="index.php">Upload</a>
      <a href="display.php">Images</a>
      <a href="sess3.php" name="logout">Logout</a>
    </nav>


    <div class="g">
  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
             <div class="i">
               <h2 class="un"><?php echo $row['username'];?></h2>
              <img src="<?php echo "upload/".$row['image']; ?>" alt="User Image">
              <form action="" method="post">
                  <input type="hidden" name="photo" value="<?php echo $row['image']; ?>">
                  <button type="submit" class="lb"><class ="l">&#10084 </><?php echo $row['l']; ?></button>
              </form>
           </div>
  <?php } ?>
<div>
  </body>
</html>

<html>
