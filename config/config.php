<!-- database connection -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "authentication";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: $conn->connect_error");
}
echo '<div class="success">Database connection successful!</div>';
?>