<!DOCTYPE html>
<html>
<body>

<h2>login Form</h2>
<?php
 
  $emailerror=$passworderror="";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
 
  
  if(empty($_POST["email"]))
  {
	  $emailerror="email required";
  }
  else
  {
      $emailerror=$_POST["email"];
  }
 
  if(empty($_POST["password"]))
  {
	  $passworderror="password required";
  }
  else
  {
      $passworderror=$_POST["password"];
  }
}

?>


<form action="product.php" method ="post">

  
 <b>EMAIL: </b>
  <input type="email" name="email">
  <span type="color:blue"><?php echo $emailerror; ?><span/>
  <br><br>
 
  
  
   
 <b>PASSWORD: </b>
  <input type="password" name="password">
  <span type="color:blue"><?php echo $passworderror; ?><span/>
  <br><br>
  
   <br><br><br>
  <input type="submit" value="Submit">
  <br>

</form>

</body>
</html>
<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "UserDB";
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
		   
		  
		  $sql = "SELECT * FROM users WHERE email = '".$_POST["email"]."' and password = '".$_POST["password"]."'";
		  $result = $conn->query($sql);
		  if ($result->num_rows > 0)
		  {
			  $_SESSION["email"]=$_POST["email"];
			  header("location: home.php");
		  }
			  
		  else
			  echo "wrong email or password";
   }
	?>
</body>
</html>