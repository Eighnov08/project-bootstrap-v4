<?php
    if(isset($_POST["update"])){
        $id_admin = $_POST["admin_id"];
        $username = $_POST["username"];
        $password = md5($_POST["password"]);
        mysqli_query($connection, "UPDATE admin SET username = '$username', password = '$password' WHERE id = '$id_admin'");
        header("location:index.php?administrator");
    }

    $admin_id = $_GET["update-admin"];
    $update = mysqli_query($connection, "SELECT * FROM admin WHERE id = '$admin_id'");
    if(mysqli_num_rows($update)==0) header("location:index.php?administrator");
    $row_update = mysqli_fetch_array($update);

    $admin = mysqli_query($connection, "SELECT * FROM admin ORDER BY id DESC");
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Blog &raquo; Administrator</h1>
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
                                <label>Username</label>
                                <input class="form-control" type="text" name="username" value="<?php echo $row_update["username"] ?>" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" type="password" name="password" value="<?php echo $row_update["password"] ?>" />
                            </div>
                            <button type="submit" name="update" class="btn btn-success">Update</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                            <input type="hidden" name="admin_id" value="<?php echo $row_update["id"] ?>">
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
                                <th>Username</th>
                                <th>Password</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(mysqli_num_rows($admin)>0) {?>
                                <?php while($row_admin=mysqli_fetch_array($admin)) {?>
                                    <tr>
                                        <td><?php echo $row_admin["username"] ?></td>
                                        <td><?php echo $row_admin["password"] ?></td>
                                        <td class="center"><a href="index.php?update-admin=<?php echo $row_admin["id"] ?>" class="btn btn-primary btn-xs" type="button">Update</a></td>
                                        <td class="center"><a href="index.php?delete-admin=<?php echo $row_admin["id"] ?>" class="btn btn-primary btn-xs" type="button">Delete</a></td>
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