<?php
ob_start();
session_start();
require_once 'actions/dbconnect.php';

// it will never let you open index(login) page if session is set
if ( isset($_SESSION['user' ])!="" ) {
 header("Location: home.php");
 exit;
}

$error = false;

if( isset($_POST['btn-login']) ) {

  // prevent sql injections/ clear user invalid inputs
 $email = trim($_POST['email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);

 $pass = trim($_POST[ 'pass']);
 $pass = strip_tags($pass);
 $pass = htmlspecialchars($pass);
 // prevent sql injections / clear user invalid inputs 

 if(empty($email)){
  $error = true;
  $emailError = "Please enter your email address.";
 } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address.";
 }

 if (empty($pass)){
  $error = true;
  $passError = "Please enter your password." ;
 }

 // if there's no error, continue to login
 if (!$error) { 
  
  $password = hash( 'sha256', $pass); // password hashing

  $res=mysqli_query($conn, "SELECT userId, userName, userPass, userAdmin FROM users WHERE userEmail='$email'" );
  $row=mysqli_fetch_array($res, MYSQLI_ASSOC);
  $count = mysqli_num_rows($res); // if uname/pass is correct it returns must be 1 row 
  
 if( $count == 1 && $row['userPass' ]==$password ) {
    if($row['userAdmin'] ==1){
      $_SESSION['user'] = $row['userId'];
      header('location: adminhome.php');
    }else{
   $_SESSION['user'] = $row['userId'];
   header( "Location: home.php");
  }
  
 }

}
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<title>Travelmatic - Login</title>
<body>
  <div class="container text-info">
   <form method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete= "off">
      <h2>Sign In Below</h2>
          
            <?php
  if ( isset($errMSG) ) {
echo  $errMSG; ?>
              
               <?php
  }
  ?>
           
          
            <div class="form-group">
              <label>Email Address</label>
            <input class="form-control" type="email" name="email" placeholder= "Please enter your email address" value="<?php echo $email; ?>"  maxlength="40" />
            <span class="text-danger"><?php  echo $emailError; ?></span >
          </div>
          <div class="form-group">
            <label>Password</label>
            <input class="form-control" type="password" name="pass" placeholder ="Please enter your password" maxlength="15"  />
        
           <span  class="text-danger"><?php  echo $passError; ?></span>
            </div>
            <button class="btn btn-outline-info" type="submit" name= "btn-login">Sign In</button>
          </form>
            <a class="badge badge-pill badge-info" href="register.php">Not a memeber? Register here</a>
      
          
   </form>
   </div>
</body>
</html>
<?php ob_end_flush(); ?>