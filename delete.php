<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['image'])) {
    $imageToDelete = $_GET['image'];
    
    
    $sql = "DELETE FROM image_slider WHERE filename = '$imageToDelete'";
    
    if ($conn->query($sql) === TRUE) {
        
        $filePath = 'uploads/' . $imageToDelete;
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        
        $redirectPage = isset($_GET['redirect']) ? $_GET['redirect'] : 'manage.php';
        header('Location: ' . $redirectPage);
        exit();
    } else {
        echo "Error deleting image from the database: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>
