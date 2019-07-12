<?php 
    if(isset($_POST["update"])){
        $comment_id = $_POST["comment_id"];
        $post_id = $_POST["post_id"];
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $reply = $_POST["reply"];
        $status = $_POST["status"];
        $date = date("Y-m-d H:i:s");
        mysqli_query($connection, "UPDATE comment SET post_id = '$post_id', name = '$name', phone = '$phone', email = '$email', reply = '$reply',
                        status = '$status', date = '$date' WHERE id = '$comment_id'");
        header("location:index.php?comment");
    }

    $comment_id = $_GET["comment-update"];
    $update = mysqli_query($connection, "SELECT comment.*, post.title FROM comment, post WHERE comment.post_id = post.id
                            AND comment.id = '$comment_id' AND status = '1'");
    if(mysqli_num_rows($update)=="") header("location:index.php?comment");
    $row_update = mysqli_fetch_array($update);

    $comment = mysqli_query($connection, "SELECT comment.*, post.title FROM comment, post WHERE comment.post_id = post.id
                                AND status = '1' ORDER BY id DESC");
    $post = mysqli_query($connection, "SELECT * FROM post ORDER BY id ASC");
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Blog &raquo; Comment</h1>
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
                        <form role="form" action="" method="post">
                            <div class="form-group">
                                <label>Post</label>
                                <select class="form-control" name="post_id">
                                    <option value=""> - choose - </option>
                                    <?php if(mysqli_num_rows($post)>0) {?>
                                        <?php while($row_cat=mysqli_fetch_array($post)) {?>
                                            <option <?php echo $row_update["post_id"]==$row_cat["id"] ? "selected='select'" : "" ?>
                                            value="<?php echo $row_cat["id"] ?>"> <?php echo $row_cat["title"] ?> </option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>User</label>
                                <input class="form-control" type="text" name="name" value="<?php echo $row_update["name"] ?>" />
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input class="form-control" type="text" name="phone" value="<?php echo $row_update["phone"] ?>"/>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="email" name="email" value="<?php echo $row_update["email"] ?>" />
                            </div>
                            <div class="form-group">
                                <label>Reply</label>
                                <textarea class="form-control" rows="3" name="reply" id="editor1"><?php echo $row_update["reply"] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" value="0" name="status" <?php echo $row_update["status"]=='0' ? "checked" : "" ?>/> Not Active
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" value="1" name="status" <?php echo $row_update["status"]=='1' ? "checked" : "" ?>/> Active
                                    </label>
                                </div>
                            </div>
                            <?php if(isset($_GET["failed"])){ ?>
                                <div class="alert alert-danger" role="alert" id="comment-failed">
                                    Lengkapi Data Comment!
                                </div>
                            <?php } else if(isset($_GET["success"])) {?>
                                <div class="alert alert-success" role="alert" id="comment-success">
                                    Comment Berhasil Diinput
                                </div>
                            <?php } ?>
                            <button type="submit" name="update" class="btn btn-success" onclick="return confirm('Update Data Comment?')">Update</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                            <input type="hidden" name="comment_id" value="<?php echo $row_update["id"] ?>">
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
                                <th>No</th>
                                <th>Post</th>
                                <th>User</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Reply</th>
                                <th>Status</th>
                                <th>Datetime</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(mysqli_num_rows($comment)>0) { ?>
                                <?php $no=1 ?>
                                <?php while($row_comment=mysqli_fetch_array($comment)) {?>
                                    <tr>
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $row_comment["title"] ?></td>
                                        <td><?php echo $row_comment["name"] ?></td>
                                        <td><?php echo $row_comment["phone"] ?></td>
                                        <td><?php echo $row_comment["email"] ?></td>
                                        <td><?php echo $row_comment["reply"] ?></td>
                                        <td><?php echo $row_comment["status"]=='1' ? "Active" : "Not Active" ?></td>
                                        <td><?php echo $row_comment["date"] ?></td>
                                        <td class="center"><a href="index.php?comment-update=<?php echo $row_comment["id"] ?>" class="btn btn-primary btn-xs" type="button">Update</a></td>
                                        <td class="center"><a href="index.php?comment-delete=<?php echo $row_comment["id"] ?>" class="btn btn-primary btn-xs" type="button" onclick="return confirm('Delete Comment?')">Delete</a></td>
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