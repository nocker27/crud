<?php session_start(); ?>
<html>
<head>
	<title>Homepage</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="header">
		All the product on sale!
	</div>
	<?php
	if(isset($_SESSION['valid'])) {			
		include("connection.php");					
		$result = mysqli_query($mysqli, "SELECT * FROM login");
	?>
				
		Welcome <?php echo $_SESSION['name'] ?> ! <a href='logout.php'>Logout</a><br/>
		<br/>
		<a href='view.php'>View and Add Products</a>
		<br/><br/>
	<?php	
	} else {
		echo "Log in to put something up for sale.<br/><br/>";
		echo "<a href='login.php'>Login</a> | <a href='register.php'>Register</a>";
	}
	?>
	<div id="footer">
	<?php
	//including the database connection file
	include_once("connection.php");

	//fetching data in products where login_id fetches the seller in login table in database
	$result = mysqli_query($mysqli, "SELECT * FROM products INNER JOIN login ON products.login_id = login.id");
	?>
	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<td>Product</td>
			<td>Quantity</td>
			<td>Price (euro)</td>
			<td>Picture</td>
			<td>Seller</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
			echo "<td>".$res['product']."</td>";
			echo "<td>".$res['qty']."</td>";
			echo "<td>".$res['price']."</td>";
			?><td><img src="<?php echo $res['pic']; ?>" width="175" height="200" /></td> <?php
			echo "<td>".$res['name']."</td>";

		}	
		?>
	</table>

	</div>
</body>
</html>
