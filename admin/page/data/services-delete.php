<?php 
    if(isset($_GET["services-delete"])){
        $services_id = $_GET["services-delete"];
        mysqli_query($connection, "DELETE FROM service WHERE id = '$services_id'");
        header("location:index.php?services");
    }
?>