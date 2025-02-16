<?php
// Including the database connection file
include_once("classes/Crud.php");

$crud = new Crud();

// Fetching data in descending order (latest entry first)
$query = "SELECT * FROM smartphones ORDER BY id DESC";  // Ensure the table name is correct
$result = $crud->getData($query);  // Fetch data using the getData method from the Crud class
?>

<html>
<head>    
    <title>Homepage</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <div class="link">
        <center><h3><a href="add.html">Add New Data</a></center></h3><br/><br/>
    </div>

    <table width='80%' border='1'> <!-- Fixed the border to 1 for visibility -->
        <tr bgcolor='#CCCCCC'>
            <td>ID</td>
            <td>Name</td>
            <td>Price</td>
            <td>Description</td>
            <td>Quantity</td>
            <td>Picture</td>
            <td>Actions</td> <!-- Changed 'Update' to 'Actions' for clarity -->
        </tr>
        <?php 
        // Displaying the fetched data
        if (count($result) > 0) {
            foreach ($result as $key => $res) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($res['id']) . "</td>";  // Display ID with htmlspecialchars for security
                echo "<td>" . htmlspecialchars($res['name']) . "</td>";  // Display Name with htmlspecialchars for security
                echo "<td>" . htmlspecialchars($res['price']) . "</td>";  // Display Price with htmlspecialchars for security
                echo "<td>" . htmlspecialchars($res['description']) . "</td>";  // Display Description with htmlspecialchars for security
                echo "<td>" . htmlspecialchars($res['quantity']) . "</td>";  // Display Quantity with htmlspecialchars for security
                echo "<td><img src='pictures/" . htmlspecialchars($res['picture']) . "' alt='Product Image' style='max-width: 100px; max-height: 100px;'></td>";  // Display Picture with htmlspecialchars for security
                echo "<td><a href=\"edit.php?id=" . urlencode($res['id']) . "\">Edit</a> | <a href=\"delete.php?id=" . urlencode($res['id']) . "\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No data found</td></tr>";  // Display message if no data is found
        }
        ?>
    </table>
</body>
</html>
