<?php
    include("../control/sessionManager.php");
    include("../bookModal.php"); 
    $conn = connectToDB();
    if (! $conn) {
        die("Database connection failed: " . $conn->connect_error);
    }
?>
<div class="text-center">
    TODO: PRINT BOOKS HERE
</div>
<?php 
    $conn->close();
?>
