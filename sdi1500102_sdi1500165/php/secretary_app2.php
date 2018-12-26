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
	<script src="/sdi1500102_sdi1500165/javascript/lib/bootstrap.min.js"></script>
</head>
<body>
    <div class="main-container">
        <?php include("headlines.php") ?>
        <?php include("general_navbar.php"); ?>
        <nav class="my_breadcrump">
            <a class="breadcrump_item" href="/sdi1500102_sdi1500165/index.php">Αρχική Σελίδα</a> > 
            <p class="breadcrump_item">Γραμματείες</p> > 
            <a class="breadcrump_item" href="/sdi1500102_sdi1500165/php/secretary_app.php">Διαχείριση Μαθημάτων/Συγγραμμάτων</a> >
            <a class="breadcrump_item last_item" href="/sdi1500102_sdi1500165/php/secretary_app2.php">Υποβολή Μαθημάτων Προγράμματος Σπουδών</a>
        </nav>
        <h2 class="orange_header mb-4">Υποβολή Μαθημάτων Προγράμματος Σπουδών</h2>
        <?php 
            // check in all secretary_app.php pages for safety (and also backend)
            $alreadyUploadedPS = False;  // TODO: check in with db
            if  ( $alreadyUploadedPS ) { 
        ?>
            <div class="text-center">
                <p>
                    Έχετε ήδη κάνει μία υποβολή για το νέο Πρόγραμμα Σπουδών για το τρέχον ακαδημαϊκό έτος.
                    Θέλετε να τροποποιήσετε αυτήν ή να υποβάλετε νέα;
                </p>
                <div class="mt-4">
                    <button id="modify" class="d-inline-block btn btn-dark hover_orange">Τροποποίηση Τρέχουσας Υποβολής</button>
                    <button id="submit_new" class="d-inline-block btn btn-dark hover_orange">Νέα Υποβολή</button>
                </div>
            </div>
        <?php } else { ?>
            <div id="classes_list">
                <p>Προσθήκη/Αφαίρεση Μαθημάτων στο Πρόγραμμα Σπουδών:</p><br>
                <ol>
                    <?php // TODO: get already submitted classes FROM DB for this secretary's PS into <li>s 
                        $classes = [[12101, "Γραμμική Άλγεβρα", "E.Ράπτης", 1, ""], 
                                    [12102, "Πιθανότητες Ι", "Ν.Παπαδάτος", 1, ""] ];
                        foreach ($classes as $class) {
                            echo "<li>[" . $class[0] . "]<h2>" . $class[1] . "</h2><br>Καθηγητής/ές: " . $class[2] . " Εξάμηνο: " . $class[3] . "o Σχόλια: " . $class[4] . "</li>\n";
                        }
                    ?>
                    <div id="ajax_target_div">
                        
                    </div>
                    <li> <!-- AJAX form to add new classes -->
                        <form id="add_class_form">
                            <label>Τίτλος Μαθήματος:</label>
                            <input type="text" name="title" id="title_param"/>
                            <br>
                            <label>Κωδικός Μαθήματος:</label>
                            <input type="text" name="id" id="id_param"/>
                            <br>
                            <label>Διδάσκοντες:</label>
                            <input type="text" name="professors" id="prof_param"/>
                            <br>
                            <label>Εξάμηνο:</label>
                            <select name="semester" form="add_class_form" id="semester_param">
                                <?php $maxSemesters = 8; // TODO: get from db
                                      for ( $i = 1 ; $i <= 8 ; $i++ ) { ?>
                                        <option value="sem<?php echo $i ?>"><?php echo $i ?>ο</option>
                                <?php } ?>
                            </select>
                            <br>
                            <label>Σχόλια</label>
                            <textarea name="comments" id="comment_param"></textarea>
                            <br>
                            <label></label>
                            <button type="submit" class="btn btn-success">Προσθήκη</button>
                        </form>
                    </li>
                </ol>
                <div class="text-center">
                    <button id="submit_PS" class="btn btn-dark hover_orange m-4">Υποβολή Μαθημάτων ΠΣ</button>
                </div>
            </div>
        <?php } ?>
        <?php include("../footer.html"); ?>
    </div>
    <script src="/sdi1500102_sdi1500165/javascript/secretary.js"></script>
<body>
</head>