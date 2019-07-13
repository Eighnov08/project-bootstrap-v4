<?php
    $menu_about = "About Us";
    $menu_service = "Services";
    $menu_gallery = "Gallery";
    $menu_contact = "Contact";
    $menu_blog_detail = "Blog Details Page";
?>

<div class="container-fluid banner">
    <div class="container text-center py-5">
        <div class="row">
            <div class="col-md-12">
                <h1>
                    <?php if(isset($_GET["about"])){
                        echo $menu_about;
                    } else if(isset($_GET["service"])){
                        echo $menu_service;
                    } else if(isset($_GET["gallery"])){
                        echo $menu_gallery;
                    } else if(isset($_GET["contact"])){
                        echo $menu_contact;
                    } else if(isset($_GET["blog-detail"])){
                        echo $menu_blog_detail;
                    } else if(isset($_GET["blog-detail-cat"])){
                        echo $menu_blog_detail;
                    }?>
                </h1>
                <p class="m-0">
                    Home &nbsp;<i class="fas fa-arrow-right"></i>&nbsp; 
                    <?php if(isset($_GET["about"])){
                        echo $menu_about;
                    } else if(isset($_GET["service"])){
                        echo $menu_service;
                    } else if(isset($_GET["gallery"])){
                        echo $menu_gallery;
                    } else if(isset($_GET["contact"])){
                        echo $menu_contact;
                    } else if(isset($_GET["blog-detail"])){
                        echo "Blog &nbsp;<i class='fas fa-arrow-right'></i>&nbsp; Blog Details Page";;
                    } else if(isset($_GET["blog-detail-cat"])){
                        echo "Blog &nbsp;<i class='fas fa-arrow-right'></i>&nbsp; Blog Details Page";;
                    }?>
                </p>
            </div>
        </div>
    </div>
</div>