<html>
<head>
	<title>Add Data</title>
	<link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$order_name = mysqli_real_escape_string($mysqli, $_POST['order_name']);
	$order_quantity = mysqli_real_escape_string($mysqli, $_POST['order_quantity']);
	$order_date = mysqli_real_escape_string($mysqli, $_POST['order_date']);
		
	// checking empty fields
	if(empty($order_name) || empty($order_quantity) || empty($order_date)) {
				
		if(empty($order_name)) {
			echo "<font color='red'>order_name field is empty.</font><br/>";
		}
		
		if(empty($order_quantity)) {
			echo "<font color='red'>order_quantity field is empty.</font><br/>";
		}
		
		if(empty($order_date)) {
			echo "<font color='red'>order_date field is empty.</font><br/>";
		}
		
		//link to the previous porder_quantity
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO orders(order_name,order_quantity,order_date) VALUES('$order_name','$order_quantity','$order_date')");
		
		//display success messorder_quantity
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
