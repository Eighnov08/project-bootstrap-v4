<?php 
    if(isset($_GET["customer-delete"])){
        $customer_id = $_GET["customer-delete"];
        mysqli_query($connection, "DELETE FROM customer WHERE id = '$customer_id'");
        header("location:index.php?customer");
    }
?>