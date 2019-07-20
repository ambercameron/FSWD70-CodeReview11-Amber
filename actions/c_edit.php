<?php 

require_once 'dbconnect.php';

if ($_POST) {
   $name = $_POST['name'];
   $address = $_POST['address'];
   $type = $_POST[ 'type'];
   $description = $_POST[ 'description'];
   $url = $_POST[ 'url'];
   $image = $_POST[ 'image'];

   $id = $_POST['id'];

   $sql = "UPDATE places SET name = '$name', address = '$address', type = '$type', description = '$description', url = '$url', image = '$image' WHERE places_id = {$id}" ;
   if($conn->query($sql) === TRUE) {
       echo  "<p>Successfully Updated</p>";
       echo "<a href='../c_edit.php?id=" .$id."'><button type='button'>Back</button></a>";
       echo  "<a href='../adminhome.php'><button type='button'>Home</button></a>";
   } else {
        echo "Error while updating record : ". $conn->error;
   }

   $conn->close();

}

?>