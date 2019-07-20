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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
<div class="container">
	<ul class="nav nav-tabs justify-content-between">
		<li class="nav-item">
  <a class="nav-link active" href="home.php">Home</a>
  		</li>
  		<li class="nav-item">
  <a class="nav-link text-info" href="create.php">New Entry</a>
 		</li>
  <div class="search-box">
    <input class="form-control mr-sm-2" type="text" placeholder="Filter" aria-label="Search"><div class="result"></div>
  </div>
</ul>
<br>

           <p>Hi <?php echo $row['userEmail']; ?>
           <a class="text-info" href="logout.php?logout">Sign Out</a></p>
<div class="alert alert-info">
           <h4>Things to Do</h4>
</div>
           	<div class="row">
  <?php $sql = "SELECT * FROM places";
           $result = $conn->query($sql);

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                   echo "<div class='col'>
                   <div class='card mb-3' style='width: 18rem;'>
                   <img class='card-img-top' style='height: 15rem;' src='".$row['image']."''>
                   <div class='card-body'><h5 class='card-title'>".$row['name']."</h5><p class='card-text'>".$row['description']."</p></div>
                   <ul class='list-group list-group-flush'>
                   <li class='list-group-item'>".$row['type']."</li>
                   <li class='list-group-item'><a class='text-info' href=".$row['url'].">".$row['url']."</a></li>
                   <li class='list-group-item'>".$row['address']."</li></ul><div class='card-body'>
                    <a href='c_edit.php?id=" .$row['places_id']."' class='card-link'>Edit</a>
                    <a href='c_delete.php?id=" .$row['places_id']."' class='card-link'>Delete</a></div></div></div>
                   ";
        }
           } else  {
               echo  "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
           }
            ?>
        </div>
        <div class="alert alert-info">
				<h4>Restaurants</h4>
			</div>
        <div class="row">
  <?php $sql = "SELECT * FROM restaurant";
           $result = $conn->query($sql);

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                   echo "<div class='col'>
                   <div class='card mb-3' style='width: 18rem;'>
                   <img class='card-img-top' style='height: 15rem;' src='".$row['image']."''>
                   <div class='card-body'><h5 class='card-title'>".$row['name']."</h5><p class='card-text'>".$row['description']."</p></div>
                   <ul class='list-group list-group-flush'>
                   <li class='list-group-item'>".$row['cuisine']."</li>
                   <li class='list-group-item'><a class='text-info' href=".$row['url'].">".$row['url']."</a></li>
                   <li class='list-group-item'>".$row['address']."</li>
                   <li class='list-group-item'>".$row['phone']."</li></ul><div class='card-body'>
                    <a href='r_edit.php?id=" .$row['restaurant_id']."' class='card-link'>Edit</a>
                    <a href='r_delete.php?id=" .$row['restaurant_id']."' class='card-link'>Delete</a></div></div></div>
                   ";
        }
           } else  {
               echo  "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
           }
            ?>
        </div>
        <div class="alert alert-info">
						<h4>Events & Concerts</h4>
					</div>
        <div class="row">
  <?php $sql = "SELECT * FROM concerts";
           $result = $conn->query($sql);

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                   echo "<div class='col'>
                   <div class='card mb-3' style='width: 18rem;'>
                   <img class='card-img-top' style='height: 15rem;' src='".$row['image']."''>
                   <div class='card-body'><h5 class='card-title'>".$row['name']."</h5><p class='card-text'>".$row['description']."</p></div>
                   <ul class='list-group list-group-flush'>
                   <li class='list-group-item'>".$row['date']."</li>
                   <li class='list-group-item'>£".$row['price']."</li>
                   <li class='list-group-item'><a class='text-info' href=".$row['url'].">".$row['url']."</a></li>
                   <li class='list-group-item'>".$row['address']."</li></ul><div class='card-body'>
                    <a href='e_edit.php?id=" .$row['concerts_id']."' class='card-link'>Edit</a>
                    <a href='e_delete.php?id=" .$row['concerts_id']."' class='card-link'>Delete</a></div></div></div>
                   ";
        }
           } else  {
               echo  "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
           }
            ?>
        </div>
    </div>
</body>
</html>