<?php
echo '<table border="1">';
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
// Change database to "art"
$conn->select_db($dbname);

$sql = "SELECT id, name, type, size FROM storage";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "FILES ON SERVER". "<br>";
    echo '<tr>';
	echo '<td>' ." Id ". '</td>';
	echo '<td>' ." Name ". '</td>';
	echo '<td>' ." Type ". '</td>';
	echo '<td>' ." Size ". '</td>';
	echo '<td>' ." Download file ". '</td>';
	echo '<td>' ." Delete file ". '</td>';
	echo '</tr>';
	// output data of each row
    while($row = $result->fetch_assoc()) {
       // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["type"]. $row["size"]. "<br>";

echo '<tr>';
echo '<td>' .$row["id"]. '</td>';
echo '<td>' .$row["name"]. '</td>';
echo '<td>' .$row["type"]. '</td>';
echo '<td>' .$row["size"]. " bytes". '</td>';
echo '<td>' .'<a href="http://test1.ru/download.php?download_file='.$row["name"].'">Download file</a>'. '</td>';
echo '<td>' .'<a href="http://test1.ru/delete.php?file_name='.$row["name"].'">Delete file</a>'. '</td>';
echo '</tr>';
}
	}
else {
    echo "0 results";
}
$conn->close();
echo '</tr>';
echo '</table>';
?>