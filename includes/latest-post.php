<?php
    $post = mysqli_query($connection, "SELECT post.*, category.category_name, category.icon FROM post, category 
                            WHERE post.category_id = category.id ORDER BY id DESC");
?>


<?php if(mysqli_num_rows($post)>0) {?>
    <?php while($row_post=mysqli_fetch_array($post)) {?>
        <div class="row">
            <div class="col-md-4">
                <div class="list-blog">
                    <ul class="list-group text-right mr-4 d-none d-md-block">
                        <li class="list-group-item">Mark Wiens&nbsp;&nbsp;<i class="fas fa-user-circle"></i></li>
                        <li class="list-group-item"><?php echo substr(tanggal_indonesia($row_post["date"]), 0, 20) ?>&nbsp;&nbsp;<i class="fas fa-calendar-alt"></i></li>
                        <li class="list-group-item">2M Views&nbsp;&nbsp;<i class="fas fa-eye"></i></li>
                        <li class="list-group-item">08 Comments&nbsp;&nbsp;<i class="fas fa-comments"></i></li>
                        <li class="list-group-item"><?php echo $row_post["category_name"] ?>&nbsp;&nbsp;<i class="<?php echo $row_post["icon"] ?>"></i></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8 p-0">
                <div class="card">
                    <img src="images/blog/<?php echo $row_post["image"] ?>" class="card-img-top">
                    <!-- untuk responsive small -->
                    <ul class="ul-blog d-block d-md-none">
                        <li class="li-blog">Mark Wiens&nbsp;&nbsp;<i class="fas fa-user-circle"></i></li>
                        <li class="li-blog">13 Juni 2017&nbsp;&nbsp;<i class="fas fa-calendar-alt"></i></li>
                        <li class="li-blog">2M Views&nbsp;&nbsp;<i class="fas fa-eye"></i></li>
                        <li class="li-blog">08 Comments&nbsp;&nbsp;<i class="fas fa-comments"></i></li>
                    </ul>
                    <!-- end -->
                    <div class="card-body-blog">
                        <h5 class="card-title"><?php echo $row_post["title"] ?></h5>
                        <p class="card-text"><?php echo substr($row_post["description"], 0, 150)."..."; ?></p>
                        <a href="index.php?blog-detail=<?php echo $row_post["id"] ?>" class="btn-card-blog">View More</a>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
<?php } ?>

<div class="row">
    <div class="col-md-12">
        <nav aria-label="...">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="#"><i class="fas fa-chevron-left"></i></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active" aria-current="page">
                    <span class="page-link">
                                    2
                                    <span class="sr-only">(current)</span>
                    </span>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                </li>
            </ul>
        </nav>
    </div>
</div>