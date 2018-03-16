<!DOCTYPE html> 
<?php
    include "connect.php";
    if(isset($_POST["submit"])){
        $search=$_POST['search'];
        $qry="SELECT * FROM `info` WHERE  `PropertyName`='$search';";
        $sql=mysqli_query($conn,$qry)or die("Cannt find : ");
        if(mysqli_num_rows($sql)>0) {
            while($row=mysqli_fetch_assoc($sql)) { 
                $imagepath = "uploads/".$row['photo'];
                $PropertyName = $row['PropertyName'];
                $Details =  $row['Details'];
                $Contact = $row['Contact'];

                echo "<br><br>";
                echo "<table>";
                echo "<tr>";
                echo "<td>";
                echo "<img src='$imagepath'>";
                echo "<br>";
                echo "<tr>";
                echo "<td>";
                echo "<b>Details:</b>";
                echo "<p>$Details</p>";
                echo "<br>";
                echo "<b>Contact:</b>";
                echo "<p>$Contact</p>";
                echo "<br>";
                echo "<br><br>";
                echo "</td>";
                echo "</tr>";
                echo "</td>";
                echo "</tr>";
                echo "</table>";
       
            } 
         } 
         else { 
            echo "<h2>Sorry,no property found</h2>";
         }	
    }
?>

<html>
<style>
body{
    background-image: url(Topic-129.png);
    background-size: 80em 80em 80em 80em;
}
</style>
    <head>
       <title>Property Search</title>
    </head>
    <body>
        <form action="" method="post">
           <h3>Search Keyword</h3>
           <input type="text" placeholder="enter search" name="search" id="search"  />
           <input type="submit" name="submit" value="search" />
        </form>
        <h4>Need to Sell<a href="detail.php"> Enter Property Details</a></h4>
    </body>
</html> 