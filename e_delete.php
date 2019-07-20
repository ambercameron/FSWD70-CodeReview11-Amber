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
   <title>Delete Event</title>
</head>
<body>

<h3>Do you really want to delete this event?</h3>
<form action ="actions/e_delete.php" method="post">

   <input type="hidden" name= "id" value="<?php echo $data['concerts_id'] ?>" />
   <button type="submit">Yes, delete it!</button>
   <a href="adminhome.php"><button type="button">No, go back!</button ></a>
</form>

</body>
</html>

<?php
}
?>