<?php
    $category = mysqli_query($connection, "SELECT * FROM category ORDER BY id ASC LIMIT 3");
?>

<div class="row text-center pt-5">
    <?php if(mysqli_num_rows($category)>0) {?>
        <?php while($row_cat=mysqli_fetch_array($category)) {?>
            <div class="col-md-4">
                <div class="img content-banner1 p-4" style="background: url(images/blog/<?php echo $row_cat["image"] ?>) no-repeat center;background-size: 100%;">
                    <div class="rgba">
                        <p class="judul-content">
                            <?php echo $row_cat["category_name"] ?>
                        </p>
                        <hr>
                        <p class="m-0">
                            Enjoy your social life together
                        </p>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php } ?>
</div>