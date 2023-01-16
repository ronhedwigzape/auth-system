<?php
# Connect to the MySQL database
require_once 'partials/conn.php';

# Get ID from form data
$id = $_GET['id'];

# Prepare the delete query
$query = "DELETE FROM persons WHERE person_id = '$id' ";

# Execute the query
mysqli_query($conn, $query);

# Head back to current page
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
