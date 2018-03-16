<?php 
     include "connect.php";
     session_start();

    if(isset($_POST['submit'])) {
        echo "Submitted Successfully!!!";
       $PropertyName = $_POST['PropertyName'];
       $Details = $_POST['Details'];    
       $Contact = $_POST['Contact'];
       
       $uploadOk = 0;
       if(isset($_FILES['photo'])){
           echo "hey!!!";
           $errors= array();
           $file_name = $_FILES['photo']['name'];
           $file_size = $_FILES['photo']['size'];
           $file_tmp = $_FILES['photo']['tmp_name'];
           $file_type = $_FILES['photo']['type'];
           $tmp = explode('.', $file_name);
           $file_ext=strtolower(end($tmp));
        
           $expensions= array("jpeg","jpg","png", "gif");
           if(in_array($file_ext,$expensions)=== false){
               array_push($errors, "extension not allowed, please choose a JPEG or PNG file.");
           }
        
           if($file_size > 50000000) {
              array_push($errors, "File size must be excately 50 KB.");
           }
        
           if(empty($errors)==true) {
               move_uploaded_file($file_tmp,"uploads/".$file_name) or die("error moving file");
               $uploadOk = 1;
            }else{
              print_r($errors);
            }
     
            if ($uploadOk == 1) {
                $qry = "INSERT INTO `info` (`PropertyName`, `Details`, `Contact`, `Photo`) VALUES ('$PropertyName', '$Details', '$Contact', '$Photo');";
                mysqli_query($conn,$qry)  or die("connection failed");
            }
        }
    }
?>

<html>
<style>
body{
    background-image: url(resale-market.jpg);
}
</style>
   <head>
      <title>Description</title>
   </head>
   <body>
   <div>
       <h2> Property Details</h2>
       <form action="" method="post" enctype="multipart/form-data">
          Property Name:
          <input type="text" placeholder="enter name" name="PropertyName"/>
          <br><br>
          Property Details: 
          <textarea name="Details" placeholder="Enter Details" ></textarea>
          <br><br>
          Contact Info: 
          <textarea name="Contact" placeholder="Contact Details"></textarea>
          <br><br>
          Photo:
          <input type="file" name="photo" id="photo"/>
          <br><br>
          <input type="submit" name="submit" id="submit"/>
       </form> 
       </div>
       <h4>Need to Buy anything!!!!<a href="search.php"> Search</a></h4>
   </body>
</html>