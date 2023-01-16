<?php
# Connect to the MySQL database
require_once 'partials/conn.php';

# Get the form data
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$mobile = $_POST['mobile'];
$id = $_POST['id'];

# Prepare the update query
$query = "UPDATE persons SET person_firstname = '$firstname', person_lastname = '$lastname', person_mobile = '$mobile' WHERE person_id = '$id'";

# Execute the query
mysqli_query($conn, $query);

# Head back to index
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
