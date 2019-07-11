<?php
    $per_page = 4;
    $cur_page = 1;
    if(isset($_GET["page"])){
      $current_page = $_GET["page"];
      $cur_page = ($current_page > 1) ? $current_page : 1;
    }
  
    $total_data = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM post"));
    $total_page = ceil($total_data/$per_page);
    $offset     = ($cur_page - 1) * $per_page;

    $post = mysqli_query($connection, "SELECT post.*, category.category_name, category.icon FROM post, category 
                            WHERE post.category_id = category.id ORDER BY id DESC LIMIT $per_page OFFSET $offset");

?>


<?php if(mysqli_num_rows($post)>0) {?>
    <?php while($row_post=mysqli_fetch_array($post)) {?>
        <?php $cmnt = mysqli_query($connection, "SELECT * FROM comment WHERE post_id = $row_post[id] AND status = '1'"); ?>
        <?php $num_row = mysqli_num_rows($cmnt); ?>
        <div class="row">
            <div class="col-md-4">
                <div class="list-blog">
                    <ul class="list-group text-right mr-4 d-none d-md-block">
                        <li class="list-group-item"><?php echo $row_post["name"] ?>&nbsp;&nbsp;<i class="fas fa-user-circle"></i></li>
                        <li class="list-group-item"><?php echo substr(tanggal_indonesia($row_post["date"]), 0, 20) ?>&nbsp;&nbsp;<i class="fas fa-calendar-alt"></i></li>
                        <li class="list-group-item"><?php echo $row_post["view"] ?> Views&nbsp;&nbsp;<i class="fas fa-eye"></i></li>
                        <li class="list-group-item"><?php echo $num_row ?> Comments&nbsp;&nbsp;<i class="fas fa-comments"></i></li>
                        <li class="list-group-item"><?php echo $row_post["category_name"] ?>&nbsp;&nbsp;<i class="<?php echo $row_post["icon"] ?>"></i></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8 p-0">
                <div class="card">
                    <img src="images/blog/<?php echo $row_post["image"] ?>" class="card-img-top">
                    <!-- untuk responsive small -->
                    <ul class="ul-blog d-block d-md-none">
                        <li class="li-blog"><?php echo $row_post["name"] ?>&nbsp;&nbsp;<i class="fas fa-user-circle"></i></li>
                        <li class="li-blog"><?php echo substr(tanggal_indonesia($row_post["date"]), 0, 20) ?>&nbsp;&nbsp;<i class="fas fa-calendar-alt"></i></li>
                        <li class="li-blog"><?php echo $row_post["view"] ?> Views&nbsp;&nbsp;<i class="fas fa-eye"></i></li>
                        <li class="li-blog"><?php echo $num_row ?> Comments&nbsp;&nbsp;<i class="fas fa-comments"></i></li>
                        <li class="li-blog"><?php echo $row_post["category_name"] ?>&nbsp;&nbsp;<i class="<?php echo $row_post["icon"] ?>"></i></li>
                    </ul>
                    <!-- end -->
                    <div class="card-body-blog">
                        <h5 class="card-title"><?php echo $row_post["title"] ?></h5>
                        <p class="card-text"><?php echo substr($row_post["description"], 0, 150)."..."; ?></p>
                        <a href="index.php?blog-detail=<?php echo $row_post["id"] ?>" class="btn btn-outline-info">View More</a>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
<?php } ?>

<div class="row">
    <div class="col-md-12">
        <?php if(isset($total_page)) {?>
            <?php if($total_page > 1) {?>
                <nav aria-label="...">
                    <ul class="pagination justify-content-center">
                        <?php if($cur_page > 1) {?>
                            <li class="page-item">
                                <a class="page-link" href="index.php?blog&page=<?php echo $cur_page - 1 ?>"><i class="fas fa-chevron-left"></i></a>
                            </li>
                        <?php } else { ?>
                            <li class="page-item disabled">
                                <a class="page-link" href=""><i class="fas fa-chevron-left"></i></a>
                            </li>
                        <?php } ?>
                        <?php for($i=1; $i<=$total_page; $i++){ ?>
                            <?php if($i==$cur_page){ ?>
                                <li class="page-item active" aria-current="page"><a class="page-link"  href="index.php?blog&page=<?php echo $i ?>"><?php echo $i ?></a></li>
                            <?php } else { ?>
                                <li class="page-item"><a class="page-link" href="index.php?blog&page=<?php echo $i ?>"><?php echo $i ?></a></li>
                            <?php } ?>
                        <?php } ?>
                        <?php if($cur_page < $total_page) {?>
                            <li class="page-item">
                                <a class="page-link" href="index.php?blog&page=<?php echo $cur_page + 1 ?>"><i class="fas fa-chevron-right"></i></a>
                            </li>
                        <?php } else { ?>
                            <li class="page-item disabled">
                                <a class="page-link" href=""><i class="fas fa-chevron-right"></i></a>
                            </li>
                        <?php } ?>
                    </ul>
                </nav>
            <?php } ?>
        <?php } ?>
    </div>
</div>