<?php 

require_once 'dbconnect.php';

if ($_POST) {
   $name = $_POST['name'];
   $address = $_POST['address'];
   $phone = $_POST[ 'phone'];
   $cuisine = $_POST[ 'cuisine'];
   $description = $_POST[ 'description'];
   $url = $_POST[ 'url'];
   $image = $_POST[ 'image'];

   $id = $_POST['id'];

  $sql = "UPDATE restaurant SET name = '$name', address = '$address', phone = '$phone', cuisine = '$cuisine', description = '$description', url = '$url', image = '$image' WHERE restaurant_id = {$id}" ;
   if($conn->query($sql) === TRUE) {
       echo  "<p>Successfully Updated</p>";
       echo "<a href='../r_edit.php?id=" .$id."'><button type='button'>Back</button></a>";
       echo  "<a href='../adminhome.php'><button type='button'>Home</button></a>";
   } else {
        echo "Error while updating record : ". $conn->error;
   }

   $conn->close();

}

?>