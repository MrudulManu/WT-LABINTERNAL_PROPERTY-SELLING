<!DOCTYPE html>
<html>
<?php
   session_start();
   include "connect.php";
   function dispmsg($er)
   {
    echo "<div class='err'>$er</div><br>";
   }
if(isset($_POST['sub'])) {
      $email = $_POST['email'];
      $password = $_POST['pwd']; 
      $qry = "SELECT * from signup WHERE email='$email'";
      $result = mysqli_query($conn, $qry) or die ("Error inserting: ".$qry);
      if(mysqli_num_rows($result)>0) {
        $_SESSION['email'] = $email;
      	header('location:home.php');
      } else {
         dispmsg('Invalid Credentials!');
      }
     mysqli_close($conn);
 }
?>
<style>
  body{
    background: url(property-online.jpg) no-repeat center fixed;
      background-size:85em 85em 85em 85em ;
    text-align:right;
  }
  .err{
    color:white;
  }
  #o{
    padding :10px 18px;
    margin-right:5em;
  }
  .con{
    color:lightblue;
  }
  h1{
    padding:10px 50px;
    color:skyblue;
  }
  </style>
<body>
<form method="post" action="">
      <div class="con">
        <h1>Login</h1>
     <label for="email"><b>Email</b></label>
     <input type="text" placeholder="Enter Email" name="email"><br><br>
     <label for="pwd"><b>Password</b></label>
     <input type="password" placeholder="Enter Password" name="pwd" ><br><br>
     <button type="submit" name="sub" id="o">Go</button>
   </div>
 </form>
</body>
 </html>