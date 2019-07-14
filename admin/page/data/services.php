<?php 
    if(isset($_POST["submit"])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $subject = $_POST["subject"];
        $message = $_POST["message"];
        $date = date("Y-m-d H:i:s");
        mysqli_query($connection, "INSERT INTO customer VALUES('','$name','$email','$subject','$message','$date')");
        header("location:index.php?contact");
    }

    $contact = mysqli_query($connection, "SELECT * FROM contact ORDER BY id DESC");
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
                        <form role="form" action="" method="post">
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" type="text" name="name" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="email" name="email" />
                            </div>
                            <div class="form-group">
                                <label>Subject</label>
                                <input class="form-control" type="text" name="subject" />
                            </div>
                            <div class="form-group">
                                <label>Message</label>
                                <textarea class="form-control" rows="3" name="message"></textarea>
                            </div>
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
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Datetime</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(mysqli_num_rows($contact)>0) {?>
                                <?php $no=1; ?>
                                <?php while($row_contact=mysqli_fetch_array($contact)) {?>
                                    <tr>
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $row_contact["name"] ?></td>
                                        <td><?php echo $row_contact["email"] ?></td>
                                        <td><?php echo $row_contact["subject"] ?></td>
                                        <td><?php echo $row_contact["message"] ?></td>
                                        <td><?php echo tanggal_indonesia($row_contact["date"]) ?></td>
                                        <td class="center"><a href="index.php?contact-update=<?php echo $row_contact["id"] ?>" class="btn btn-primary btn-xs" type="button">Update</a></td>
                                        <td class="center"><a href="index.php?contact-delete=<?php echo $row_contact["id"] ?>" class="btn btn-primary btn-xs" type="button">Delete</a></td>
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