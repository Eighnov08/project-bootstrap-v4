<?php 
    if(isset($_GET["contact-delete"])){
        $contact_id = $_GET["contact-delete"];
        mysqli_query($connection, "DELETE FROM contact WHERE id = '$contact_id'");
        header("location:index.php?contact");
    }
?>