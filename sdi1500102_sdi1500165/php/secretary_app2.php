<?php include("control/sessionManager.php") ?>
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
        <?php 
            $conn = connectToDB();
            if (! $conn) {
                die("Database connection failed: " . mysqli_connect_error());
            }
            $hasSession = isset($_SESSION['userID']);
            if ( $hasSession && isset($_SESSION['userType']) && $_SESSION['userType'] == 'secretary' ) {
                $secretary_id = $_SESSION['userID'];
                $num_of_semesters = getNumberOfSemesters($conn, $secretary_id);
        ?>
            <h2 class="orange_header mb-4">Υποβολή Μαθημάτων Προγράμματος Σπουδών</h2>
            <div id="classes_list">
                <p>Προσθήκη / Αφαίρεση / Επεξεργασία Μαθημάτων στο Πρόγραμμα Σπουδών:</p><br>
                <ol>
                    <?php // TODO: get already submitted classes FROM DB for this secretary's PS into <li>s 
                        $sqlQuery = "SELECT idClass, title, code, professors, semester, comments FROM UNIVERSITY_CLASSES WHERE SECRETARIES_id = $secretary_id ORDER BY semester;";
                        $result = $conn->query($sqlQuery);
                        $classes = [];
                        if ($result->num_rows > 0) {
                            while( $row = $result->fetch_assoc() ){
                                $classes[$row["idClass"]] = [ $row["code"], $row["title"], $row["professors"], $row["semester"], $row["comments"] ];
                            }
                        }
                        foreach ($classes as $class_id => $class) {                         
                            echo <<<EOT
                            <li value="$class_id">
                                <div class="item">
                                    <span class="id_span">[$class[0]]</span><h2>$class[1]</h2><img class="delete_box" src="/sdi1500102_sdi1500165/images/red_cross_box.png"/><img class="edit_box" src="/sdi1500102_sdi1500165/images/yellow_pencil_box.png"/><br>
                                    <span class="field_span"><label>Καθηγητής/ές: </label>$class[2]</span><span class="field_span"><label>Εξάμηνο: </label>$class[3]o</span><br>
                                    <label>Σχόλια: </label>$class[4]
                                </div>
                                <div class="container" style="display: none">
                                    <div class="row">
                                        <div class="col-2" style="vertical-align: top">
                                            <img class="plus_img" src="/sdi1500102_sdi1500165/images/yellow_edit_pencil.png"/>
                                        </div>
                                        <div class="col-10">
                                            <form class="edit_class_form container">
                                                <div class="row mb-2">
                                                    <div class="col-5">Τίτλος Μαθήματος:</div>
                                                    <div class="col-7"><input class="form-control title_param" type="text" name="title" value="$class[1]" required/></div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-5">Κωδικός Μαθήματος:</div>
                                                    <div class="col-7"><input class="form-control id_param" type="text" name="id" value="$class[0]" required/></div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-5">Διδάσκοντας/ες:</div>
                                                    <div class="col-7"><input class="form-control prof_param" type="text" name="professors" value="$class[2]" required/></div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-5">Εξάμηνο:</div>
                                                    <div class="col-7">
                                                        <select class="form-control semester_param" name="semester" form="add_class_form">
EOT;
                                                                for ( $i = 1 ; $i <= $num_of_semesters ; $i++ ) { ?>
                                                                    <option value="<?php echo $i ?>" <?php if ( $i == $class[3] ) echo " selected=\"selected\" " ?>><?php echo $i ?>ο</option>
                                                            <?php }
                                                            echo <<<EOT
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-5">Σχόλια</div>
                                                    <div class="col-7"><textarea class="form-control comment_param" name="comments" value="$class[4]"></textarea></div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-5"></div>
                                                    <div class="col-7">
                                                        <button type="submit" class="btn btn-warning">Αποθήκευση</button>
                                                        <button class="btn btn-secondary cancel_edit">Ακύρωση</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
EOT;
                        }
                    ?>
                    <div id="ajax_target_div">
                        
                    </div>
                    <li> <!-- AJAX form to add new classes -->
                        <div class="container">
                            <div class="row">
                                <div class="col-2" style="vertical-align: top">
                                    <img class="plus_img" src="/sdi1500102_sdi1500165/images/add_green_plus.png"/>
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
                                                    <?php
                                                        for ( $i = 1 ; $i <= $num_of_semesters ; $i++ ) { ?>
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
        <?php 
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
<body>
</head>