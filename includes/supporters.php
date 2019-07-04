<?php
    $service = mysqli_query($connection, "SELECT * FROM service ORDER BY id DESC LIMIT 4");
?>

<div class="container content-1 my-5">
        <div class="row text-center py-5">
            <div class="col-md-12">
                <h2>
                    What we Offer to our Supporters
                </h2>
                <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing</p>
            </div>
        </div>
        <div class="row">
            <?php if(mysqli_num_rows($service)>0) {?>
                <?php while($row_service=mysqli_fetch_array($service)) {?>
                    <div class="col-md-3">
                        <div class="card">
                            <img src="images/<?php echo $row_service["image"] ?>" class="card-img-top img-fluid">
                            <div class="card-body">
                                <p class="judul-card">
                                    <?php echo $row_service["name"] ?>
                                </p>
                                <p class="card-text"><?php echo $row_service["description"] ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>