<h2>Image Gallery</h2>
<?php if (isset($_SESSION['user'])) { ?>
    <form action="?page=gallery" method="post" enctype="multipart/form-data">
        <label for="file">Upload a new image:</label>
        <input type="file" name="file" id="file" required>
        <input type="submit" name="submit" value="Upload">
    </form>
<?php } ?>
<div class="gallery">
    <?php
    $dir = "./uploads/";
    $images = scandir($dir);
    foreach ($images as $image) {
        if ($image != '.' && $image != '..') {
            echo "<img src='$dir$image' alt='$image' class='img-thumbnail' style='max-width: 200px; margin: 10px;'>";
        }
    }
    ?>
</div>
