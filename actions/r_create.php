<?php 

require_once 'dbconnect.php';

if ($_POST) {
   $name = $_POST['name'];
   $address = $_POST['address'];
   $phone = $_POST['phone'];
   $cuisine = $_POST[ 'cuisine'];
   $description = $_POST[ 'description'];
   $url = $_POST['url'];
   $image = $_POST['image'];

   $sql = "INSERT INTO restaurant (name, address, phone, cuisine, description, url, image) VALUES ('$name', '$address', '$phone', '$cuisine', '$description', '$url', '$image')";
    if($conn->query($sql) === TRUE) {
       echo "<p>New Record Successfully Created</p>" ;
       echo "<a href='../create.php'><button type='button'>Back</button></a>";
        echo "<a href='../adminhome.php'><button type='button'>Home</button></a>";
   } else  {
       echo "Error " . $sql . ' ' . $conn->connect_error;
   }

   $conn->close();
}

?>