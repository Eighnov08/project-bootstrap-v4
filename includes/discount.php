<?php
    if(isset($_POST["submit"])){
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $message = $_POST["message"];
        $date = date("Y-m-d H:i:s");
        mysqli_query($connection, "INSERT INTO customer VALUES('','$name','$phone','$email','$message','$date')");
    }
    
?>

<div class="container-fluid content-3">
        <div class="container">
            <div class="row form">
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
                        <button style="none" type="submit" class="estimate btn btn-primary" name="submit">GET ESTIMATE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>