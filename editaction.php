<?php
// Including the database connection file
include_once("classes/Crud.php");

$crud = new Crud();

if (isset($_POST['update'])) {
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
		// Use the existing picture if no new file is uploaded
		$existingData = $crud->getData("SELECT picture FROM smartphones WHERE id=$id");
		$picture = $existingData[0]['picture'];
	}

	// Updating data in the database
	$result = $crud->execute("UPDATE smartphones SET name='$name', price='$price', description='$description', quantity='$quantity', picture='$picture' WHERE id=$id");

	// Redirecting to the homepage
	header("Location: index.php");
}
?>
