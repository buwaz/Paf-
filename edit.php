<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	
	$order_name = mysqli_real_escape_string($mysqli, $_POST['order_name']);
	$order_quantity = mysqli_real_escape_string($mysqli, $_POST['order_quantity']);
	$order_date = mysqli_real_escape_string($mysqli, $_POST['order_date']);	
	
	// checking empty fields
	if(empty($order_name) || empty($order_quantity) || empty($order_date)) {	
			
		if(empty($order_name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($order_quantity)) {
			echo "<font color='red'>order_quantity field is empty.</font><br/>";
		}
		
		if(empty($order_date)) {
			echo "<font color='red'>order_date field is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE orders SET order_name='$order_name',order_quantity='$order_quantity',order_date='$order_date' WHERE id=$id");
		
		//redirectig to the display porder_quantity. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM orders WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$order_name = $res['order_name'];
	$order_quantity = $res['order_quantity'];
	$order_date = $res['order_date'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
	<link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">

		<style>
		.container{

			margin-top: 20px;

		}
	</style>
</head>

<body>


	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="#">Order Management</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarColor02">
			<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
			</li>

			</ul>
		</div>
	</nav>

	<div class="container">
	
		<form name="form1" method="post" action="edit.php">

  				<div class="form-group">
					<label>order_name</label>
					<input type="text" class=form-control name="order_name" value="<?php echo $order_name;?>">
				</div>
  				<div class="form-group">
					<label>order_quantity</label>
					<input type="text" class=form-control name="order_quantity" value="<?php echo $order_quantity;?>">
				</div>
  				<div class="form-group">
					<label>order_date</label>
					<input type="text" class=form-control name="order_date" value="<?php echo $order_date;?>">
				</div>
				<div class="button">
					<input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
					<center><input type="submit" class="btn btn-primary" name="update" value="Update"></center>
				</div>

		</form>

	</div>
</body>
</html>
