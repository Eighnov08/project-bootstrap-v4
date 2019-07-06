<?php
    include "includes/config.php";
    include "includes/head.php";
    include "function/function_tgl_indo.php";
    date_default_timezone_set("Asia/Jakarta");
?>
 


 
<body>
    <!-- HEADER -->
    <?php include "includes/header.php"; ?>
    <!-- NAVIGATION -->
    <?php include "includes/nav.php"; ?>
    <!-- CONTENT -->
    <?php
        if (isset($_GET["home"]) || isset($_GET["page"])) {include "home.php";}
        else if (isset($_GET["about"])) {include "about.php";}
        else if (isset($_GET["service"])) {include "services.php";}
        else if (isset($_GET["gallery"])) {include "gallery.php";}
        else if (isset($_GET["blog"] )) {include "blog.php";}
        else if (isset($_GET["blog-detail"] )) {include "blog-detail.php";}
        else if (isset($_GET["contact"])) {include "contact.php";}
        else {include "home.php";}
    ?>
    <!-- FOOTER -->
    <?php include "includes/footer.php"; ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>

<?php
    mysqli_close($connection);
?>