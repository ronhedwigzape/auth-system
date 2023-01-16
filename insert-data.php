<?php
# Connect to the MySQL database
require_once 'partials/conn.php';

# Get form data
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$mobile = $_POST['mobile'];

# Prepare the insert query
$sql = "INSERT INTO persons (person_firstname, person_lastname, person_mobile) VALUES('$firstname','$lastname','$mobile')";

# Execute query
mysqli_query($conn, $sql);

# Head back to current page
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
