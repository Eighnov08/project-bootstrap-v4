<?php
    $gallery = mysqli_query($connection, "SELECT * FROM gallery ORDER BY id DESC");
?>

<div class="container text-center gallery">
    <div class="row py-3">
        <div class="col-md-12">
            <?php if(mysqli_num_rows($gallery)>0) {?>
                <?php while($row_gallery=mysqli_fetch_array($gallery)) {?>
                    <a data-fancybox="gallery" data-caption="<?php echo $row_gallery["caption"] ?>" href="images/elements/<?php echo $row_gallery["image"] ?>"><img class="py-3" src="images/elements/<?php echo $row_gallery["image"] ?>"></a>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>