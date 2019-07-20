<?php 

require_once 'dbconnect.php';

if ($_POST) {
   $id = $_POST['id'];

  $sql = "DELETE FROM restaurant WHERE restaurant_id = {$id}";
    if($conn->query($sql) === TRUE) {
       echo "<p>Successfully deleted!!</p>" ;
       echo "<a href='../adminhome.php'><button type='button'>Back</button></a>";
   } else {
       echo "Error updating record : " . $conn->error;
   }

   $conn->close();
}

?>