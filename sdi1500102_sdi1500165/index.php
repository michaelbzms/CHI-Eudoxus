<!DOCTYPE html>
<?php $active_page = "HomePage"; ?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Eudoxus</title>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="/sdi1500102_sdi1500165/css/index.css"/>
    <link rel="stylesheet" type="text/css" href="/sdi1500102_sdi1500165/css/navbar.css"/>
	<link rel="stylesheet" type="text/css" href="/sdi1500102_sdi1500165/css/lib/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="/sdi1500102_sdi1500165/css/lib/bootstrap-grid.min.css"/>
	<!-- JS -->
	<script src="/sdi1500102_sdi1500165/javascript/lib/jquery-3.3.1.min.js"></script>
	<script src="/sdi1500102_sdi1500165/javascript/lib/bootstrap.min.js"></script>
</head>
<body>
    <div class="main-container">
        <a href="/sdi1500102_sdi1500165/index.php"><img id="logo" src="/sdi1500102_sdi1500165/images/logo.png"/></a>
        <h1 id="title">Ηλεκτρονική Υπηρεσία<br>Ολοκληρωμένης Διαχείρισης<br>Συγγραμμάτων και Λοιπών Βοηθημάτων</h1>
        <img id="slogan" src="/sdi1500102_sdi1500165/images/slogan.png"/>
        <!-- Global search bar -->
        <img id="global_help" src="/sdi1500102_sdi1500165/images/help_icon.png"/><!-- add onClick() event -->
        <form id="global_search_form" action="#" method="get">
            <input class="form-control" type="text" name="global_search_str" placeholder="Αναζήτηση">
            <!-- submit with 'enter' -->
        </form>
        <!-- common navbar for all without login -->
        <?php include("php/general_navbar.php"); ?>
        <!-- specific navbar for each category -->
        <div class="specific_navbar">
            <div class="navbar-specific-item">
                <div id="iam">Είμαι... ►</div>
            </div>
            <div class="navbar-specific-item">
                <div id="student">Φοιτητής</div>
            </div>
            <div class="navbar-specific-item">
                <div id="publisher">Εκδότης</div>
            </div>
            <div class="navbar-specific-item">
                <div id="secretary">Υπάλληλος<br>Γραμματείας<br>Τμήματος</div>
            </div>
            <div class="navbar-specific-item">
                <div id="distribution_point">Υπάλληλος<br>Σημείου<br>Διανομής</div>
            </div>
            <div class="navbar-specific-item">
                <div id="other">Άλλο</div>
            </div>
        </div>
        <?php include "footer.html"; ?>
    </div>
</body>
</html>