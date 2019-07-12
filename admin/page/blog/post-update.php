<?php
    if(isset($_POST["update"])){
        $post_id = $_POST["post_id"];
        $category_id = $_POST["category_id"];
        $title = $_POST["title"];
        $name = $_POST["name"];
        $description = $_POST["description"];
        $date = date("Y-m-d H:i:s");

        $file_name = $_FILES["file"]["name"];
        $tmp_name = $_FILES["file"]["tmp_name"];
        if($file_name=="" || empty($file_name)){
            mysqli_query($connection, "UPDATE post SET category_id = '$category_id', title = '$title', name = '$name', 
                            description = '$description', date = '$date' WHERE id = '$post_id'");
        } else {
            move_uploaded_file($tmp_name, "../images/blog/".$file_name);
            mysqli_query($connection, "UPDATE post SET category_id = '$category_id', title = '$title', name = '$name', 
                            description = '$description', image = '$file_name', date = '$date' WHERE id = '$post_id'");
        }
        header("location:index.php?post");
    }

    $post_id = $_GET["post-update"];
    $update = mysqli_query($connection, "SELECT * FROM post WHERE id = '$post_id'");
    if(mysqli_num_rows($update)==0) header("location:index.php?post");
    $row_update = mysqli_fetch_array($update);

    $post = mysqli_query($connection, "SELECT post.*, category.category_name FROM post, category
                           WHERE post.category_id = category.id ORDER BY id DESC");

    $category = mysqli_query($connection, "SELECT * FROM category ORDER BY id ASC");
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Blog &raquo; Post</h1>
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
                        <form role="form" action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="category_id">
                                    <option value=""> - choose - </option>
                                    <?php if(mysqli_num_rows($category)>0) {?>
                                        <?php while($row_cat=mysqli_fetch_array($category)) {?>
                                            <option <?php echo $row_update["category_id"]==$row_cat["id"] ? "selected='selected'" : ""?>
                                            value="<?php echo $row_cat["id"] ?>"> <?php echo $row_cat["category_name"] ?> </option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <input class="form-control" type="text" name="title" value="<?php echo $row_update["title"] ?>" />
                            </div>
                            <div class="form-group">
                                <label>Author</label>
                                <input class="form-control" type="text" name="name" value="<?php echo $row_update["name"] ?>"/>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" rows="3" name="description" id="editor1"><?php echo $row_update["description"] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <p><img src="../images/blog/<?php echo $row_update["image"] ?>" width="200" class="img-responsive" /></p>
                                <input type="file" name="file" />
                            </div>
                            <button type="submit" name="update" class="btn btn-success"  onclick="return confirm('Update Data Post?')">Update</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                            <input type="hidden" name="post_id" value="<?php echo $row_update["id"] ?>">
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
                    <!-- <table class="table table-striped table-bordered table-hover" id="dataTables-example"> -->
                    <table id="table_admin" class="display">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Description</th>
                                <th>View</th>
                                <th>Image</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(mysqli_num_rows($post)>0) {?>
                                <?php $no=1 ?>
                                <?php while($row_post=mysqli_fetch_array($post)) {?>
                                    <tr>
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $row_post["category_name"] ?></td>
                                        <td><?php echo $row_post["title"] ?></td>
                                        <td><?php echo $row_post["name"] ?></td>
                                        <td><?php echo substr($row_post["description"],0,200)."..." ?></td>
                                        <td><?php echo $row_post["view"] ?></td>
                                        <td><img src="../images/blog/<?php echo $row_post["image"] ?>" width="88" class="img-responsive" /></td>
                                        <td class="center"><a href="index.php?post-update=<?php echo $row_post["id"] ?>" class="btn btn-primary btn-xs" type="button">Update</a></td>
                                        <td class="center"><a href="index.php?post-delete=<?php echo $row_post["id"] ?>" class="btn btn-primary btn-xs" type="button" onclick="return confirm('Delete Data Post?')">Delete</a></td>
                                    </tr>
                                <?php $no++; } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>