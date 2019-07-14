<?php
    if(isset($_POST["update"])){
        $id_services = $_POST["services_id"];
        $services_name = $_POST["name"];
        $description = $_POST["description"];

        $file_name = $_FILES["file"]["name"];
        $tmp_name = $_FILES["file"]["tmp_name"];
        if($file_name=="" || empty($file_name)){
            mysqli_query($connection, "UPDATE service SET name = '$services_name', description = '$description' 
                            WHERE id = '$id_services'");
        } else {
            move_uploaded_file($tmp_name, "../images/".$file_name);
            mysqli_query($connection, "UPDATE service SET name = '$services_name', description = '$description', image = '$file_name' 
                            WHERE id = '$id_services'");
        }
        header("location:index.php?services");
    }

    $services_id = $_GET["services-update"];
    $update = mysqli_query($connection, "SELECT * FROM service WHERE id = '$services_id'");
    if(mysqli_num_rows($update)==0) header("location:index.php?services");
    $row_update = mysqli_fetch_array($update);

    $services = mysqli_query($connection, "SELECT * FROM service ORDER BY id DESC");
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Data &raquo; Services</h1>
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
                                <input class="form-control" type="text" name="name" value="<?php echo $row_update["name"] ?>"/>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" rows="3" name="description" id="editor1"><?php echo $row_update["description"] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <p><img src="../images/<?php echo $row_update["image"] ?>" width="200" class="img-responsive" /></p>
                                <input type="file" name="file" />
                            </div>
                            <?php if(isset($_GET["failed"])){ ?>
                                <div class="alert alert-danger" role="alert">
                                    Lengkapi Data Services!
                                </div>
                            <?php } else if(isset($_GET["success"])) {?>
                                <div class="alert alert-success" role="alert">
                                    Data Services Berhasil Diinput
                                </div>
                            <?php } ?>
                            <button type="submit" name="update" class="btn btn-success">Update</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                            <input type="hidden" name="services_id" value="<?php echo $row_update["id"] ?>">
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
                                <th>Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(mysqli_num_rows($services)>0) {?>
                                <?php $no=1 ?>
                                <?php while($row_services=mysqli_fetch_array($services)) {?>
                                    <tr>
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $row_services["name"] ?></td>
                                        <td><?php echo $row_services["description"] ?></td>
                                        <td>
                                            <?php if($row_services["image"]==""){ echo "<img src='asset/no-image.png' width='88' class='img-responsive' />"; } else {?>
                                            <img src="../images/<?php echo $row_services["image"] ?>" width="88" class="img-responsive" />
                                            <?php } ?>
                                        </td>
                                        <td class="center"><a href="index.php?services-update=<?php echo $row_services["id"] ?>" class="btn btn-primary btn-xs" type="button">Update</a></td>
                                        <td class="center"><a href="index.php?services-delete=<?php echo $row_services["id"] ?>" class="btn btn-primary btn-xs" type="button" onclick="return confirm('Delete Data Services?')">Delete</a></td>
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