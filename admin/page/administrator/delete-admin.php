<?php
    if(isset($_GET["delete-admin"])){
        $admin_id = $_GET["delete-admin"];
        mysqli_query($connection, "DELETE FROM admin WHERE id = '$admin_id'");
        header("location:index.php?administrator");
    }
?>