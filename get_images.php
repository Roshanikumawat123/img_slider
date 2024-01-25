<?php
include 'db.php';

$images = [];
$sql = "SELECT filename FROM image_slider";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $images[] = $row['filename'];
    }
}

if (empty($images)) {
    $images = glob('uploads/*.jpg');
}

echo json_encode($images);
$conn->close();
?>
