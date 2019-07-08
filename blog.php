<body>
    <!-- BANNER -->
    <?php include "includes/banner-blog.php"; ?>
    <!-- CONTENT CATEGORY-->
    <div class="container-fluid bg-light">
        <div class="container content-blog pb-5">
            <?php include "includes/category.php"; ?>
            <div class="row">
                <div class="col-md-8">
                    <?php if (isset($_GET["blog"]) || isset($_GET["page"])) {include "includes/latest-post.php";}
                    else if (isset($_GET["category"]) || isset($_GET["page-category"])) {include "includes/post-category.php";}
                    else {include "includes/latest-post.php";}
                    ?>
                </div>
                <div class="col-md-4">
                    <?php include "includes/aside-blog.php"; ?>
                </div>
            </div>
        </div>
    </div>