<?php $loginFailed = include("control/sessionManager.php"); ?>
<!DOCTYPE html>
<?php $active_page = "FAQ"; ?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Eudoxus</title>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="/sdi1500102_sdi1500165/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/sdi1500102_sdi1500165/css/navbar.css"/>
	<link rel="stylesheet" type="text/css" href="/sdi1500102_sdi1500165/css/lib/bootstrap.min.css"/>
    <style>
        /* TODO: dark font? Also move this in a .css? */
        .orange_nav a {
            color: #c06d00;
        }

        .orange_nav a:hover {
            color: rgb(231, 150, 0);
        }

        .tab-content a {
            color: #1c6fc7;
        }

        .tab-content a:hover {
            color: rgb(231, 150, 0);
        }
    </style>
	<!-- JS -->
	<script src="/sdi1500102_sdi1500165/javascript/lib/jquery-3.3.1.min.js"></script>
	<script src="/sdi1500102_sdi1500165/javascript/lib/popper.min.js"></script>
    <script src="/sdi1500102_sdi1500165/javascript/lib/bootstrap.min.js"></script>
</head>
<body style="overflow-y: scroll;">
    <div class="main-container">
        <?php include("headlines.php") ?>
        <?php include("general_navbar.php"); ?>
        <nav class="my_breadcrump">
            <a class="breadcrump_item" href="/sdi1500102_sdi1500165/index.php">Αρχική Σελίδα</a> > 
            <p class="breadcrump_item">Πληροφορίες</p> > 
            <a class="breadcrump_item last_item" href="/sdi1500102_sdi1500165/php/faq.php">FAQ</a>
        </nav>
        <div class="m-2 text_div">
            <h2 class="mb-3">Συχνές Ερωτήσεις</h2>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs orange_nav">
                <li class="nav-item pl-2">
                    <a class="nav-link active" data-toggle="tab" href="#student">Φοιτητές</a>
                </li>
                <li class="nav-item pl-2">
                    <a class="nav-link" data-toggle="tab" href="#publisher">Εκδότες</a>
                </li>
                <li class="nav-item pl-2">
                    <a class="nav-link" data-toggle="tab" href="#secretary">Γραμματείες</a>
                </li>
                <li class="nav-item pl-2">
                    <a class="nav-link" data-toggle="tab" href="#distPoint">Σημεία Διανομής</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane p-3 active" id="student">
                    <div id="accordionStudent">
                        <div class="card">
                            <div class="card-header">
                                <a class="collapsed card-link" data-toggle="collapse" href="#collapse1Student">
                                    Μπορεί ο φοιτητής να δηλώσει και να παραλάβει συγγράμματα για μαθήματα/ θεματικές ενότητες προηγούμενων εξαμήνων;
                                </a>
                            </div>
                            <div id="collapse1Student" class="collapse">
                                <div class="card-body text-justify">
                                    Ναι, εφόσον ο φοιτητής δεν έχει εξεταστεί επιτυχώς στο συγκεκριμένο μάθημα/θεματική ενότητα και δεν έχει παραλάβει ήδη σύγγραμμα για το μάθημα/θεματική ενότητα αυτό τα προηγούμενα εξάμηνα.<br>
                                    Ακόμα και αν το σύγγραμμα του μαθήματος/θεματικής ενότητας έχει αλλάξει σε περίπτωση που ο φοιτητής έχει παραλάβει ήδη σύγγραμμα για το εν λόγω μάθημα/θεματική ενότητα στο παρελθόν δεν δικαιούται να παραλάβει νέο σύγγραμμα στο ίδιο μάθημα/θεματική ενότητα.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <a class="collapsed card-link" data-toggle="collapse" href="#collapse2Student">
                                    Τι σημαίνει όταν δίπλα σε κάποιο Σύγγραμμα εμφανίζεται η ένδειξη "Διαθεσιμότητα: 0";
                                </a>
                            </div>
                            <div id="collapse2Student" class="collapse">
                                <div class="card-body text-justify">
                                    Σημαίνει πως δεν υπάρχουν αντίτυπα του Συγγράμματος στο Σημείο Διανομής και ότι ο Εκδότης θα στείλει σύντομα νέα αντίτυπα. Με την άφιξη των νέων αντιτύπων η εφαρμογή ενημερώνεται αυτόματα, οπότε ο Φοιτητής μπορεί ανατρέχοντας στην εφαρμογή να ενημερώνεται για το διαθέσιμο απόθεμα.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <a class="collapsed card-link" data-toggle="collapse" href="#collapse3Student">
                                    Σε περίπτωση απώλειας του προσωπικού κωδικού PIN, πως μπορεί να γίνει η ανάκτησή του;
                                </a>
                            </div>
                            <div id="collapse3Student" class="collapse">
                                <div class="card-body text-justify">
                                    Ο φοιτητής έχει τη δυνατότητα να επιλέξει επαναποστολή του κωδικού PIN από την εφαρμογή του στο "Εύδοξος".  Συγκεκριμένα, από την αρχική σελίδα της εφαρμογής του φοιτητή επιλέγει: "Δηλώσεις Συγγραμμάτων" -> "Ενημέρωση τρέχουσας δήλωσης" ή "Επισκόπηση" για παλιότερη δήλωση -> "Συνέχεια" και στη νέα οθόνη μπορεί να επιλέξει "Υπενθύμιση του αριθμού ΡΙΝ". Το PIN θα εμφανιστεί στην οθόνη του φοιτητή και θα σταλεί και στο e-mail που έχει ορίσει στο "Εύδοξος".
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <a class="collapsed card-link" data-toggle="collapse" href="#collapse4Student">
                                    Οι φοιτητές που υποβάλλουν αίτηση μετεγγραφής σε ποιο τμήμα δικαιούνται να δηλώσουν Συγγράμματα;
                                </a>
                            </div>
                            <div id="collapse4Student" class="collapse">
                                <div class="card-body text-justify">
                                    Οι φοιτητές ή σπουδαστές, που υποβάλλουν αίτηση μετεγγραφής στις Γραμματείες των Τμημάτων και επέλεξαν διδακτικά συγγράμματα μέσω του πληροφοριακού συστήματος “ΕΥΔΟΞΟΣ”, τα οποία προμηθεύτηκαν ενόσω φοιτούσαν ή σπούδαζαν στο Τμήμα προέλευσης, έχουν την δυνατότητα αφότου μετεγγραφούν στο Τμήμα υποδοχής να επιλέξουν εκ νέου συγγράμματα μέσω του ιδίου πληροφοριακού συστήματος. Οι μετεγγραφόμενοι φοιτητές ή σπουδαστές, που εξετάστηκαν ήδη στο Τμήμα προέλευσης, οφείλουν να δηλώσουν στο πληροφοριακό σύστημα μόνο τον αριθμό των μαθημάτων για τα οποία έχουν παραλάβει συγγράμματα και κατά την κρίση της Γενικής Συνέλευσης του Τμήματος υποδοχής απαλλάσσονται από την εξέταση τους. Εάν οι υποβάλλοντες αίτηση μετεγγραφής βρίσκονται στο πρώτο εξάμηνο σπουδών και δεν έχουν εξεταστεί στο τμήμα προέλευσης, τότε θα δηλώνουν μηδενικό αριθμό μαθημάτων.<br>
                                    Οι φοιτητές ή σπουδαστές,  που υποβάλλουν ηλεκτρονικά αίτηση μετεγγραφής, δικαιούνται να επιλέξουν συγγράμματα μέσω του ίδιου πληροφοριακού συστήματος, μόνο αφού εγγραφούν στο Τμήμα υποδοχής.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <a class="collapsed card-link" data-toggle="collapse" href="#collapse5Student">
                                    Μπορεί ο φοιτητής να επιλέξει Συγγράμματα και για άλλη περίοδο;
                                </a>
                            </div>
                            <div id="collapse5Student" class="collapse">
                                <div class="card-body text-justify">
                                    Όχι, ο φοιτητής μπορεί να δηλώσει μόνο συγγράμματα/σειρές συγγραμμάτων για τα μαθήματα τα οποία ανήκουν στην τρέχουσα περίοδο, χειμερινή ή εαρινή.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <a class="collapsed card-link" data-toggle="collapse" href="#collapse6Student">
                                    Εάν αλλάξει γνώμη ο φοιτητής για το Σύγγραμμα που έχει δηλώσει μπορεί να αλλάξει τη δήλωσή του;
                                </a>
                            </div>
                            <div id="collapse6Student" class="collapse">
                                <div class="card-body text-justify">
                                    Εφ' όσον δεν έχει γίνει παραλαβή Συγγράμματος για ένα μάθημα, ο φοιτητής διατηρεί το δικαίωμα να αλλάξει την επιλογή του και στο "Εύδοξος", εντός της σχετικής προθεσμίας. Επισημαίνεται ότι για τα συγγράμματα που αποστέλλονται μέσω ταχυμεταφοράς, αλλαγή επιλογής δεν μπορεί να γίνει μετά την εκκίνηση αποστολής του βιβλίου από τον Εκδότη.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <a class="collapsed card-link" data-toggle="collapse" href="#collapse7Student">
                                   Πόσα βιβλία μπορεί να δηλώσει στο σύστημα και να παραλάβει ένας φοιτητής για το τρέχον εξάμηνο;
                                </a>
                            </div>
                            <div id="collapse7Student" class="collapse">
                                <div class="card-body text-justify">
                                    Ο αριθμός των Συγγραμμάτων που μπορεί να παραλάβει ένας φοιτητής κάθε εξάμηνο καθορίζεται από τη σχολή του.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <a class="collapsed card-link" data-toggle="collapse" href="#collapse8Student">
                                    Σε περίπτωση που ένας φοιτητής δεν παραλάβει το Σύγγραμμα για ένα μάθημα που δήλωσε, χάνει το δικαίωμα να επιλέξει Σύγγραμμα για το μάθημα σε άλλο ακαδημαϊκό έτος;
                                </a>
                            </div>
                            <div id="collapse8Student" class="collapse">
                                <div class="card-body text-justify">
                                    Εφ' όσον ένα Σύγγραμμα δεν έχει παραληφθεί, ο φοιτητής διατηρεί το δικαίωμα επιλογής Συγγράμματος στο μέλλον, εφόσον το συμπεριλάβει εκ νέου στη δήλωση μαθημάτων του.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane p-3 fade" id="publisher">
                    <div id="accordionPublisher">
                        <div class="card">
                            <div class="card-header">
                                <a class="collapsed card-link" data-toggle="collapse" href="#collapse1Publisher">
                                    Είναι δυνατή η διάθεση Συγγραμμάτων χωρίς να γίνει χρήση της υπηρεσίας «Εύδοξος»;
                                </a>
                            </div>
                            <div id="collapse1Publisher" class="collapse">
                                <div class="card-body text-justify">
                                    Απαραίτητη για τη διάθεση Συγγραμμάτων στα Ιδρύματα της Τριτοβάθμιας Εκπαίδευσης από το ακαδημαϊκό έτος 2010-2011 είναι η χρήση της ηλεκτρονικής υπηρεσίας «Εύδοξος». Επισημαίνεται ότι στο Εύδοξος δεν συμμετέχουν οι Στρατιωτικές Σχολές. Από το ακαδημαϊκό έτος 2016-17 στην διανομή συγγραμμάτων μέσω του Εύδοξος συμμετέχει και το Ελληνικό Ανοιχτό Πανεπιστήμιο.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <a class="collapsed card-link" data-toggle="collapse" href="#collapse2Publisher">
                                    Ποιοι έχουν δικαίωμα να καταχωρίσουν Συγγράμματα προς διάθεση;
                                </a>
                            </div>
                            <div id="collapse2Publisher" class="collapse">
                                <div class="card-body text-justify">
                                    Δικαίωμα καταχώρισης Συγγραμμάτων προς διάθεση σε Πανεπιστήμια,Τ.Ε.Ι., Α.Ε.Α. και Ε.Α.Π. έχουν όσοι είναι δικαιούχοι ή/και έχουν αποκτήσει νομίμως τα δικαιώματα διανομής των αντίστοιχων Συγγραμμάτων.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <a class="collapsed card-link" data-toggle="collapse" href="#collapse3Publisher">
                                    Πρέπει να δηλώνονται ταυτόχρονα τα Συγγράμματα που αφορούν το χειμερινό και το εαρινό εξάμηνο;
                                </a>
                            </div>
                            <div id="collapse3Publisher" class="collapse">
                                <div class="card-body text-justify">
                                    Ναι. Οι Εκδότες που επιθυμούν να συμμετάσχουν στη διανομή οφείλουν να δηλώσουν τα συγγράμματατα για όλο το Ακαδημαϊκό Έτος εντός των περιόδων που ορίζει το Υπουργείο πριν την έναρξη της διανομής κάθε Ακαδημαϊκού Έτους.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <a class="collapsed card-link" data-toggle="collapse" href="#collapse4Publisher">
                                    Υπάρχει περιορισμός στο πλήθος ή στο περιεχόμενο των Συγγραμμάτων που μπορούν να καταχωριστούν στην Κεντρική Βάση Δεδομένων;
                                </a>
                            </div>
                            <div id="collapse4Publisher" class="collapse">
                                <div class="card-body text-justify">
                                    Δεν υπάρχει περιορισμός ως προς τον αριθμό ή το περιεχόμενο των Συγγραμμάτων που μπορεί ένας Εκδότης να καταχωρίσει.<br>
                                    Επισημαίνεται ότι είναι άσκοπη η καταχώριση Συγγραμμάτων που δεν παρουσιάζουν διδακτικό ενδιαφέρον αφού για να διατεθούν στους φοιτητές είναι αναγκαίο να προταθούν κατόπιν και από το Διδακτικό Προσωπικό.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <a class="collapsed card-link" data-toggle="collapse" href="#collapse5Publisher">
                                    Μπορούν να διατεθούν ξενόγλωσσα Συγγράμματα μέσω του "Εύδοξος";
                                </a>
                            </div>
                            <div id="collapse5Publisher" class="collapse">
                                <div class="card-body text-justify">
                                    Βεβαίως, αρκεί να υπάρξει κάποιος Διαθέτης ο οποίος να έχει το δικαίωμα διανομής τους στην Ελλάδα.<br>
                                    Ειδικά για τα ξενόγλωσσα Συγγράμματα σε τμήματα Ξένων Φιλολογιών, υπάρχει ειδικό καθεστώς για την προμήθεια αυτών των Συγγραμμάτων από το οικείο ίδρυμα μέσω μειοδοτικών διαγωνισμών.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <a class="collapsed card-link" data-toggle="collapse" href="#collapse6Publisher">
                                    Πως μπορεί ο εκδότης να ορίσει Σημεία Διανομής για τα συγγράμματά του που έχουν επιλεγεί από ακαδημαϊκά Τμήματα?
                                </a>
                            </div>
                            <div id="collapse6Publisher" class="collapse">
                                <div class="card-body text-justify">
                                    Θα πρέπει μέσα από την εφαρμογή Εκδοτών του "Εύδοξος" ο εκδότης α)να επιλέξει τα συνεργαζόμενα Σημεία Διανομής (καρτέλα "Σημεία Διανομής") και β) να τα αντιστοιχίσει ξεχωριστά σε κάθε επιλογή βιβλίου ανά μάθημα το επιθυμητό Σημείο Διανομής (καρτέλα "Επιλεγμένα Βιβλία").
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <a class="collapsed card-link" data-toggle="collapse" href="#collapse7Publisher">
                                    Είναι δυνατόν να χρησιμοποιηθεί το ίδιο Σημείο Διανομής από δύο ή περισσότερους Εκδότες;
                                </a>
                            </div>
                            <div id="collapse7Publisher" class="collapse">
                                <div class="card-body text-justify">
                                    Βεβαίως, αρκεί να συμφωνεί ο υπεύθυνος του Σημείου Διανομής και να δηλωθεί το συγκεκριμένο Σημείο Διανομής από τους αντίστοιχους Εκδότες.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <a class="collapsed card-link" data-toggle="collapse" href="#collapse8Publisher">
                                    Μετά τη λήξη της διανομής των Συγγραμμάτων χρειάζεται ο Εκδότης να καταθέσει τις λίστες των Συγγραμμάτων που παρέλαβαν οι φοιτητές στο Υπουργείο Παιδείας;
                                </a>
                            </div>
                            <div id="collapse8Publisher" class="collapse">
                                <div class="card-body text-justify">
                                    Όχι. Το Υπουργείο Παιδείας έχει τη δυνατότητα να παρακολουθεί την πραγματική πορεία διαθέσης όλων των Συγγραμμάτων σε πραγματικό χρόνο.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <a class="collapsed card-link" data-toggle="collapse" href="#collapse9Publisher">
                                    Σε περίπτωση απώλειας του Ονόματος Χρήστη ή/και του Κωδικού Πρόσβασης τι μπορώ να κάνω;
                                </a>
                            </div>
                            <div id="collapse9Publisher" class="collapse">
                                <div class="card-body text-justify">
                                    Από τη σελίδα όπου συνδέεστε με το ΚΠΣ μπορείτε να επιλέξετε «Υπενθύμιση Κωδικού Πρόσβασης». Στη συνέχεια αφού πληκτρολογήσετε τη διεύθυνση email που είχατε καταχωρίσει κατά την εγγραφή σας στο σύστημα, θα σας αποσταλεί το Όνομα Χρήστη σας και ένας νέος Κωδικός Πρόσβασης άμεσα.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane p-3 fade" id="secretary">
                    <div id="accordionSecretary">
                        <div class="card">
                            <div class="card-header">
                                <a class="collapsed card-link" data-toggle="collapse" href="#collapse1Secretary">
                                    Τι πρέπει να προσέξω για την ασφάλειά μου;
                                </a>
                            </div>
                            <div id="collapse1Secretary" class="collapse">
                                <div class="card-body text-justify">
                                    Για τη δική σας ασφάλεια σας συνιστούμε να επιλέξετε έναν συνδυασμό από γράμματα, αριθμούς και σύμβολα για να δημιουργήσετε ένα μοναδικό κωδικό πρόσβασης που δεν σχετίζεται με τα προσωπικά σας στοιχεία. Μπορείτε για παράδειγμα να επιλέξτε μια τυχαία λέξη ή φράση και εισαγάγετε αριθμούς ή σύμβολα στην αρχή, στη μέση και στο τέλος (για παράδειγμα "m1awra1ap3tal0uda"). Η χρήση απλών λέξεων ή φράσεων όπως "password" ή "12345", θα πρέπει να αποφεύγεται. Επίσης, σε περίπτωση που συνδέεστε στο σύστημα από δημόσιο υπολογιστή, βεβαιωθείτε ότι πάντα πατάτε το κουμπί "Αποσύνδεση" πάνω δεξιά στην οθόνη κατά την έξοδό σας και κλείνετε το φυλλομετρητή.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <a class="collapsed card-link" data-toggle="collapse" href="#collapse2Secretary">
                                    Πως καταχωρίζονται τα μαθήματα που έχουν Θεωρητικό και Εργαστηριακό μέρος;
                                </a>
                            </div>
                            <div id="collapse2Secretary" class="collapse">
                                <div class="card-body text-justify">
                                    Κάθε τέτοιο μάθημα/θεματική ενότητα θα πρέπει να καταχωριστεί οπωσδήποτε ως ενιαίο μάθημα/θεματική ενότητα στο Εύδοξος.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <a class="collapsed card-link" data-toggle="collapse" href="#collapse3Secretary">
                                    Μπορούν να διατεθούν ξενόγλωσσα Συγγράμματα μέσω του "Εύδοξος";
                                </a>
                            </div>
                            <div id="collapse3Secretary" class="collapse">
                                <div class="card-body text-justify">
                                    Βεβαίως, αρκεί να υπάρξει κάποιος Διαθέτης ο οποίος να έχει το δικαίωμα διανομής τους στην Ελλάδα.<br>
                                    Ειδικά για τα ξενόγλωσσα Συγγράμματα σε τμήματα Ξένων Φιλολογιών, υπάρχει ειδικό καθεστώς για την προμήθεια αυτών των Συγγραμμάτων από το οικείο ίδρυμα μέσω μειοδοτικών διαγωνισμών.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane p-3 fade" id="distPoint">Ο Εύδοξος δεν είχε ερωτήσεις εδώ. ¯\_(ツ)_/¯</div>
            </div>
        </div>
        <br>
        <?php include("../footer.html"); ?>
    </div>
    <script src="/sdi1500102_sdi1500165/javascript/tooltipInit.js"></script>
    <script src="/sdi1500102_sdi1500165/javascript/formResubmissionPrevention.js"></script>
    <?php include("control/loginFailureHandler.php"); ?>
</body>
</html>