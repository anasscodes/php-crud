<?php
// Including the database connection file
include_once("classes/Crud.php");

$crud = new Crud();

// Getting `id` from the URL
$id = $crud->escape_string($_GET['id']);

// Selecting data associated with this particular `id`
$result = $crud->getData("SELECT * FROM smartphones WHERE id=$id"); // Ensure table name matches your database

// Fetching data
foreach ($result as $res) {
	$name = $res['name'];
	$price = $res['price'];
	$description = $res['description'];
    $quantity = $res['quantity'];
    $picture = $res['picture'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
	<link rel="stylesheet" href="edit.css">
</head>

<body>
	<center><h2><a href="index.php">Products</a></h2></center>
	<br/><br/>
	
	<form name="form1" method="post" action="editaction.php" enctype="multipart/form-data">
		<table border="0">
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name" value="<?php echo $name; ?>" required></td>
			</tr>
			<tr> 
				<td>Price</td>
				<td><input type="number" name="price" value="<?php echo $price; ?>" min="1" required></td>
			</tr>
			<tr> 
				<td>Description</td>
				<td><input type="text" name="description" value="<?php echo $description; ?>" required></td>
			</tr>
			<tr> 
				<td>Quantity</td>
				<td><input type="number" name="quantity" value="<?php echo $quantity; ?>" min="1" required></td>
			</tr>
			<tr> 
				<td>Picture</td>
				<td><input type="file" name="picture" accept="image/*" required></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value="<?php echo $id; ?>"></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
