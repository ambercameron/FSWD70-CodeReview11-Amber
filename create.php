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


?>
<!DOCTYPE html>
<html>
<head>
   <title>Create New Item</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<div class="container text-info">


	<ul class="nav nav-tabs justify-content-between">
		<li class="nav-item">
  <a class="nav-link text-info" href="home.php">Home</a>
  		</li>
  		<li class="nav-item">
  <a class="nav-link active" href="create.php">New Entry</a>
 		</li>
  <div class="search-box">
    <input class="form-control mr-sm-2" type="text" placeholder="Filter" aria-label="Search"><div class="result"></div>
  </div>
</ul>


   <h2>Add Place</h2>
   <div class="form-group">
   <form  action="actions/c_create.php" method= "post">
       
               <label>Name</label >
               <input class ="form-control"  type="text" name="name"  placeholder="Name" />
         
               <label>Address</label>
               <input class ="form-control"  type="text" name= "address" placeholder="Address" />
           
               <label>Type</label>
               <input class ="form-control" type="text"  name="type" placeholder ="Type" />
           
               <label>Description</label>
               <input class ="form-control"  type="text"  name="description" placeholder ="Description" />
           
               <label>Link</label>
               <input class ="form-control" type="text"  name="url" placeholder ="URL" />
          
               <label>Image link</label>
               <input class ="form-control" type="text"  name="image" placeholder ="Image" />
               <br>
               <button type ="submit" class = "btn btn-outline-info">Add Place</button>
               <a href= "adminhome.php"><button  type="button" class = "btn btn-outline-info">Back</button></a>
   </form>
</div>

   <h2>Add Restaurant</h2>
   <div class="form-group">
   <form  action="actions/r_create.php" method= "post">
       
               <label>Name</label >
               <input class ="form-control"  type="text" name="name"  placeholder="Name" />
         
               <label>Address</label>
               <input class ="form-control"  type="text" name= "address" placeholder="Address" />

               <label>Phone Number</label>
               <input class ="form-control"  type="text" name= "phone" placeholder="Phone number" />
           
               <label>Cuisine</label>
               <input class ="form-control" type="text"  name="cuisine" placeholder ="Cuisine" />
           
               <label>Description</label>
               <input class ="form-control"  type="text"  name="description" placeholder ="Description" />
           
               <label>Link</label>
               <input class ="form-control" type="text"  name="url" placeholder ="URL" />
          
               <label>Image link</label>
               <input class ="form-control" type="text"  name="image" placeholder ="Image" />
               <br>
               <button type ="submit" class = "btn btn-outline-info">Add Restaurant</button>
               <a href= "adminhome.php"><button  type="button" class = "btn btn-outline-info">Back</button></a>
   </form>
</div>

   <h2>Add Event</h2>
   <div class="form-group">
   <form  action="actions/e_create.php" method= "post">
       
               <label>Name</label >
               <input class ="form-control"  type="text" name="name"  placeholder="Name" />
         
               <label>Address</label>
               <input class ="form-control"  type="text" name= "address" placeholder="Address" />

               <label>Date & Time</label>
               <input class ="form-control"  type="datetime-local" name= "date" placeholder="" />
           
               <label>Price</label>
               <input class ="form-control" type="text"  name="price" placeholder ="00.00" />
           
               <label>Description</label>
               <input class ="form-control"  type="text"  name="description" placeholder ="Description" />
           
               <label>Link</label>
               <input class ="form-control" type="text"  name="url" placeholder ="URL" />
          
               <label>Image link</label>
               <input class ="form-control" type="text"  name="image" placeholder ="Image" />
               <br>
               <button type ="submit" class = "btn btn-outline-info">Add Event</button>
               <a href= "adminhome.php"><button  type="button" class = "btn btn-outline-info">Back</button></a>
   </form>
</div>



</div>
</body>
</html>