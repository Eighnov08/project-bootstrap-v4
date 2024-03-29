<?php
    ob_start();
    session_start();
    if(!isset($_SESSION["admin_id"])) header("location:login.php");
    include "../includes/config.php";
    include "../function/function_tgl_indo.php";
    date_default_timezone_set("Asia/Jakarta");
?>

<!DOCTYPE html>
<html>
<?php include("include/head.php") ?>
<body>
    <div id="wrapper">
        <?php include("include/header.php") ?>
        <div id="page-wrapper">
            <?php
            if (isset($_GET["category"])) include("page/blog/category.php");
            else if (isset($_GET["category-update"])) include("page/blog/category-update.php");
            else if (isset($_GET["category-delete"])) include("page/blog/category-delete.php");
            else if (isset($_GET["post"])) include("page/blog/post.php");
            else if (isset($_GET["post-delete"])) include("page/blog/post-delete.php");
            else if (isset($_GET["post-update"])) include("page/blog/post-update.php");
            else if (isset($_GET["comment"])) include("page/blog/comment.php");
            else if (isset($_GET["comment-delete"])) include("page/blog/comment-delete.php");
            else if (isset($_GET["comment-update"])) include("page/blog/comment-update.php");
            else if (isset($_GET["comment-approve"])) include("page/blog/comment-approve.php");
            else if (isset($_GET["customer"])) include("page/data/customer.php");
            else if (isset($_GET["customer-delete"])) include("page/data/customer-delete.php");
            else if (isset($_GET["customer-update"])) include("page/data/customer-update.php");
            else if (isset($_GET["contact"])) include("page/data/contact.php");
            else if (isset($_GET["contact-delete"])) include("page/data/contact-delete.php");
            else if (isset($_GET["contact-update"])) include("page/data/contact-update.php");
            else if (isset($_GET["services"])) include("page/data/services.php");
            else if (isset($_GET["services-delete"])) include("page/data/services-delete.php");
            else if (isset($_GET["services-update"])) include("page/data/services-update.php");
            else if (isset($_GET["user"])) include("page/user/index.php");
            else if (isset($_GET["administrator"])) include("page/administrator/index.php");
            else if (isset($_GET["delete-admin"])) include("page/administrator/delete-admin.php");
            else if (isset($_GET["update-admin"])) include("page/administrator/update-admin.php");
            else include("page/home/index.php");
            ?>
        </div>
    </div>
    <?php include("include/footer.php") ?>
</body>
</html>

<?php
    mysqli_close($connection);
    ob_end_flush();
?>