<?php




$img_dir = "var/www/html/images/tmp";
$img = $img_dir . basename($_FILES["fileToUpload"]["name"]);
$img_type = strtolower(pathinfo($img, PATHINFO_EXTENSION));


// Check
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        // It is an image
        echo "file is not ok";
    } else {
        echo "ok";
    }
}
// If exist
if(file_exists($img)) {
    echo "Image already exist!";
    return;

}


// jpeg and png only
if($img_type == "jpg" || $img_type == "jpeg" || $img_type == "png") {
    // Upload file
   
    if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $img)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        
    }
    echo "hej";
} else {
    echo "sorry error";
    
}


?>