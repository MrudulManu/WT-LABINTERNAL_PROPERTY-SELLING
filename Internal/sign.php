<?php
    include "connect.php";
    session_start();
    if(isset($_POST['sub'])) {
      $username = $_POST['username'];
      $email = $_POST['Email'];
      $password = $_POST['Pwd'];      
      $qry = "INSERT INTO `signup` ( `username`, `email`, `pwd`) VALUES ('$username', '$email', '$password');";
      mysqli_query($conn, $qry) or die ("Error inserting: ".$qry);
      header('location:login.php');
    }
?>
<!DOCTYPE html>
<html>
  <style>
    .con{
        font-size=150%;      
    }
    html{
      background:url(download.jpeg) no-repeat center fixed;
      -webkit-background-size:cover;
      -moz-background-size:cover;
      -o-background-size:cover;
      background-size:cover;
    }
    body{
  
      background-repeat: none;
      font-size:1.5em;
      text-align:right;
    }
    h1{
      color:Orange;
    }
    #p{
      font-size=50px;  
    }
    #s{
      padding:10px 50px;
    }
    #ss{
      padding :10px 20px;
      margin-right:3em
    }
    #x{
      color:black;
    }
      </style>
  <body>
    <div class="con">
      <h1 id="s">Sign Up</h1>
        <p id="p">Please fill this form to create an account.</p>
        <form name="Customer" onsubmit"return validateform()" method="post">
        <b class="x">UserName</b>
        <input type="text" placeholder="username" name="username" ><br><br>
        <b class="x">Email</b>
        <input type="text" placeholder="Enter Email" name="Email"><br><br>
        <b class="x">Password</b>
        <input type="password" placeholder="Enter Password" name="Pwd"><br><br>
        <button type="submit" name="sub" id="ss">Create</button>
    </div>
    </form>
    </div>
  </body>
</html>