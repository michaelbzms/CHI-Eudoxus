<?php include("php/control/sessionManager.php") ?>
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
        <div class="specific_navbar bg-light">
            <div class="navbar-specific-item">
                <div class="icon_title">Είμαι... ►</div>
            </div>
            <div id="student" class="navbar-specific-item">
                <div class="icon_title add_bg_dark">Φοιτητής</div>
            </div>
            <div id="publisher" class="navbar-specific-item">
                <div class="icon_title add_bg_dark">Εκδότης</div>
            </div>
            <div id="secretary" class="navbar-specific-item">
                <div class="icon_title add_bg_dark">Υπάλληλος<br>Γραμματείας<br>Τμήματος</div>
            </div>
            <div id="distribution_point" class="navbar-specific-item">
                <div class="icon_title add_bg_dark">Υπάλληλος<br>Σημείου<br>Διανομής</div>
            </div>
            <div id="student_options" class="blue-options-list">
                <h3>...Φοιτητής</h3>
                <div class="option-list">
                    <a id="register_student" class="option-item" href="php/register_page.php?userType=student">
                        <div class="option-title">Εγγραφή Φοιτητή</div>
                    </a>
                    <?php if ( isset($_SESSION['studentHasMadeBookDecl']) && $_SESSION['studentHasMadeBookDecl'] ) { ?>
                        <a id="book_declaration" class="option-item" href="php/book_declaration3.php">
                            <div class="option-title">Δήλωση Συγγραμμάτων</div>
                        </a>
                    <?php } elseif ( isset($_SESSION['bookDeclBooksArr']) && $_SESSION['bookDeclBooksArr'] != [] ) { ?>
                        <a id="book_declaration" class="option-item" href="php/book_declaration2.php">
                            <div class="option-title">Δήλωση Συγγραμμάτων</div>
                        </a>
                    <?php } else { ?>
                        <a id="book_declaration" class="option-item" href="php/book_declaration1.php">
                            <div class="option-title">Δήλωση Συγγραμμάτων</div>
                        </a>
                    <?php } ?>
                    <a id="book_exchange" class="option-item" href="php/notimplemented.php">
                        <div class="option-title">Ανταλλαγή Συγγραμμάτων</div>
                    </a>
                    <a id="previous_declarations" class="option-item" href="php/notimplemented.php">
                        <div class="option-title">Προηγούμενες Δηλώσεις</div>
                    </a>
                    <a id="student_info" class="option-item" href="php/student_info.php">
                        <div class="option-title">Επισκόπηση Στοιχείων Φοιτητή</div>
                    </a>
                </div>
            </div>
            <div id="publisher_options" class="orange-options-list">
                <h3>...Εκδότης</h3>
                <div class="option-list">
                    <a id="register_publisher" class="option-item" href="php/register_page.php?userType=publisher">
                        <div class="option-title">Εγγραφή Εκδότη</div>
                    </a>
                    <a id="publisher_app" class="option-item" href="php/notimplemented.php">
                        <div class="option-title">Διαχείριση Συγγραμμάτων</div>
                    </a>
                    <a id="price"class="option-item" href="php/notimpkemented.php">
                        <div class="option-title">Κοστολόγιση</div>
                    </a>
                    <a id="publisher_info" class="option-item" href="php/notimplemented.php">
                        <div class="option-title">Επισκόπηση Στοιχείων Εκδότη</div>
                    </a>
                </div>
            </div>
            <div id="secretary_options" class="blue-options-list">
                <h3>...Υπάλληλος Γραμματίας Τμήματος</h3>
                <div class="option-list">
                    <a id="register_secr" class="option-item" href="php/register_page.php?userType=secretary">
                        <div class="option-title">Εγγραφή Γραμματείας</div>
                    </a>
                    <a id="secretary_app" class="option-item" href="php/secretary_app.php">
                        <div class="option-title">Διαχείριση Μαθημάτων/Συγγραμμάτων</div>
                    </a>
                    <a id="secretary_info" class="option-item" href="php/secretary_info.php">
                        <div class="option-title">Επισκόπηση Στοιχείων Γραμματείας</div>
                    </a>
                </div>
            </div>
            <div id="distribution_point_options" class="orange-options-list">
                <h3>...Υπάλληλος Σημείου Διανομής</h3>
                <div class="option-list">
                    <a id="register_dist" class="option-item" href="php/register_page.php?userType=distPoint">
                        <div class="option-title">Εγγραφή Σημείου Διανομής</div>
                    </a>
                    <a id="book_delivery" class="option-item" href="php/notimplemented.php">
                        <div class="option-title">Παράδοση Συγγραμμάτων</div>
                    </a>
                    <a id="dist_point_info" class="option-item" href="php/notimplemented.php">
                        <div class="option-title">Επισκόπηση Στοιχείων Σημείου Διανομής</div>
                    </a>
                </div>
            </div>
            <div id="back_button" style="display: none">◄ Πίσω</div> <!-- style override important -->
        </div>
        <?php include("footer.html"); ?>
    </div>
    <script src="/sdi1500102_sdi1500165/javascript/specific_navbar_control.js"></script>
</body>
</html>