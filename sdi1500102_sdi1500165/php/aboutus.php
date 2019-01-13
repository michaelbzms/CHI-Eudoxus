<?php $loginFailed = include("control/sessionManager.php"); ?>
<!DOCTYPE html>
<?php $active_page = "AboutUs"; ?>
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
	<script src="/sdi1500102_sdi1500165/javascript/lib/popper.min.js"></script>
    <script src="/sdi1500102_sdi1500165/javascript/lib/bootstrap.min.js"></script>
</head>
<body>
    <div class="main-container">
        <?php include("headlines.php") ?>
        <?php include("general_navbar.php"); ?>
        <nav class="my_breadcrump">
            <a class="breadcrump_item" href="/sdi1500102_sdi1500165/index.php">Αρχική Σελίδα</a> > 
            <p class="breadcrump_item">Πληροφορίες</p> > 
            <a class="breadcrump_item last_item" href="/sdi1500102_sdi1500165/php/aboutus.php">About Us</a>
        </nav>
        <div class="m-2 text_div">
            <h2>About Us</h2>
            <h3>Τι είναι ο Εύδοξος;</h3>       
            <div class="row">
                <div class="col-7">
                    <p> 
                        Πρόκειται για μία πρωτοποριακή υπηρεσία για την άμεση και ολοκληρωμένη παροχή των Συγγραμμάτων των προπτυχιακών φοιτητών των Πανεπιστημίων, των Τεχνολογικών Εκπαιδευτικών Ιδρυμάτων (Τ.Ε.Ι.) και των Ανώτατων Εκκλησιαστικών Ακαδημιών (Α.Ε.Α.) της επικράτειας καθώς και του Ελληνικού Ανοιχτού Πανεπιστημίου (Ε.Α.Π.). <br> <br>
                        Το έργο εκτελείται για πρώτη φορά το ακαδημαϊκό έτος 2010-11 για όλους τους προπτυχιακούς φοιτητές όλων των Πανεπιστημίων/ΤΕΙ της χώρας. Από το ακαδημαϊκό έτος 2016-2017, στη διανομή των ακαδημαϊκών συγγραμμάτων συμμετέχουν και τα προπτυχιακά τμήματα του Ελληνικού Ανοικτού Πανεπιστημίου. <br>
                        <br>
                        Η διαδικασία είναι πλήρως αυτοματοποιημένη και προσφέρει:<br>
                        (α) Πλήρη ενημέρωση στους φοιτητές για τα παρεχόμενα Συγγράμματα σε κάθε μάθημα<br>
                        (β) Δυνατότητα άμεσης παραλαβής των Συγγραμμάτων και<br>
                        (γ) Αποτελεσματικούς μηχανισμούς για την ταχεία αποζημίωση των Εκδοτών και για την αποτροπή της καταχρηστικής εκμετάλλευσης των δημόσιων πόρων<br>
                    </p>
                </div>
                <div class="col-5 d-inline-block text-center">
                    <iframe src="https://www.youtube.com/embed/BkqmS9ZCvSE" class="border-0" style="height:100%; width:90%;" allowfullscreen="allowfullscreen">
                    </iframe>
                </div>
            </div>
            <br>
            <h3>Περιγραφή φάσεων/διαδικασιών</h3>
            <p>
                1. Κάθε Εκδότης περνάει αρχικά μία διαδικασία πιστοποίησης προκειμένου να αποκτήσει πρόσβαση στο σύστημα. Έπειτα  εντός του προβλεπόμενου χρονικού διαστήματος που ορίζεται από το Υπουργείο Παιδείας, μπορεί να προβαίνει στην καταχώριση και τη διαρκή ενημέρωση των στοιχείων των Συγγραμμάτων του στην Κεντρική Βάση Δεδομένων (ΚΒΔ).<br>
                2. Οι διδάσκοντες των Τμημάτων έχουν πρόσβαση στην Κεντρική Βάση των Συγγραμμάτων και μπορούν να επιλέξουν ποια Συγγράμματα θα προτείνουν για το μάθημά τους ή τις θεματικές ενότητες.<br>
                3. Τα Συγγράμματα/Σειρές Συγγραμμάτων (για τους φοιτητές του Ε.Α.Π.) που εγκρίνονται από τα αρμόδια ακαδημαϊκά όργανα, καταχωρίζονται από τη Γραμματεία του κάθε Τμήματος στην ΚΒΔ, σε αντιστοιχία με τα μαθήματα/θεματικές ενότητες του Προγράμματος Σπουδών.<br>
                4.  Ο φοιτητής εισέρχεται σε μία κεντρική ιστοσελίδα του Κεντρικού Πληροφοριακού Συστήματος (ΚΠΣ) από όπου γίνεται η πιστοποίησή του (μέσω Shibboleth). Εκεί ενημερώνεται για τα εγκεκριμένα Συγγράμματα/Σειρές Συγγραμμάτων των μαθήματων/θεματικών ενοτήτων του Τμήματός του και επιλέγει τα Συγγράμματα/Σειρές συγγραμμάτων που δικαιούται.<br>
                5. Ο φοιτητής λαμβάνει άμεσα από το ΚΠΣ ένα e-mail με τον κωδικό ΡΙΝ, με τον οποίο και παραλαμβάνει τα Συγγράμματα που επέλεξε.<br>
                6. Το Υπουργείο Παιδείας ενημερώνεται σε πραγματικό χρόνο για την πορεία του έργου και μεριμνά για την ταχεία αποζημίωση των εκδοτών.<br>
            </p>
            <br>
            <h3>Αναμενόμενα Πλεονεκτήματα</h3>
            <p>
                Α. Επιταχύνεται η διαδικασία παραλαβής Συγγραμμάτων από τους φοιτητές.<br>
                Β. Ελαχιστοποιείται ο διαχειριστικός φόρτος στις Γραμματείες των Τμημάτων.<br>
                Γ. Απλοποιείται η σχέση του Υπουργείου Παιδείας με τους Εκδότες, ελαχιστοποιώντας την ανάγκη ανταλλαγής εγγράφων - λιστών.<br>
                Δ. Ο χρόνος που μεσολαβεί από την εγγραφή του φοιτητή μέχρι την παραλαβή του Συγγράμματος, μπορεί να περιοριστεί σε ελάχιστες εργάσιμες ημέρες από περισσότερους από δύο μήνες σήμερα.<br>
                Ε. Η αποζημίωση των Εκδοτών μπορεί να γίνει αμέσως μετά την ολοκλήρωση της παράδοσης των Συγγραμμάτων, ενώ σήμερα πραγματοποιείται τουλάχιστον 12 μήνες μετά τη διανομή.<br>
                ΣΤ. Ελαχιστοποιούνται τα περιθώρια για καταχρηστική εκμετάλλευση δημόσιων πόρων.<br>
                Ζ. Εξοικονομούνται σημαντικοί ανθρώπινοι πόροι στις υπηρεσίες των Πανεπιστημίων/ΤΕΙ και του Υπουργείου Παιδείας.<br>
                Η. Δημιουργούνται οι προϋποθέσεις για την ασφαλή και σταδιακή μετάβαση στην εποχή του ηλεκτρονικού Συγγράμματος.<br>
            </p>
        </div>
        <br>
        <div class="text-center">Follow us on twitter: <a id="twitter" href="http://www.twitter.com/eudoxusgr" target="_blank"><img class="ml-2" src="/sdi1500102_sdi1500165/images/twitter.png" alt="Follow eudoxusgr on Twitter"></a></div>
        <br>
        <?php include("../footer.html"); ?>
    </div>
    <script src="/sdi1500102_sdi1500165/javascript/tooltipInit.js"></script>
    <script src="/sdi1500102_sdi1500165/javascript/formResubmissionPrevention.js"></script>
    <?php include("control/loginFailureHandler.php"); ?>
</body>
</html>