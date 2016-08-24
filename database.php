<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "art";
$table = "storage";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS ". $dbname;
if ($conn->query($sql) === TRUE){
}
else {
    die("Creating database failed: " . $conn->error);
}

// Change database to "art"
$conn->select_db($dbname);
$num_rows=$conn->query("SELECT COUNT(*)
FROM information_schema.tables
WHERE table_schema = '".$dbname."'
AND table_name = '".$table."';");
if(!$num_rows) {
	// sql to create table
	$sql = "CREATE TABLE ".$table." (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(30) NOT NULL,
	type VARCHAR(30) NOT NULL,
	size FLOAT NOT NULL
	)";

	if ($conn->query($sql)=== TRUE) {		}
	else{
	    die("_Creating table failed: " . $conn->error);
	}
}
$sql = "INSERT INTO ".$table." (name, type, size)
VALUES ('".$_FILES["fileToUpload"]["name"]."', '".$_FILES["fileToUpload"]["type"]."', ".$_FILES["fileToUpload"]["size"].");";

 if ($conn->query($sql) === TRUE) {
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>