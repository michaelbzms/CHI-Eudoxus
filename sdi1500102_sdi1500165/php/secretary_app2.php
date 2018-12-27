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
            <a class="breadcrump_item last_item" href="/sdi1500102_sdi1500165/php/secretary_app2.php">Υποβολή Μαθημάτων</a>
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
                            echo "<li><span class=\"id_span\">[" . $class[0] . "]</span><h2>" . $class[1] . "</h2><br><span class=\"field_span\"><label>Καθηγητής/ές: </label>" . $class[2] . "</span><span class=\"field_span\"><label>Εξάμηνο: </label>" . $class[3] . "o</span><br><label>Σχόλια: </label>" . $class[4] . "</li>\n";
                        }
                    ?>
                    <div id="ajax_target_div">
                        
                    </div>
                    <li> <!-- AJAX form to add new classes -->
                        <div class="container">
                            <div class="row">
                                <div class="col-2" style="vertical-align: top">
                                    <img id="plus_img" src="/sdi1500102_sdi1500165/images/add_green_plus.png"/>
                                </div>
                                <div class="col-10">
                                    <form id="add_class_form" class="container">
                                        <div class="row mb-2">
                                            <div class="col-5">Τίτλος Μαθήματος:</div>
                                            <div class="col-7"><input class="form-control" type="text" name="title" id="title_param" required/></div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-5">Κωδικός Μαθήματος:</div>
                                            <div class="col-7"><input class="form-control" type="text" name="id" id="id_param" required/></div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-5">Διδάσκοντας/ες:</div>
                                            <div class="col-7"><input class="form-control" type="text" name="professors" id="prof_param" required/></div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-5">Εξάμηνο:</div>
                                            <div class="col-7">
                                                <select class="form-control" name="semester" form="add_class_form" id="semester_param">
                                                    <?php $maxSemesters = 8; // TODO: get from db
                                                        for ( $i = 1 ; $i <= 8 ; $i++ ) { ?>
                                                            <option value="<?php echo $i ?>"><?php echo $i ?>ο</option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-5">Σχόλια</div>
                                            <div class="col-7"><textarea class="form-control" name="comments" id="comment_param"></textarea></div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-5"></div>
                                            <div class="col-7"><button type="submit" class="btn btn-success">Προσθήκη</button></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                </ol>
                <div class="text-center">
                    <button id="submit_PS" class="btn btn-dark hover_orange m-4"><img src="/sdi1500102_sdi1500165/images/checkGreen.png" style="width:20px; height:20px; margin-right: 10px"/>Υποβολή Μαθημάτων ΠΣ</button>
                </div>
            </div>
        <?php } ?>
        <?php include("../footer.html"); ?>
    </div>
    <script src="/sdi1500102_sdi1500165/javascript/secretary.js"></script>
<body>
</head>