<?php include("control/sessionManager.php") ?>
<!DOCTYPE html>
<?php $active_page = "None"; ?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Eudoxus</title>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="/sdi1500102_sdi1500165/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/sdi1500102_sdi1500165/css/navbar.css"/>
	<link rel="stylesheet" type="text/css" href="/sdi1500102_sdi1500165/css/lib/bootstrap.min.css"/>
	<!-- JS -->
	<script src="/sdi1500102_sdi1500165/javascript/lib/jquery-3.3.1.min.js"></script>
	<script src="/sdi1500102_sdi1500165/javascript/lib/bootstrap.min.js"></script>
</head>
<body>
    <div class="main-container">
        <?php include("headlines.php") ?>
        <!-- common navbar for all without login -->
        <?php include("general_navbar.php"); ?>
        <div class="p-3 alert-warning text-center" style="border-radius: 10px; margin: 30px 20vw 20px 20vw;">
            <h2>⚠ Not implemented</h2>
            <p>This function is not implemented for the purposes of this assignment</p>
        </div>
        <div class="text-center">
            <img src="/sdi1500102_sdi1500165/images/oops-sign.jpg"/>
        </div>
        <!-- TODO: add back button -->
        <?php include("../footer.html"); ?>
    </div>
</body>
</html>