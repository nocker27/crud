<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("connection.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM products WHERE login_id=".$_SESSION['id']." ORDER BY id ASC");
?>

<html>
<head>
	<title>Homepage</title>
</head>

<body>
	<a href="index.php">Home</a> | <a href="add.html">Add New Data</a> | <a href="logout.php">Logout</a>
	<br/><br/>
	<h3>Here is you're products</h3>
	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<td>Product</td>
			<td>Quantity</td>
			<td>Price (euro)</td>
			<td>Picture</td>
			<td>Update</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
			echo "<td>".$res['product']."</td>";
			echo "<td>".$res['qty']."</td>";
			echo "<td>".$res['price']."</td>";
			?><td><img src="<?php echo $res['pic']; ?>" width="175" height="200" /></td> <?php
			echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
		}
		?>
	</table>	
</body>
</html>