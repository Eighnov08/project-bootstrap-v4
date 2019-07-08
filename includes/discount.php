<?php
if(isset($_POST["submit"])){
    $post_id = $_POST["post_id"];
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    $date = date("Y-m-d H:i:s");

    if(empty($name) && empty($phone) && empty($email) && empty($message)){
        if(isset($_GET["home"]) == "home" ){
            echo "<script type='text/javascript'>window.top.location='index.php?home&failed#form-discount';</script>";
        } else if(isset($_GET["about"]) == "about"){
            echo "<script type='text/javascript'>window.top.location='index.php?about&failed#form-discount';</script>";
        } else if(isset($_GET["service"]) == "service"){
            echo "<script type='text/javascript'>window.top.location='index.php?service&failed#form-discount';</script>";
        } else{
            echo "<script type='text/javascript'>window.top.location='index.php?home&failed#form-discount';</script>";
        }
    } else {
            mysqli_query($connection, "INSERT INTO customer VALUES('','$name','$phone','$email','$message','$date')");
            if(isset($_GET["home"]) == "home" ){
                echo "<script type='text/javascript'>window.top.location='index.php?home&success#form-discount';</script>";
            } else if(isset($_GET["about"]) == "about"){
                echo "<script type='text/javascript'>window.top.location='index.php?about&success#form-discount';</script>";
            } else if(isset($_GET["service"]) == "service"){
                echo "<script type='text/javascript'>window.top.location='index.php?service&success#form-discount';</script>";
            } else{
                echo "<script type='text/javascript'>window.top.location='index.php?home&success#form-discount';</script>";
            }
        }

    }

$post = mysqli_query($connection, "SELECT * FROM post");
if(mysqli_num_rows($post)==0) header("location:index.php");
$row_post = mysqli_fetch_array($post);
?>

<div class="container-fluid content-3">
    <div class="container">
        <div class="row form" id="form-discount">
            <div class="col-md-6 my-auto">
                <h2>
                    Enjoy 25% Seasonal Discount!
                </h2>
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptas ullam, similique, tempora tenetur quam sequi debitis quas, atque eum omnis expedita suscipit porro deserunt quis. Quos perferendis officia ipsa dolores?
                </p>
                <a href="">ORDER SERVICE NOW</a>
            </div>
            <div class="col-md-6 my-auto">
                <form method="POST">
                    <h3 class="text-center pb-3">
                        Get a free Estimate
                    </h3>
                    <div class="form-group">
                        <input type="text" class="form-control" id="inputAddress" placeholder="Your Name" name="name">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" id="inputPhone" placeholder="Phone" name="phone">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Message" name="message"></textarea>
                    </div>
                    <?php if(isset($_GET["success"]) or isset($_GET["success"]) ){?>
                    <div class="alert alert-success alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                        Berhasil!
                    </div>
                    <?php } else if(isset($_GET["failed"]) or isset($_GET["failed"]) ){?>
                        <div class="alert alert-danger alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                        Lengkapi Data Anda!
                    </div>
                    <?php } else {?>
                    <?php } ?>

                    <button style="none" type="submit" class="estimate btn btn-primary" name="submit">GET ESTIMATE</button>
                    <input type="hidden" name="post_id" value="<?php echo $row_post["id"] ?>" >
                </form>
            </div>
        </div>
    </div>
</div>
