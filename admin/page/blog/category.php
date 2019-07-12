<?php
    if(isset($_POST["submit"])){
        $category_name = $_POST["name"];
        $icon = $_POST["icon"];
        
        $file_name = $_FILES["file"]["name"];
        $tmp_name = $_FILES["file"]["tmp_name"];

        if($file_name!=="" || !empty($file_name) && !empty($category_name) && !empty($icon)){
            move_uploaded_file($tmp_name, "../images/blog/".$file_name);
            mysqli_query($connection, "INSERT INTO category VALUES ('','$category_name','$icon','$file_name')");
            header("location:index.php?category&success");
        } else {
            header("location:index.php?category&failed");
        }
    }

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
                                <input class="form-control" type="text" name="name" />
                            </div>
                            <div class="form-group">
                                <label>Icon</label>
                                <input class="form-control" type="text" name="icon" />
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="file" />
                            </div>
                            <?php if(isset($_GET["failed"])){ ?>
                                <div class="alert alert-danger" role="alert">
                                    Lengkapi Data Category!
                                </div>
                            <?php } else if(isset($_GET["success"])) {?>
                                <div class="alert alert-success" role="alert">
                                    Category Berhasil Diinput
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
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="table_admin" class="display">
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
                                        <td class="center"><a href="index.php?category-delete=<?php echo $row_cat["id"] ?>" class="btn btn-primary btn-xs" type="button" onclick="return confirm('Delete Data Category?')">Delete</a></td>
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