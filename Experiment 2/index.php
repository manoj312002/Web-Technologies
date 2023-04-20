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
$files=glob("C:\xampp\htdocs\Facebook\upload");
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
    <title>image uploading</title>
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
    <div>
      <!DOCTYPE html>
      <html lang="en" dir="ltr">
        <head>
          <meta charset="utf-8">
          <title>Upload Image Ajax</title>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        </head>
        <style media="screen">
          .preview{
            display: block;
            width: 250px;
            height: 150px;
            border: 1px solid black;
            margin-top: 50px;
            margin-left:550px;
          }
        </style>
        <body>
          <form method = "post" action = "" enctype = "multipart/form-data">
            <input style="margin-top:100px;margin-left:500px;" type="file" name="fileImg" id="fileImg">
            <button type="button" onclick = "submitData();">Submit</button>
            <div class = "preview">
              <img src="" id = "img" alt = "Preview" style = "width: 100%; height: 100%">
            </div>
          </form>

          <script type="text/javascript">
            // Preview
            fileImg.onchange = evt => {
              const [file] = fileImg.files
              if (file) {
                img.src = URL.createObjectURL(file)
              }
            }
            function submitData(){
              $(document).ready(function(){
                var formData = new FormData();
                var files = $('#fileImg')[0].files;
                formData.append('fileImg', files[0]);

                $.ajax({
                  url: 'function.php',
                  type: 'post',
                  data: formData,
                  contentType: false,
                  processData: false,
                  success:function(response){
                    if(response == "Success"){
                      alert("Successfully Added");
                    }
                    else if(response == "Invalid Extension"){
                      alert("Invalid Extension");
                    }
                    else{
                      alert("Please Fill Out The Form");
                    }
                  }
                });
              });
            }
          </script>
        </body>
      </html>
    </div>
  </body>
</html>

<html>
