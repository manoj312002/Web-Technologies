
<?php

if (isset($_POST['photo'])) {

    $image_id = $_POST['photo'];


    $conn = mysqli_connect('localhost', 'root', '', 'sessions');
    if (mysqli_connect_error()) {
        die('connection failed');
    }
    session_start();

    if (!isset($_SESSION["name"])) {

      header("Location: sess.php");
      exit();
    }

    $username = $_SESSION["name"];

    $sql = "UPDATE img2 SET l = l + 1 WHERE image = '$image_id'";
    mysqli_query($conn, $sql);

    mysqli_close($conn);
}

$conn=mysqli_connect('localhost',"root","","sessions");
$sql = "SELECT * FROM img2";
$files=("C:\xampp\htdocs\Facebook\upload");
$result = mysqli_query($conn, $sql);
if (mysqli_connect_error()){
    die('connection failed');
}
error_reporting(0);

mysqli_close($conn);
?>
<?php session_start();
if($_SESSION['name']=="")
{
  header("location:sess.php");
}?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>facebook home</title>
    <style>
      nav {
        background-color: cornflowerblue;
        overflow: auto;
      }
     html{
       height:100%;
     }
      nav a {
        float: right;
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
   table {
       color: darkblue;
       font-size: 30px;
   }
   img {
       width: 300px;
       height: 200px;
   }
   body{
       background:url("d.jpg");
       background-size:cover;
           }
      nav a:hover {
        background-color: black;
        color: white;
      }
      img {
        width: 600px;
      height: 400px;
    margin: 0 auto;
      display: block;
      margin-right: 100px;
     margin-left: 500px;
      margin-bottom: 10px;
      box-shadow: 0px 0px 5px black;
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


    <div class="g">
  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
             <div>
               <h2 class="un"><?php echo $row['username'];?></h2>
              <img src="<?php echo "upload/".$row['image']; ?>" alt="User Image">
              <form action="" method="post">
                  <input type="hidden" name="photo" value="<?php echo $row['image']; ?>">
                  <button type="submit" class="lb">&#10084 <?php echo $row['l']; ?></button>
              </form>
           </div>
  <?php } ?>
<div>
  </body>
</html>

<html>
