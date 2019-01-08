<?php include("control/sessionManager.php") ?>
<!DOCTYPE html>
<?php $active_page = "BookDeclaration"; ?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Eudoxus</title>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="/sdi1500102_sdi1500165/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/sdi1500102_sdi1500165/css/navbar.css"/>
    <link rel="stylesheet" type="text/css" href="/sdi1500102_sdi1500165/css/books.css"/>
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
            <a class="breadcrump_item last_item" href="/sdi1500102_sdi1500165/php/book_declaration1.php">Δήλωση Συγγραμμάτων</a>
        </nav>
        <?php 
            $conn = connectToDB();
            if (! $conn) {
                die("Database connection failed: " . $conn->connect_error);
            }
            $hasSession = isset($_SESSION['userID']);
            if ( $hasSession && isset($_SESSION['userType']) && $_SESSION['userType'] == 'student' ) {
        ?>
            <h2 class="orange_header m-3"><?php print "Δήλωση Συγγραμμάτων"; ?></h2>
            <?php if ( /* NotInSession */ false ) { // TODO: check session ?>
                <div class="form-group text-center m-4">
                    <select class="form-control d-inline-block w-25" id="uni-options" onchange="getDpts();">
                        <?php
                            $Unis = getAllUnis($conn);
                            $Departments = [];
                            foreach ($Unis as $uni) {
                                $Departments[] = getAllUniDepartments($conn, $uni);
                                echo "<option value=\"$uni\">$uni</option>";
                            } 
                        ?>
                    </select>
                    <select class="form-control d-inline-block w-25" id="dpt-options">
                        <!--?php
                            foreach ($Departments[1] as $dpt) {
                                echo "<option>$dpt</option>";
                            } 
                        ?-->
                    </select>
                    <script>
                    function getDpts() {
                        var str='';
                        var val=document.getElementById('uni-options');
                        for (i=0;i< val.length;i++) { 
                            if(val[i].selected){
                                str += val[i].value + ','; 
                            }
                        }         
                        var str=str.slice(0,str.length -1);
                            
                        $.ajax({          
                                type: "GET",
                                url: "get_uni_dpts.php",
                                data: 'uni='+str,
                                success: function(data){
                                    $("#dpt-options").html(data);
                                }
                        });
                    }
                    </script>
                </div>
            <?php } else {
                // get these from session:
                $userUni = "Εθνικό και Καποδιστριακό Πανεπιστήμιο Αθηνών";
                $userDpt = "Τμήμα Νομικής";
            } ?>
            <form action="/sdi1500102_sdi1500165/php/book_declaration2.php" method="POST">
                <div class="row">
                    <div class="col-2">
                        <div class="nav flex-column nav-pills mt-3 ml-4" id="v-pills-tab" role="tablist">
                            <?php
                                $semNum = getDptNumberOfSemesters($conn, $userDpt);
                                $i = 1;         // TODO: get period
                                $Semesters = [];
                                for (; $i <= $semNum; $i += 2) {
                                    $Semesters[] = $i . "ο Εξάμηνο";
                                }
                                $i = 1;
                                foreach ($Semesters as $sem){
                                    if ($i == 1 || $i == 2) {
                                        echo "<a class=\"nav-link active\" id=\"v-pills-tab1-tab\" data-toggle=\"pill\" href=\"#v-pills-tab1\" role=\"tab\" aria-expanded=\"true\"><h6>$sem</h6></a>";
                                    } else {
                                        echo "<a class=\"nav-link\" id=\"v-pills-tab$i-tab\" data-toggle=\"pill\" href=\"#v-pills-tab$i\" role=\"tab\" aria-expanded=\"true\"><h6>$sem</h6></a>";
                                    }
                                    $i += 2;
                                } 
                            ?>
                        </div>
                    </div>
                    <div class="col-10">
                        <div class="tab-content mr-4" id="v-pills-tabContent">
                            <?php
                                $i = 1;
                                foreach ($Semesters as $sem){
                                    if ($i == 1 || $i == 2) {
                                        echo "<div class=\"tab-pane fade show active\" id=\"v-pills-tab1\" role=\"tabpanel\">";
                                    } else {
                                        echo "<div class=\"tab-pane fade\" id=\"v-pills-tab$i\" role=\"tabpanel\">";
                                    }
                                    echo "<div id=\"accordion$i\">";
                                    $semClasses = getDptSemClasses($conn, $userDpt, $i);
                                    if ($semClasses == []) echo "<h6><i>Δεν έχουν δηλωθεί μαθήματα για αυτό το εξάμηνο.</i></h6>";
                                    foreach ($semClasses as $class) {
                                        if ( isset($class['FREE_CLASS_SECRETARIES_id']) ) $freeClassDpt = "&ensp;(" . getDptForSecretary($conn, $class['FREE_CLASS_SECRETARIES_id']) . ")";
                                        else $freeClassDpt = "";
                                        echo <<<EOT
                                            <div class="card">
                                                <div class="card-header">
                                                    <a class="collapsed card-link" data-toggle="collapse" href="#collapse{$class['idClass']}">
                                                        <h5 class="d-inline-block">{$class['title']}</h5><h6 class="d-inline-block">$freeClassDpt</h6>
                                                    </a>
                                                </div>
                                                <div id="collapse{$class['idClass']}" class="collapse">
                                                    <div class="card-body text-justify">
EOT;
                                        $classBooks = getClassBooks($conn, $class['idClass']);
                                        if ($classBooks == []) echo "<h6><i>Δεν προσφέρονται συγγράμματα για αυτό το μάθημα.</i></h6>";
                                        $j = 1;
                                        foreach ($classBooks as $book) {
                                            echo <<<EOT
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="book{$class['idClass']}" id="book{$class['idClass']}_$j">
                                                    <label class="form-check-label" for="book{$class['idClass']}_$j">
                                                        <strong>[{$book['idBook']}]:</strong> <span class="bookModalSpan" data-toggle="modal" data-target="#book{$book['idBook']}">{$book['title']}</span> | {$book['authors']}
                                                    </label>
                                                </div>
EOT;
                                            $j++;
                                        }
                                        echo "      </div>
                                                </div>
                                            </div>";
                                    }
                                    echo "  </div>
                                        </div>";
                                    $i += 2;
                                } 
                            ?>
                        </div>
                    </div>
                </div>
                <br>
                <div class="text-center">
                    <button type="submit" class="btn btn-dark hover_orange">Συνέχεια</button>
                </div>         
            </form>
            <?php
                include("bookModal.php");
                $i = 1;
                foreach ($Semesters as $sem) {
                    $semClasses = getDptSemClasses($conn, $userDpt, $i);
                    foreach ($semClasses as $class) {
                        $classBooks = getClassBooks($conn, $class['idClass']);
                        foreach ($classBooks as $book) {
                            bookModal($conn, $book);
                        }
                    }
                    $i++;
                }
            ?>
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
</body>
</html>