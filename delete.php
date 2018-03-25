<?php
$path = "uploads/";
$file_name = preg_replace("([^\w\s\d\-_~,;:\[\]\(\).]|[\.]{2,})", '', $_GET['file_name']); // simple file name validation
$file_name = filter_var($file_name, FILTER_SANITIZE_URL); // Remove (more) invalid characters
$full_path = $path.$file_name;

$servername = "localhost";
$username = "id5187012_root";
$password = "VqeBizAmeQ";
$dbname = "id5187012_art";
$table = "storage";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->select_db($dbname);
// sql to delete a record
$sql = "DELETE FROM storage WHERE name='". $file_name."';";

if ($conn->query($sql) === TRUE) {
	// delete file from folder
    unlink($full_path);
    echo "File deleted successfully <br>";
} else {
    echo "File deleting record: " . $conn->error;
}

$conn->close();
echo '<a href="http://test-file-loader.000webhostapp.com/select.php">View files</a> <br>';
echo '<a href="http://test-file-loader.000webhostapp.com/index.html">Go to upload</a> <br>';
?>