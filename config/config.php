<!-- database connection -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "authentication";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo '<div class="success">Database connection successful!</div>';
?>