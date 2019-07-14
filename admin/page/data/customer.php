<?php 
    if(isset($_POST["submit"])){
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $message = $_POST["message"];
        $date = date("Y-m-d H:i:s");
        mysqli_query($connection, "INSERT INTO customer VALUES('','$name','$phone','$email','$message','$date')");
        header("location:index.php?customer");
    }

    $customer = mysqli_query($connection, "SELECT * FROM customer ORDER BY id DESC");
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Data &raquo; Customer</h1>
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
                                <label>Phone</label>
                                <input class="form-control" type="text" name="phone" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="email" name="email" />
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
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Datetime</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(mysqli_num_rows($customer)>0) {?>
                                <?php $no=1; ?>
                                <?php while($row_customer=mysqli_fetch_array($customer)) {?>
                                    <tr>
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $row_customer["name"] ?></td>
                                        <td><?php echo $row_customer["phone"] ?></td>
                                        <td><?php echo $row_customer["email"] ?></td>
                                        <td><?php echo $row_customer["message"] ?></td>
                                        <td><?php echo tanggal_indonesia($row_customer["date"]) ?></td>
                                        <td class="center"><a href="index.php?customer-update=<?php echo $row_customer["id"] ?>" class="btn btn-primary btn-xs" type="button">Update</a></td>
                                        <td class="center"><a href="index.php?customer-delete=<?php echo $row_customer["id"] ?>" class="btn btn-primary btn-xs" type="button">Delete</a></td>
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