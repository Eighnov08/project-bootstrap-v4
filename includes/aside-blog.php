<?php
    $category = mysqli_query($connection, "SELECT * FROM category ORDER BY id ASC");
?>

<div class="category">
    <form>
        <div class="d-flex my-2 my-lg-0 pt-4">
            <input class="form-control mr-sm-2" type="text" placeholder="Search">
            <button type="button"><i class="fas fa-search"></i></button>
        </div>
    </form><br>
    <hr><br>
    <p class="news">
        NEWS
    </p>
    <ul class="list-unstyled">
        <li class="media">
            <img src="images/blog/pp1.jpg" class="mr-3" alt="...">
            <div class="media-body">
                <p class="mt-0 mb-1 judul-media">Space The Final Frontier</p>
                <p class="text-muted">02 Hour Ago</p>
            </div>
        </li>
        <li class="media my-4">
            <img src="images/blog/pp2.jpg" class="mr-3" alt="...">
            <div class="media-body">
                <p class="mt-0 mb-1 judul-media">The Amazing Hubble</p>
                <p class="text-muted">02 Hour Ago</p>
            </div>
        </li>
        <li class="media my-4">
            <img src="images/blog/pp3.jpg" class="mr-3" alt="...">
            <div class="media-body">
                <p class="mt-0 mb-1 judul-media">Astronomy of Astrology</p>
                <p class="text-muted">02 Hour Ago</p>
            </div>
        </li>
        <li class="media my-4">
            <img src="images/blog/pp4.jpg" class="mr-3" alt="...">
            <div class="media-body">
                <p class="mt-0 mb-1 judul-media">Asteroids Telescope</p>
                <p class="text-muted">02 Hour Ago</p>
            </div>
        </li>
    </ul>
    <br>
    <p class="news">
        Post Categories
    </p>
    <ul class="list-group">
        <?php if(mysqli_num_rows($category)>0) {?>
            <?php while($row_cat=mysqli_fetch_array($category)) {?>
                <?php $all_cat=mysqli_query($connection, "SELECT * FROM post WHERE category_id = $row_cat[id]") ?>
                <?php $num_row=mysqli_num_rows($all_cat) ?>
                <a style="text-decoration:none" href="index.php?category=<?php echo $row_cat["id"] ?>"><li class="list-group-item list-group-category pl-2"><?php echo $row_cat["category_name"] ?>
                    <p class=" float-right pr-2"><?php echo $num_row ?></p>
                </li></a>
            <?php } ?>
        <?php } ?>
    </ul>
</div>