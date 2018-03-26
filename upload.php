<?php
$dir = "uploads/";
$file = $dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    }
    else {
        echo "File is not an image. <br>";
        $uploadOk = 0;
       	}
}
// Check if file already exists
if (file_exists($file)) {
    echo "Sorry, file already exists. <br>";
    $uploadOk = 0;
   
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large. <br>";
    $uploadOk = 0;
    }
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG"
&& $imageFileType != "GIF") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed <br>";
    $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded." . "<br />";
// if everything is ok, try to upload file
}
else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded. <br>";
        include 'database.php';
    }

else {
        echo "Sorry, there was an error uploading your file. <br>";
        }
        }
       echo '<a href="http://test-file-loader.000webhostapp.com/select.php">View files</a>';

?>
