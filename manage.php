<?php
include 'db.php';


$sql = "SELECT filename FROM image_slider";
$result = $conn->query($sql);

$images = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $images[] = $row['filename'];
    }
}


if (empty($images)) {
   // $images = glob('uploads/*.jpg');
    $images = array_merge(glob('uploads/*.jpg'), glob('uploads/*.png'));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- Swiper CSS link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Custom link -->
    <!--<link rel="stylesheet" href="style.css">-->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<section class="home">

    <div class="swiper home-slider">
        <div class="swiper-wrapper">

            <?php foreach ($images as $image): ?>
            <div class="swiper-slide slide">
               <!-- <img src="<?php //echo $image; ?>" alt="Slider Image">-->
               <img src="uploads/<?php echo $image; ?>" alt="Slider Image" width="500px" height="500px">
               
            </div>
        <?php endforeach; ?>

        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</section>

<!--<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>-->







<!-- Add Image Form -->
<form action="add.php" method="post" enctype="multipart/form-data">
    <label for="image">Add Image:</label>
    <input type="file" name="image" id="image" accept="image/jpeg">
    <button class="btnu"  type="submit">Upload</button>
</form>



<h2>Image List</h2>

<ul>
    <?php foreach ($images as $image): ?>
        <li>
            <img src="uploads/<?php echo $image; ?>" alt="Image" width="100px">
            <a href="delete.php?image=<?php echo urlencode(basename($image)); ?>" onclick="return confirm('Are you sure you want to delete this image?')">Delete</a>
        </li>
    <?php endforeach; ?>
</ul>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var swiper = new Swiper(".home-slider", {
            loop: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });


        document.getElementById('yourImageUploadFormId').addEventListener('submit', function (event) {
            event.preventDefault();

        

            
            fetch('get_images.php')
                .then(response => response.json())
                .then(images => {
                    swiper.removeAllSlides();

                    images.forEach(image => {
                        swiper.appendSlide('<div class="swiper-slide slide"><img src="' + image + '" alt="Slider Image"></div>');
                    });

                    swiper.update();
                })
                .catch(error => console.error('Error fetching images:', error));
        });
    });
</script>



</body>
</html>
