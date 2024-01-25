<?php
include 'db.php';

$images = glob('uploads/*.jpg');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Slider</title>
    <link rel="stylesheet" href="style.css">
    <script src="index.js"></script>
</head>
<body>
    <h2>Image Slider</h2>
    <div class="slider-container">
        <?php foreach ($images as $image): ?>
            <div class="slider-item">
                <img src="<?php echo $image; ?>" alt="Slider Image">
            </div>
        <?php endforeach; ?>
    </div>


</body>
</html>
