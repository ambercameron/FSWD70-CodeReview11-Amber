<?php 
ob_start();
session_start();
require_once 'actions/dbconnect.php';
// select logged-in users details 
$res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
$row=mysqli_fetch_array($res, MYSQLI_ASSOC);
// if session is not set this will redirect to login page
if( !isset($_SESSION['user' ]) ) {
 header("Location: index.php");}
// is user is not admin then this will redirect to home page
 elseif($row['userAdmin'] != 1) {
  header("Location: home.php");
 exit;
}

if ($_GET['id']) {
   $id = $_GET['id'];

   $sql = "SELECT * FROM concerts WHERE concerts_id = {$id}" ;
   $result = $conn->query($sql);

   $data = $result->fetch_assoc();

   $conn->close();

?>

<!DOCTYPE html>
<html>
<head>
   <title>Edit Event</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>

<div class="container text-info">
   <h2>Edit Place</h2>
    <div class="form-group">
   <form action="actions/e_edit.php"  method="post">
               <label>Name</label>
               <input class ="form-control" type="text"  name="name" placeholder ="Name" value="<?php echo $data['name'] ?>"  />
           
               <label>Address</label>
               <input class ="form-control" type= "text" name="address"  placeholder="Address" value ="<?php echo $data['address'] ?>" />
           
               <label>Date</label>
               <input class ="form-control" type ="datetime-local" name= "type" placeholder= "<?php echo $data['date'] ?>" value= "<?php echo $data['date'] ?>" />

               <label>Price</label>
               <input class ="form-control" type= "price" name="address"  placeholder="Price" value ="<?php echo $data['price'] ?>" />
           
               <label>Description</label>
               <input class ="form-control" type ="text" name= "description" placeholder= "Description" value= "<?php echo $data['description'] ?>" />
           
               <label>Link</label>
               <input class ="form-control" type ="text" name= "url" placeholder= "Link" value= "<?php echo $data['url'] ?>" />

               <label>Image Link</label>
               <input class ="form-control" type ="text" name= "image" placeholder= "Image URL" value= "<?php echo $data['image'] ?>" />
          
               <input type= "hidden" name= "id" value= "<?php echo $data['concerts_id']?>" />
               <button class = "btn btn-outline-info"class = "btn btn-outline-info" type= "submit">Save Changes</button >
               <a  href= "adminhome.php"><button class = "btn btn-outline-info" type="button" >Back</button></a>
       
   </form>
</div>
</div>
</body>
</html>

<?php 
}
?>