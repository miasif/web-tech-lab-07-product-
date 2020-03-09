<!DOCTYPE HTML>  
<html>
<head>
</head>
<body>  

<?php
class Product
 {
  
  public $product_id;
  public $product_name;
  public $description;
  public $quantity;
  
  
   function __construct($product_id,$product_name,$description,$quantity) 
   {
	   
    $this->product_id = $product_id;
	
	$this->product_name = $product_name;
	
	$this->description = $description;
	
    $this->quantity = $quantity;
	
	
	
   }
  

  
  function set_product_id($product_id) {
    $this->product_id = $product_id;
  }
  
  function get_product_id() 
  {
    return $this->product_id;
  }
   function set_product_name($product_name)
   {
    $this->product_name = $product_name;
  }
  function get_product_name()
  {
    return $this->product_name;
  }
  function set_description($description)
  {
    $this->description = $description;
  }
  function get_description()
  {
    return $this->description;
  }
  function set_quantity($quantity)
  {
    $this->quantity = $quantity;
  }
  function get_quantity() 
  {
    return $this->quantity;
  }
 
}
?>


<?php
$idErr = $nameErr = $desErr = $quanErr ="";
$product_id = $product_name= $description = $quantity="";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  if (empty($_POST["product_id"]))
  {
    $idErr = "Id is required";
  }
  else
  {
    $product_id = $_POST["product_id"];
  }
  
  if (empty($_POST["product_name"]))
  {
    $nameErr = "name is required";
  }
  else
  {
    $product_name = $_POST["product_name"];
  }


  if (empty($_POST["description"]))
  {
    $desErr = "Description is required";
  }
  else
  {
    $description = $_POST["description"];
  }

  if (empty($_POST["quantity"]))
  {
    $quanErr = "qantity is required";
  }
  else 
  {
    $quantity = $_POST["quantity"];
  }
 
}


?>

<h2>My Form </h2>
<p><span class="error">*Please fill up the form</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  
  PRODUCT_ID: <input type="number" name="product_id">
  <span class="error">* <?php echo $idErr;?></span>
  <br><br>
  Name: <input type="text" name="product_name">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  DESCRIPTION: <input type="text" name="description">
  <span class="error">* <?php echo $desErr;?></span>
  <br><br>
  Quantity: <input type="text" name="quantity">
  <span class="error">* <?php echo $quanErr;?></span>
  <br><br>
 


  
  
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
if ($_SERVER["REQUEST_METHOD"]=="POST"){
echo "<h2>"." Details Information :</h2>";

$product = new Product($product_id,$product_name,$description,$quantity);

echo $product->get_product_id();

echo "<br>";

echo $product->get_product_name();

echo "<br>";

echo $product->get_description();

echo "<br>";

echo $product->get_quantity();

echo "<br>";
}


?>

<?php

$file = fopen("User Info.txt", "w") or die("Unable to open file!");

$data = $product->get_product_id()."\n";


fwrite($file, $data);
 
 $data = $product->get_product_name()."\n";

fwrite($file, $data);

$data = $product->get_description()."\n";

fwrite($file, $data);

$data = $product->get_quantity()."\n";


fwrite($file, $data);

fclose($file);



?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO products (product_id,product_name, description,quantity)
	VALUES ('".$product->get_product_id()."','".$product->get_product_name()."','".$product->get_description()."', '". $product->get_quantity()."')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

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
      
		   
		  
		  $sql = "SELECT * FROM users WHERE product_id='".$get_product_id()."'";
		  $result = $conn->query($sql);
		  if ($result->num_rows > 0)
		  {
			// $_SESSION["email"]=$_POST["email"];
			$product->get_product_id();
			  header("location: home.php");
		  }
			  
		  else
			  echo "wrong email or password";
   }
	?>




</body>
</html>


