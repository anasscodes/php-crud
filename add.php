<?php
include_once("classes/Crud.php");
include_once("classes/Validation.php");

$crud = new Crud();
$validation = new Validation();

if (isset($_POST['Submit'])) {
	// Get input data and escape strings
	$id = $crud->escape_string($_POST['id']);
	$name = $crud->escape_string($_POST['name']);
	$price = $crud->escape_string($_POST['price']);
	$description = $crud->escape_string($_POST['description']);
	$quantity = $crud->escape_string($_POST['quantity']);

	// Handle picture upload
	if (!empty($_FILES['picture']['name'])) {
		$picture = basename($_FILES['picture']['name']);
		$target_file = "pictures/" . $picture;
		move_uploaded_file($_FILES['picture']['tmp_name'], $target_file);
	} else {
		$picture = "default.png"; // Fallback image
	}

	// Validate required fields
	$msg = $validation->check_empty($_POST, array('name', 'price', 'quantity'));
	
	// Additional validation for numeric price and quantity
	$check_price = is_numeric($price) && $price > 0;
	$check_quantity = is_numeric($quantity) && $quantity > 0;
	
	if ($msg != null) {
		echo $msg;        
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} elseif (!$check_price) {
		echo 'Please provide a valid numeric value greater than 0 for the price.';
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} elseif (!$check_quantity) {
		echo 'Please provide a valid numeric value greater than 0 for the quantity.';
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// Insert data into the database
		$result = $crud->execute("INSERT INTO smartphones(id, name, price, description, quantity, picture) 
                                  VALUES('$id', '$name', '$price', '$description', '$quantity', '$picture')");
		
		// Display success message and link to view the result
		echo "<font color='green'>Data added successfully.</font>";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
