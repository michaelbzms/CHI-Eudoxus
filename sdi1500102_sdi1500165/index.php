<!DOCTYPE html>
<?php $active_page = "HomePage"; ?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Eudoxus</title>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="/sdi1500102_sdi1500165/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/sdi1500102_sdi1500165/css/index.css"/>
    <link rel="stylesheet" type="text/css" href="/sdi1500102_sdi1500165/css/navbar.css"/>
	<link rel="stylesheet" type="text/css" href="/sdi1500102_sdi1500165/css/lib/bootstrap.min.css"/>
	<!-- JS -->
	<script src="/sdi1500102_sdi1500165/javascript/lib/jquery-3.3.1.min.js"></script>
	<script src="/sdi1500102_sdi1500165/javascript/lib/bootstrap.min.js"></script>
</head>
<body>
    <div class="main-container">
        <?php include("php/headlines.php") ?>
        <!-- common navbar for all without login -->
        <?php include("php/general_navbar.php"); ?>
        <!-- specific navbar for each category -->
        <div class="specific_navbar">
            <div class="navbar-specific-item">
                <div class="icon_title">Είμαι... ►</div>
            </div>
            <div id="student" class="navbar-specific-item">
                <div class="icon_title">Φοιτητής</div>
            </div>
            <div id="publisher" class="navbar-specific-item">
                <div class="icon_title">Εκδότης</div>
            </div>
            <div id="secretary" class="navbar-specific-item">
                <div class="icon_title">Υπάλληλος<br>Γραμματείας<br>Τμήματος</div>
            </div>
            <div id="distribution_point" class="navbar-specific-item">
                <div class="icon_title">Υπάλληλος<br>Σημείου<br>Διανομής</div>
            </div>
            <div id="other" class="navbar-specific-item">
                <div class="icon_title">Άλλο</div>
            </div>
        </div>
        <?php include("footer.html"); ?>
    </div>
</body>
</html>