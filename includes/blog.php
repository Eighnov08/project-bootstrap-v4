<?php

    $post = mysqli_query($connection, "SELECT * FROM post ORDER BY id DESC LIMIT 4");

?>

<div class="container content-4 pb-0">
        <div class="row content-4-1">
            <div class="col-md-12 text-center">
                <h2>
                    Latest posts from our blog
                </h2>
                <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing</p>
            </div>
        </div>
        <div class="row">
            <?php if(mysqli_num_rows($post)>0) {?>
                <?php while($row_post=mysqli_fetch_array($post)) {?>
                    <div class="col-md-3">
                        <div class="card">
                            <img src="images/blog/<?php echo $row_post["image"] ?>" class="card-img-top img-fluid">
                            <div class="card-body">
                                <p>
                                    <?php echo substr(tanggal_indonesia($row_post["date"]), 0, 25)?> | <?php echo $row_post["name"] ?>
                                </p>
                                <p class="judul-card">
                                    <?php echo $row_post["title"] ?>
                                </p>
                                <hr>
                                <p class="card-text"><?php echo substr($row_post["description"], 0, 100) ?>...</p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>