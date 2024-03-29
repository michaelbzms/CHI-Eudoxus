<?php $loginFailed = include("control/sessionManager.php"); ?>
<!DOCTYPE html>
<?php $active_page = "SecretaryApp"; ?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Eudoxus</title>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="/sdi1500102_sdi1500165/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/sdi1500102_sdi1500165/css/secretary.css"/>
    <link rel="stylesheet" type="text/css" href="/sdi1500102_sdi1500165/css/navbar.css"/>
	<link rel="stylesheet" type="text/css" href="/sdi1500102_sdi1500165/css/lib/bootstrap.min.css"/>
	<!-- JS -->
	<script src="/sdi1500102_sdi1500165/javascript/lib/jquery-3.3.1.min.js"></script>
	<script src="/sdi1500102_sdi1500165/javascript/lib/popper.min.js"></script>
    <script src="/sdi1500102_sdi1500165/javascript/lib/bootstrap.min.js"></script>
</head>
<body>
    <div class="main-container">
        <?php include("headlines.php") ?>
        <?php include("general_navbar.php"); ?>
        <nav class="my_breadcrump">
            <a class="breadcrump_item" href="/sdi1500102_sdi1500165/index.php">Αρχική Σελίδα</a> > 
            <p class="breadcrump_item">Γραμματείες</p> > 
            <a class="breadcrump_item last_item" href="/sdi1500102_sdi1500165/php/secretary_app.php">Διαχείριση Μαθημάτων/Συγγραμμάτων (1/3)</a>
        </nav>
        <?php 
            $conn = connectToDB();
            if (! $conn) {
                die("Database connection failed: " . $conn->connect_error);
            }
            $hasSession = isset($_SESSION['userID']);
            if ( $hasSession && isset($_SESSION['userType']) && $_SESSION['userType'] == 'secretary' ) {
                $secretary_id = $_SESSION['userID'];
                $sqlQuery = "SELECT 1 FROM UNIVERSITY_CLASSES WHERE SECRETARIES_id = $secretary_id;";
                $result = $conn->query($sqlQuery);
                $alreadyUploadedPS  = $result->num_rows > 0;
        ?>
            <h2 class="orange_header mb-4">Διαχείριση Μαθημάτων/Συγγραμμάτων
                <a href="/sdi1500102_sdi1500165/php/help_secretary.php" target="_blank">
                    <img class="help_tooltip" src="/sdi1500102_sdi1500165/images/help_icon.png" data-toggle="tooltip" data-placement="right" title="Δείτε την σελίδα βοήθειας για γραμματείες."/>
                </a>
            </h2>
            <?php if  ( $alreadyUploadedPS ) {  ?>
                <div class="text-center">
                    <p>
                        Έχετε ήδη κάνει μία υποβολή για το νέο Πρόγραμμα Σπουδών του τρέχοντος ακαδημαϊκού έτους.<br>
                        Θέλετε να υποβάλετε νέα ή να τροποποιήσετε αυτήν;
                    </p>
                    <div class="mt-4">
                        <button id="submit_new" class="d-inline-block btn btn-danger">Νέα Υποβολή</button>
                        <button id="modify" class="d-inline-block btn btn-dark hover_orange">Τροποποίηση Τρέχουσας Υποβολής</button>
                    </div>
                </div>
            <?php } else { ?>
                <div class="text-center">
                    <p>Θέλω να υποβάλω το νέο Πρόγραμμα Σπουδών...</p><br>
                    <div class="option_size d-inline-block border border-dark p-3">
                        <p>Ανεβάζοντας κατάλληλο .xml αρχείο: 
                            <a href="/sdi1500102_sdi1500165/php/notimplemented.php" target="_blank">
                                <img class="help_tooltip" src="/sdi1500102_sdi1500165/images/help_icon.png" data-toggle="tooltip" data-placement="right" title="Δείτε την απαιτούμενη μορφή του .xml αρχείου."/>
                            </a>
                        </p>
                        <form id="PS_xml_input_form" method="post" action="/sdi1500102_sdi1500165/php/notimplemented.php">
                            <div class="d-flex justify-content-between mt-1">
                                <div class="custom-file d-inline-block">
                                    <input id="PS_xml_input" class="custom-file-input" type="file" name="file_input" accept=".xml">
                                    <label class="custom-file-label" for="inputGroupFile01"><i>Choose .xml file</i></label>
                                </div>
                                <div class="d-inline-block text-right ml-3">
                                    <input type="submit" value="Υποβολή" class="btn btn-dark hover_orange">
                                </div>
                            </div>
                        </form>
                    </div>
                    <br>
                    <div id="or">ή</div>
                    <br>
                    <a href="/sdi1500102_sdi1500165/php/secretary_app2.php">
                        <button class="d-inline-block btn btn-lg btn-dark hover_orange">Συμπληρώνοντας αντίστοιχες φόρμες</button>
                    </a>
                </div>
        <?php   } 
            } else if (!$hasSession){
                include("../notconnected.html");
            } else {
                include("../unauthorized.html");
            } 
            include("../footer.html"); 
            $conn->close();
        ?>
    </div>
    <script src="/sdi1500102_sdi1500165/javascript/secretary.js"></script>
    <script src="/sdi1500102_sdi1500165/javascript/tooltipInit.js"></script>
    <script src="/sdi1500102_sdi1500165/javascript/formResubmissionPrevention.js"></script>
    <?php include("control/loginFailureHandler.php"); ?>
<body>
</head>