<?php
    $detail_id = $_GET["blog-detail"];
    $detail = mysqli_query($connection, "SELECT post.*, category.category_name, category.icon FROM post, category 
                            WHERE post.category_id = category.id AND post.id = '$detail_id' ORDER BY id DESC");
    if(mysqli_num_rows($detail)==0) header("location:index.php?blog");
    $row_detail = mysqli_fetch_array($detail);

    mysqli_query($connection, "UPDATE post SET view = '$row_detail[view]'+1 WHERE id = '$detail_id'");

    $comment = mysqli_query($connection, "SELECT * FROM comment WHERE comment.post_id = '$detail_id' AND status = '1' ORDER BY id DESC");
    $jumlah_comment = mysqli_num_rows($comment);

    if(isset($_POST["submit"])){
        $post_id = $_POST["post_id"];
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $reply = $_POST["message"];
        $date = date("Y-m-d H:i:s");
        mysqli_query($connection, "INSERT INTO comment VALUES('','$post_id','$name','$phone','$email','$reply','0','$date')");
        header("location:index.php?blog-detail=$post_id");
    }
?>

<!-- BANNER -->
    <?php include "includes/banner-sub.php"; ?>
    <!-- CONTENT -->
    <div class="container-fluid bg-light py-5">
        <div class="container content-blog pb-5">
            <div class="row content-blog-detail">
                <div class="col-md-8 detail">
                    <img src="images/blog/<?php echo $row_detail["image"] ?>" class="img-fluid w-100 mb-2" alt="">
                    <ul class="ul-blog-detail">
                        <li class="li-blog-detail"><?php echo $row_detail["name"] ?>&nbsp;&nbsp;<i class="fas fa-user-circle"></i></li>
                        <li class="li-blog-detail"><?php echo substr(tanggal_indonesia($row_detail["date"]), 0, 20) ?>&nbsp;&nbsp;<i class="fas fa-calendar-alt"></i></li>
                        <li class="li-blog-detail"><?php echo $row_detail["view"] ?> Views&nbsp;&nbsp;<i class="fas fa-eye"></i></li>
                        <li class="li-blog-detail"><?php echo $jumlah_comment ?> Comments&nbsp;&nbsp;<i class="fas fa-comments"></i></li>
                        <li class="li-blog-detail"><?php echo $row_detail["category_name"] ?>&nbsp;&nbsp;<i class="<?php echo $row_detail["icon"] ?>"></i></li>
                    </ul>
                    <h4 class="my-3">
                        <?php echo $row_detail["title"] ?>
                    </h4>
                    <p>
                        <?php echo $row_detail["description"] ?>
                    </p>
                    <a href="index.php?blog" style="text-decoration:none">
                        <button type="button" class="btn btn-outline-info btn-lg btn-block">Back</button>
                    </a>
                    <div class="media-detail my-5">
                        <h5 class="text-center mb-5">
                            <?php echo $jumlah_comment ?> Comments
                        </h5>
                        <ul class="list-unstyled">
                            <?php if(mysqli_num_rows($comment)>0) {?>
                                <?php while($row_comment=mysqli_fetch_array($comment)) {?>
                                    <li class="media my-4">
                                        <img src="images/blog/c2.jpg" class="mr-3" alt="...">
                                        <div class="media-body">
                                            <p class="mt-0 mb-1 username-comment"><?php echo $row_comment["name"] ?></p>
                                            <p class="text-muted">
                                                <?php echo tanggal_indonesia($row_comment["date"]) ?>
                                            </p>
                                            <p>
                                                <?php echo $row_comment["reply"] ?>
                                            </p>
                                        </div>
                                        <a href="" class="btn-card-blog">Reply</a>
                                    </li>
                                <?php } ?>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="form-detail mb-5">
                        <form class="mb-5 text-center" method="post">
                            <h3 class="pb-3">
                                Leave a Comment
                            </h3>
                            <div class="form-group">
                                <input type="text" class="form-control" id="inputAddress" placeholder="Your Name" name="name">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="inputPhone" placeholder="Phone" name="phone">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="myeditor" rows="3" placeholder="Message" name="message"></textarea>
                            </div>
                            <button style="none" type="submit" class="float-right btn-comment comment" name="submit">Post Comment</button>
                            <input type="hidden" name="post_id" value="<?php echo $row_detail["id"] ?>">
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <?php include "includes/aside-blog.php"; ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    