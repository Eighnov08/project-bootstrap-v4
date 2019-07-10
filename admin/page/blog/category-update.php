<?php

    if(isset($_POST["update"])){
        $category_id = $_POST["category_id"];
        $category_name = $_POST["name"];
        $icon = $_POST["icon"];

        $file_name = $_FILES["file"]["name"];
        $tmp_name = $_FILES["file"]["tmp_name"];
        if($file_name=="" || empty($file_name)){
            mysqli_query($connection, "UPDATE category SET category_name = '$category_name', icon = '$icon'
                        WHERE id = '$category_id'");
        } else {
            move_uploaded_file($tmp_name, "../images/blog".$file_name);
            mysqli_query($connection, "UPDATE category SET category_name = '$category_name', icon = '$icon', image = '$file_name'
                            WHERE id = '$category_id'");
        }
        header("location:index.php?category");
    }

    $category_id = $_GET["category-update"];
    $update = mysqli_query($connection, "SELECT * FROM category WHERE id = '$category_id'");
    if(mysqli_num_rows($update)==0) header("location:index.php?category");
    $row_update = mysqli_fetch_array($update);

    $category = mysqli_query($connection, "SELECT * FROM category ORDER BY id DESC");
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Blog &raquo; Category</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Input Data
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form role="form" action="" method="post" enctype="multipart/form-data" >
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" type="text" name="name" value="<?php echo $row_update["category_name"] ?>"/>
                            </div>
                            <div class="form-group">
                                <label>Icon</label>
                                <input class="form-control" type="text" name="icon" value="<?php echo $row_update["icon"] ?>"/>
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <p><?php if($row_update["image"]==""){ echo "<img src='asset/no-image.png' width='200'>"; } else {?>
                                    <img src="../images/blog/<?php echo $row_update["image"] ?>" width="200" alt="">
                                <?php } ?>
                                </p>
                                <input type="file" name="file" />
                            </div>
                            <button type="submit" name="update" class="btn btn-success">Update</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                            <input type="hidden" name="category_id" value="<?php echo $row_update["id"] ?>">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                List Data
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Icon</th>
                                <th>Image</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(mysqli_num_rows($category)>0) {?>
                                <?php while($row_cat=mysqli_fetch_array($category)) {?>
                                    <tr>
                                        <td><?php echo $row_cat["category_name"] ?></td>
                                        <td><?php echo $row_cat["icon"] ?></td>
                                        <td>
                                            <?php if($row_cat["image"]==""){ echo "<img src='asset/no-image.png' width='88' class='img-responsive' />"; } else {?>
                                            <img src="../images/blog/<?php echo $row_cat["image"] ?>" width="88" class="img-responsive" />
                                            <?php } ?>
                                        </td>
                                        <td class="center"><a href="index.php?category-update=<?php echo $row_cat["id"] ?>" class="btn btn-primary btn-xs" type="button">Update</a></td>
                                        <td class="center"><a href="index.php?category-delete=<?php echo $row_cat["id"] ?>" class="btn btn-primary btn-xs" type="button">Delete</a></td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>