<!DOCTYPE html>
<?php $active_page = "StudentInfo"; ?>
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
        <?php include("general_navbar.php"); ?>
        <nav class="my_breadcrump">
            <a class="breadcrump_item" href="/sdi1500102_sdi1500165/index.php">Αρχική Σελίδα</a> > 
            <p class="breadcrump_item">Φοιτητές</p> > 
            <a class="breadcrump_item last_item" href="/sdi1500102_sdi1500165/php/student_info.php">Επισκόπιση Στοιχείων Φοιτητή</a>
        </nav>
        <div>
            <br>
            <h2 class="orange_header"><?php print "Ελπινίκη Παπαδοπούλου"; ?></h2>
            <div class="centered_bordered_field">
                <label>Ίδρυμα:</label> <?php print "ΕΘΝΙΚΟ ΚΑΙ ΚΑΠΟΔΙΣΤΡΙΑΚΟ ΠΑΝΕΠΙΣΤΗΜΙΟ ΑΘΗΝΩΝ"; ?> <br>
                <label>Σχολή:</label> <?php print "ΝΟΜΙΚΗ ΣΧΟΛΗ"; ?> <br>
                <label>Τμήμα:</label> <?php print "ΝΟΜΙΚΗ"; ?> <br>
                <label>Κωδικός Εύδοξου:</label>  <?php print "12345678"; ?> <br>
                <label>Αριθμός Μητρώου:</label> <?php print "1119201800123"; ?> <br>
                <label>Email:</label> <?php print "elpiniki@gmail.com"; ?> <img id="modify_email" class="image_button" src="/sdi1500102_sdi1500165/images/pencil.png"/> <br> 
                <label>Τηλέφωνο:</label> <?php print "6912345678"; ?> <img id="modify_phone" class="image_button" src="/sdi1500102_sdi1500165/images/pencil.png"/> <br>
                <label>Τρέχον Εξάμηνο:</label> <?php print "1"; ?> <br>
            </div>
        </div>
        <?php include("../footer.html"); ?>
    </div>
</body>
</html>