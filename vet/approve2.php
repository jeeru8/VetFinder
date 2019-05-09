<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ovcp";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_REQUEST['id'];

$sql = "UPDATE consult SET approve='0' WHERE id='$id'";

if (mysqli_query($conn, $sql)) {
    echo "Record Declined successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

<a href="dashboard.php">GO BACK</a>