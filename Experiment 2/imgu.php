<?php
    $lk=0;
    $con=mysqli_connect("localhost","root","","sessions");
    $imtemp=$_FILES['photo']['tmp_name'];
    $imname=$_FILES['photo']['name'];
    $imtype=$_FILES['photo']['type'];
    $file_sep=explode('.',$imname);
    $file_ext=strtolower($file_sep[1]);
    $ext=array('jpeg','jpg','png','gif');
    session_start();

    // Check if user is logged in
    if (!isset($_SESSION["name"])) {
      // Redirect to login page
      header("Location: sess.php");
      exit();
    }

    // Retrieve username of logged in user
    $username = $_SESSION["name"];
    if(in_array($file_ext,$ext)){
        $uploadimg='img/'.$imname;

        $sql="INSERT INTO img VALUES('$username','$uploadimg')";
        $res=mysqli_query($con,$sql);

        if(move_uploaded_file($imtemp, $uploadimg)) {
            echo "File uploaded successfully.";
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "Invalid file type.";
    }
?>
