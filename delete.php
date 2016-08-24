<?php
$path = "uploads/";
$file_name = preg_replace("([^\w\s\d\-_~,;:\[\]\(\).]|[\.]{2,})", '', $_GET['file_name']); // simple file name validation
$file_name = filter_var($file_name, FILTER_SANITIZE_URL); // Remove (more) invalid characters
$full_path = $path.$file_name;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "art";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->select_db($dbname);
// sql to delete a record
$sql = "DELETE FROM storage WHERE name='". $file_name."';";   // id ???

if ($conn->query($sql) === TRUE) {
    unlink($full_path);
    echo "File deleted successfully". "<br>";
} else {
    echo "File deleting record: " . $conn->error;
}

$conn->close();
echo '<a href="http://test1.ru/select.php">View files</a>'. "<br>";
echo '<a href="http://test1.ru/index.html">Go to upload</a>'. "<br>";
?>