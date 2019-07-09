<?php
    include "includes/banner-sub.php";

    if(isset($_POST["submit"])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $subject = $_POST["subject"];
        $message = $_POST["message"];
        $date = date("Y-m-d H:i:s");
        if(!empty($name) && !empty($email) && !empty($subject) && !empty($message)){
            mysqli_query($connection, "INSERT INTO contact VALUES('','$name','$email','$subject','$message','$date')");
            header("location:index.php?contact&success");
        } else {
            header("location:index.php?contact&failed");
        }
        
    }
?>
    <!-- CONTENT -->
    <div class="container contact">
        <div class="row">
            <div class="col-md-12">
                <?php if(isset($_GET["success"])){?>
                <div class="alert alert-success alert-dismissable mt-3">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                    Message Berhasil Dikirim
                </div>
                <?php } else if(isset($_GET["failed"])){?>
                    <div class="alert alert-danger alert-dismissable mt-3">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                    Lengkapi Data Anda!
                </div>
                <?php } else {?>
                <?php } ?>
                            
                <div class="mt-2 mb-3">
                    <div class="embed-responsive embed-responsive-16by9 map">
                        <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.203109626019!2d106.84131931471673!3d-6.236937995485315!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f39562fd4453%3A0x8070156df7c40433!2sDUMET+School+Tebet!5e0!3m2!1sen!2sid!4v1560404863866!5m2!1sen!2sid"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-4">
            <div class="col-md-4">
                <ul class="list-unstyled">
                    <li class="media">
                        <i class="fas fa-home"></i>
                        <div class="media-body float-left">
                            <p class="mt-0 mb-1 contact-detail">Dumet School Tebet</p>
                            <p>
                                Rukan lorem ipsum dolor sit amet consectetur adipisicing
                            </p>
                        </div>
                    </li>
                    <li class="media">
                        <i class="fas fa-phone-square-alt"></i>
                        <div class="media-body float-left">
                            <p class="mt-0 mb-1 contact-detail">(021) 1343 1413 2313</p>
                            <p>
                                Open 08.00 - Closed 21.00
                            </p>
                        </div>
                    </li>
                    <li class="media">
                        <i class="fas fa-envelope"></i>
                        <div class="media-body float-left">
                            <p class="mt-0 mb-1 contact-detail">support@gmail.com</p>
                            <p>
                                Send us your query anytime
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-8">
                <form action="" method="post">
                    <div class="row form-contact">
                        <div class="col-md-6">
                            <input type="text" class="form-control mb-4" placeholder="Enter your name" name="name">
                            <input type="email" class="form-control mb-4" placeholder="Enter your email" name="email">
                            <input type="text" class="form-control mb-4" placeholder="Enter your subject" name="subject" >
                        </div>
                        <div class="col-md-6">
                            <textarea class="form-control pb-4 mb-4" id="exampleFormControlTextarea1" rows="7" placeholder="Message" name="message" ></textarea>
                            <button style="none" type="submit" class="float-right btn-contact" name="submit">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>