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
//if user is admin this will redirect to admin page
 elseif($row['userAdmin'] == 1) {
 	header("Location: adminhome.php");
 exit;
}

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <style>
      #map {
        height: 100%;
      }
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
<title>Travelmatic - Welcome</title>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("actions/search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>
</head>
<body>
	   <div class="container">
	<ul class="nav nav-tabs justify-content-between">
		<li class="nav-item">
  <a class="nav-link text-info" href="home.php">Home</a>
  		</li>
  		<li class="nav-item">
  <a class="nav-link text-info" href="event.php">Events</a>
 		</li>
  		<li class="nav-item">
  <a class="nav-link active" href="restaurant.php">Restaurants</a>
  		</li>
  <div class="search-box">
    <input class="form-control mr-sm-2" type="text" placeholder="Filter" aria-label="Search"><div class="result"></div>
  </div>
</ul>

           Hi <?php echo $row['userEmail']; ?>
            
           <a class="text-info" href="logout.php?logout">Sign Out</a>
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
                   <li class='list-group-item'>".$row['phone']."</li></ul></div></div>
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
<?php ob_end_flush(); ?>