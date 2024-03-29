<?php
    if(isset($_POST["submit"])){
        $category_id = $_POST["category_id"];
        $title = $_POST["title"];
        $name = $_POST["name"];
        $description = $_POST["description"];
        $date = date("Y-m-d H:i:s");

        $file_name = $_FILES["file"]["name"];
        $tmp_name = $_FILES["file"]["tmp_name"];

        if($file_name!=="" || !empty($file_name) && !empty($category_id) && !empty($title) && !empty($name) && !empty($description)){
            move_uploaded_file($tmp_name, "../images/blog/".$file_name);
            mysqli_query($connection, "INSERT INTO post VALUES('','$category_id','$title','$name','$description','$file_name','$date','0')");
            header("location:index.php?post&success#post-success");
        } else {
            header("location:index.php?post&failed#post-failed");
        }
    }

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
                                            <option value="<?php echo $row_cat["id"] ?>"> <?php echo $row_cat["category_name"] ?> </option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <input class="form-control" type="text" name="title" />
                            </div>
                            <div class="form-group">
                                <label>Author</label>
                                <input class="form-control" type="text" name="name" />
                            </div>
                            <div class="form-group" id="post-failed">
                                <label>Description</label>
                                <textarea class="form-control" rows="3" name="description" id="editor1"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="file" />
                            </div>
                            <?php if(isset($_GET["failed"])) {?>
                                <div class="alert alert-danger" role="alert">
                                    Lengkapi Data Post!
                                </div>
                            <?php } else if(isset($_GET["success"])) { ?>
                                <div class="alert alert-success" role="alert">
                                    Data Post Berhasil Dipublish
                                </div>
                            <?php } ?>
                            <button type="submit" name="submit" class="btn btn-success">Save</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                List Data
            </div>
            <div class="panel-body" id="post-success">
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
                                <th>Publish</th>
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
                                        <td><?php echo tanggal_indonesia($row_post["date"]) ?></td>
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