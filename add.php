<?php
if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $tempName = $_FILES['image']['tmp_name'];
    $fileName = $_FILES['image']['name'];

    // Move the uploaded file to the desired directory
    move_uploaded_file($tempName, "uploads/{$fileName}");

    // Insert the filename into the database (you may need to modify this part based on your database schema)
    include 'db.php';
    $sql = "INSERT INTO image_slider (filename) VALUES ('$fileName')";
    $conn->query($sql);
    $conn->close();

    // Redirect back to the home page or wherever you want
    header('Location: manage.php');
    exit;
} else {
    echo 'Error uploading file.';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
</body>
</html>
