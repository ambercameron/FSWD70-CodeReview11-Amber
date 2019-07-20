<?php 

require_once 'dbconnect.php';

if ($_POST) {
   $name = $_POST['name'];
   $address = $_POST['address'];
   $date = $_POST['date'];
   $price = $_POST[ 'price'];
   $description = $_POST[ 'description'];
   $url = $_POST['url'];
   $image = $_POST['image'];

   $sql = "INSERT INTO concerts (name, address, date, price, description, url, image) VALUES ('$name', '$address', '$date', '$price', '$description', '$url', '$image')";
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