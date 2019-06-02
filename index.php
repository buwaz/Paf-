<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM orders ORDER BY id DESC"); // using mysqli_query instead
?>

<html>
<head>	
	<title>Homeporder_quantity</title>
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
				<a class="nav-link" href="add.html">ADD items<span class="sr-only">(current)</span></a>
			</li>

			</ul>
		</div>
	</nav>

	<div class="container">
		<table width='80%' border=0>

		<tr bgcolor='#CCCCCC'>
			<td>order_name</td>
			<td>order_quantity</td>
			<td>order_date</td>
			<td>Update</td>
		</tr>
		<?php 
		//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
		while($res = mysqli_fetch_array($result)) { 		
			echo "<tr>";
			echo "<td>".$res['order_name']."</td>";
			echo "<td>".$res['order_quantity']."</td>";
			echo "<td>".$res['order_date']."</td>";	
			echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
		}
		?>
		</table>
	</div>
</body>
</html>
