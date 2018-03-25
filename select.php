<?php
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
// Change database to "art"
$conn->select_db($dbname);

$sql = "SELECT * FROM storage";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$headers = array('Id', 'Name', 'Type', 'Size(bytes)', 'Dowload File', 'Delete file');
    echo "FILES ON SERVER". "<br>";
    echo '<table border="1">';
    echo '<tr>';
    foreach($headers as $header){
    	echo '<td>' .$header. '</td>';
    }
	echo '</tr>';
	// output data of each row
    while($row = $result->fetch_assoc()) {

		echo '<tr>';
		foreach($row as $value){
			echo '<td>' .$value. '</td>';
		}
		echo '<td>' .'<a href="http://test-file-loader.000webhostapp.com/download.php?download_file='.$row["name"].'">Download file</a>'. '</td>';
		echo '<td>' .'<a href="http://test-file-loader.000webhostapp.com/delete.php?file_name='.$row["name"].'">Delete file</a>'. '</td>';
		echo '</tr>';
	}
}
else {
    echo "0 results";
}
$conn->close();
echo '</tr>';
echo '</table>';
echo '<a href="http://test-file-loader.000webhostapp.com/index.html">Go to upload</a> <br>';
?>