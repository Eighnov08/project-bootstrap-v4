<?php
    include "includes/head.php";
?>

<body>
    <!-- HEADER -->
    <?php include "includes/header.php"; ?>
    <!-- NAVIGATION -->
    <?php include "includes/nav.php"; ?>
    <!-- BANNER -->
    <?php include "includes/banner-blog.php"; ?>
    <!-- CONTENT -->
    <div class="container-fluid bg-light">
        <div class="container content-blog pb-5">
            <div class="row text-center pt-5">
                <div class="col-md-4">
                    <div class="img content-banner1 p-4">
                        <div class="rgba">
                            <p class="judul-content">
                                SOCIAL LIFE
                            </p>
                            <hr>
                            <p class="m-0">
                                Enjoy your social life together
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="img content-banner2 p-4">
                        <div class="rgba">
                            <p class="judul-content">
                                POLITICS
                            </p>
                            <hr>
                            <p class="m-0">
                                Enjoy your social life together
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="img content-banner3 p-4">
                        <div class="rgba">
                            <p class="judul-content">
                                FOOD
                            </p>
                            <hr>
                            <p class="m-0">
                                Enjoy your social life together
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="list-blog">
                                <ul class="list-group text-right mr-4 d-none d-md-block">
                                    <li class="list-group-item">Mark Wiens&nbsp;&nbsp;<i class="fas fa-user-circle"></i></li>
                                    <li class="list-group-item">13 Juni 2017&nbsp;&nbsp;<i class="fas fa-calendar-alt"></i></li>
                                    <li class="list-group-item">2M Views&nbsp;&nbsp;<i class="fas fa-eye"></i></li>
                                    <li class="list-group-item">08 Comments&nbsp;&nbsp;<i class="fas fa-comments"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-8 p-0">
                            <div class="card">
                                <img src="images/blog/feature-img1.jpg" class="card-img-top">
                                <!-- untuk responsive small -->
                                <ul class="ul-blog d-block d-md-none">
                                    <li class="li-blog">Mark Wiens&nbsp;&nbsp;<i class="fas fa-user-circle"></i></li>
                                    <li class="li-blog">13 Juni 2017&nbsp;&nbsp;<i class="fas fa-calendar-alt"></i></li>
                                    <li class="li-blog">2M Views&nbsp;&nbsp;<i class="fas fa-eye"></i></li>
                                    <li class="li-blog">08 Comments&nbsp;&nbsp;<i class="fas fa-comments"></i></li>
                                </ul>
                                <!-- end -->
                                <div class="card-body-blog">
                                    <h5 class="card-title">Astronomy Binocular A Great Alternatives</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="blog-detail1.html" class="btn-card-blog">View More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <nav aria-label="...">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item">
                                        <a class="page-link" href="#"><i class="fas fa-chevron-left"></i></a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item active" aria-current="page">
                                        <span class="page-link">
                                                      2
                                                      <span class="sr-only">(current)</span>
                                        </span>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="category">
                        <form>
                            <div class="d-flex my-2 my-lg-0 pt-4">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                                <button type="button"><i class="fas fa-search"></i></button>
                            </div>
                        </form><br>
                        <hr><br>
                        <p class="news">
                            NEWS
                        </p>
                        <ul class="list-unstyled">
                            <li class="media">
                                <img src="images/blog/pp1.jpg" class="mr-3" alt="...">
                                <div class="media-body">
                                    <p class="mt-0 mb-1 judul-media">Space The Final Frontier</p>
                                    <p class="text-muted">02 Hour Ago</p>
                                </div>
                            </li>
                            <li class="media my-4">
                                <img src="images/blog/pp2.jpg" class="mr-3" alt="...">
                                <div class="media-body">
                                    <p class="mt-0 mb-1 judul-media">The Amazing Hubble</p>
                                    <p class="text-muted">02 Hour Ago</p>
                                </div>
                            </li>
                            <li class="media my-4">
                                <img src="images/blog/pp3.jpg" class="mr-3" alt="...">
                                <div class="media-body">
                                    <p class="mt-0 mb-1 judul-media">Astronomy of Astrology</p>
                                    <p class="text-muted">02 Hour Ago</p>
                                </div>
                            </li>
                            <li class="media my-4">
                                <img src="images/blog/pp4.jpg" class="mr-3" alt="...">
                                <div class="media-body">
                                    <p class="mt-0 mb-1 judul-media">Asteroids Telescope</p>
                                    <p class="text-muted">02 Hour Ago</p>
                                </div>
                            </li>
                        </ul>
                        <br>
                        <p class="news">
                            Post Categories
                        </p>
                        <ul class="list-group">
                            <li class="list-group-item list-group-category">Technology
                                <p class=" float-right">29</p>
                            </li>
                            <li class="list-group-item list-group-category">Lifestyle
                                <p class=" float-right">29</p>
                            </li>
                            <li class="list-group-item list-group-category">Art
                                <p class=" float-right">29</p>
                            </li>
                            <li class="list-group-item list-group-category">Fashion
                                <p class=" float-right">29</p>
                            </li>
                            <li class="list-group-item list-group-category">Food
                                <p class=" float-right">29</p>
                            </li>
                            <li class="list-group-item list-group-category">Architecture
                                <p class=" float-right">29</p>
                            </li>
                            <li class="list-group-item list-group-category">Adventure
                                <p class=" float-right">29</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FOOTER -->
    <div class="container-fluid bg-dark footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <p class="judul-footer">
                        ABOUT AGENCY
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis ab distinctio aut ratione? Tenetur sint quo est molestias alias. Voluptates sint quo nobis sit iure consequuntur alias deleniti dicta maxime
                    </p>
                </div>
                <div class="col-md-3">
                    <p class="judul-footer">
                        NAVIGATION LINK
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <a href="">Home</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="">Feature</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="">Service</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="">Portfolio</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <a href="">Team</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="">Pricing</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="">Blog</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <p class="judul-footer">
                        NEWSLETTER
                    </p>
                    <p>
                        Tenetur sint quo est molestias alias. Voluptates sint quo nobis sit iure consequuntur alias deleniti dicta maxime
                    </p>
                    <div class="search">
                        <input type="email" class="form-control input-sm" maxlength="64" placeholder="Email" />
                        <button type="submit" class="btn btn-primary btn-sm btn-search">OK</button>
                    </div>
                </div>
                <div class="col-md-3">
                    <p class="judul-footer">
                        INSTAFEED
                    </p>
                    <div class="row pb-1">
                        <div class="col-md-12">
                            <a data-fancybox="gallery" href="images/i4.jpg"><img src="images/i4.jpg"></a>
                            <a data-fancybox="gallery" href="images/i1.jpg"><img src="images/i1.jpg"></a>
                            <a data-fancybox="gallery" href="images/i2.jpg"><img src="images/i2.jpg"></a>
                            <a data-fancybox="gallery" href="images/i3.jpg"><img src="images/i3.jpg"></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <a data-fancybox="gallery" href="images/i5.jpg"><img src="images/i5.jpg"></a>
                            <a data-fancybox="gallery" href="images/i6.jpg"><img src="images/i6.jpg"></a>
                            <a data-fancybox="gallery" href="images/i7.jpg"><img src="images/i7.jpg"></a>
                            <a data-fancybox="gallery" href="images/i8.jpg"><img src="images/i8.jpg"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-5">
                <div class="col-md-6">
                    <p class="mb-0">
                        Copyright &copy; All Rights Reserved | by <span style="color: rgb(192, 101, 192)">Hiliyah Azizah - Fajar Septiadi</span>
                    </p>
                </div>
                <div class="col-md-6 text-right">
                    <a href=""><i class="fab fa-facebook-f sosmed"></i></a>
                    <a href=""><i class="fab fa-twitter sosmed ml-3"></i></a>
                    <a href=""><i class="fab fa-instagram sosmed ml-3"></i></a>
                    <a href=""><i class="fab fa-youtube sosmed ml-3"></i></a>
                </div>
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