<?php $loginFailed = include("control/sessionManager.php"); ?>
<?php 
    if ( isset($_POST['loginSubmit']) && isset($_SESSION['userType']) && $_SESSION['userType'] == "student" && $_SESSION['bookDeclClassesArr'] != [] && $_SESSION['bookDeclBooksArr'] != []) {
        header("Location: /sdi1500102_sdi1500165/php/book_declaration3.php");
        exit();
    }
?>
<!DOCTYPE html>
<?php $active_page = "BookDeclaration"; ?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Eudoxus</title>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="/sdi1500102_sdi1500165/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/sdi1500102_sdi1500165/css/navbar.css"/>
    <link rel="stylesheet" type="text/css" href="/sdi1500102_sdi1500165/css/student.css"/>
    <link rel="stylesheet" type="text/css" href="/sdi1500102_sdi1500165/css/books.css"/>
	<link rel="stylesheet" type="text/css" href="/sdi1500102_sdi1500165/css/lib/bootstrap.min.css"/>
	<!-- JS -->
	<script src="/sdi1500102_sdi1500165/javascript/lib/jquery-3.3.1.min.js"></script>
	<script src="/sdi1500102_sdi1500165/javascript/lib/bootstrap.min.js"></script>
    <script src="/sdi1500102_sdi1500165/javascript/student.js"></script>
</head>
<body style="overflow-y: scroll;">  <!-- just so that view doesnt "move" at overflow (which will almost certainly happen at this page) -->
    <div class="main-container">
        <?php include("headlines.php") ?>
        <?php include("general_navbar.php"); ?>
        <nav class="my_breadcrump">
            <a class="breadcrump_item" href="/sdi1500102_sdi1500165/index.php">Αρχική Σελίδα</a> > 
            <p class="breadcrump_item">Φοιτητές</p> > 
            <a class="breadcrump_item last_item" href="/sdi1500102_sdi1500165/php/book_declaration1.php">Δήλωση Συγγραμμάτων (1/3)</a>
        </nav>
        <?php 
            $conn = connectToDB();
            if (! $conn) {
                die("Database connection failed: " . $conn->connect_error);
            }
        ?>
            <h2 class="orange_header mt-3 mb-4">Δήλωση Συγγραμμάτων</h2>
                <div class="container">
            <?php
                $isLoggedInStudent = isset($_SESSION['userID']) && isset($_SESSION['userType']) && $_SESSION['userType'] == 'student';
                if (! $isLoggedInStudent) { ?>
                    <form id="getUniAndDepForm" action="/sdi1500102_sdi1500165/php/book_declaration1.php" method="POST">
                        <div class="form-group text-center">
                            <div class="d-inline-block mr-1" style="width: 410px;">
                                <p class="text-left text-secondary mb-1 ml-2">Σχολή</p>
                                <select class="form-control d-inline-block" id="unis" name="uniSelected" required onchange="showDptDropdown()">
                                <?php
                                    $Unis = getAllUnis($conn);
                                    $Departments = [];
                                    $i = 0;
                                    foreach ($Unis as $uni) {
                                       $Departments[] = getAllUniDepartments($conn, $uni);
                                       echo "<option value=\"$uni\" data-myindex=\"$i\">$uni</option>";
                                       $i++;
                                    } 
                                ?>
                                </select>
                            </div>
                            <div class="d-inline-block ml-1" style="width: 410px;">
                                <p class="text-left text-secondary mb-1 ml-2">Τμήμα</p>
                                <?php
                                    $i = 0;
                                    foreach ($Unis as $uni) {
                                        echo "<select class=\"form-control d-inline-block department_select\" id=\"dpts_uni{$i}\" name=\"dptSelected\" style=\"display: none!important;\">";
                                        echo "<option value=\"\" disabled selected hidden></option>";
                                        foreach ($Departments[$i] as $dpt) {
                                            echo "<option value=\"$dpt\">$dpt</option>";
                                        }
                                        echo "</select>";
                                        $i++;
                                    }
                                ?>
                            </div>
                            <!-- button is hidden and triggered as pressed when department or uni has changed! -->
                            <div class="text-center m-2" style="display: none !important;">
                                <button id="submit_btn" type="submit" class="btn btn-dark hover_orange" name="uniSelectSubmit">Αναζήτηση</button>
                            </div>
                            <script>
                                $(".department_select").on("change", function(){
                                    $("#submit_btn").trigger("click");
                                });

                                $(".unis").on("change", function(){
                                    $("#submit_btn").trigger("click");
                                });
                            </script>
                        </div>
                    </form>
                    <br>
                    <?php   
                        if ( !isset($_SERVER['HTTP_REFERER']) || $_SERVER['HTTP_REFERER'] != "http://localhost/sdi1500102_sdi1500165/php/book_declaration2.php") {
                            unset($_SESSION['bookDeclUni']);
                            unset($_SESSION['bookDeclDpt']);
                        } else { ?>
                            <script> 
                                $("#unis").val(<?php echo '"' . $_SESSION['bookDeclUni'] . '"'; ?>); 
                                $("[name=dptSelected]").val(<?php echo '"' . $_SESSION['bookDeclDpt'] . '"'; ?>);
                            </script>
                    <?php
                        }
                        // After form handling:
                        if ( isset($_POST['uniSelectSubmit']) ) {
                            $_SESSION['bookDeclUni'] = $_POST['uniSelected'];
                            $_SESSION['bookDeclDpt'] = $_POST['dptSelected'];
                            $_SESSION['bookDeclClassesArr'] = [];
                            $_SESSION['bookDeclBooksArr'] = [];
                            ?>
                            <script> 
                                $("#unis").val(<?php echo '"' . $_SESSION['bookDeclUni'] . '"'; ?>); 
                                $("[name=dptSelected]").val(<?php echo '"' . $_SESSION['bookDeclDpt'] . '"'; ?>);
                            </script>
                        <?php }
                    ?>
            <?php
                } else {   // in session user
                    $_SESSION['bookDeclUni'] = $_SESSION['studentUni'];
                    $_SESSION['bookDeclDpt'] = $_SESSION['studentDpt'];
                }
                if ( isset($_SESSION['bookDeclUni']) && isset($_SESSION['bookDeclDpt']) ) {
            ?>
                    <form action="/sdi1500102_sdi1500165/php/book_declaration2.php" method="POST" id="bookDeclFormPage1" >
                        <div class="row">
                            <div class="col-2 pr-0">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist">
                                <?php
                                    $semNum = getDptNumberOfSemesters($conn, $_SESSION['bookDeclUni'], $_SESSION['bookDeclDpt']);
                                    $i = 1;         // TODO: get period (that's what she said)
                                    $Semesters = [];
                                    for (; $i <= $semNum; $i += 2) {
                                        $Semesters[] = $i . "ο Εξάμηνο";
                                    }
                                    $i = 1;
                                    foreach ($Semesters as $sem){
                                        if ($i == 1 || $i == 2) {
                                            echo "<a class=\"vertical_tab nav-link active\" id=\"v-pills-tab1-tab\" data-toggle=\"pill\" href=\"#v-pills-tab1\" role=\"tab\" aria-expanded=\"true\"><h6>$sem</h6></a>";
                                        } else {
                                            echo "<a class=\"vertical_tab nav-link\" id=\"v-pills-tab$i-tab\" data-toggle=\"pill\" href=\"#v-pills-tab$i\" role=\"tab\" aria-expanded=\"true\"><h6>$sem</h6></a>";
                                        }
                                        $i += 2;
                                    } 
                                ?>
                                </div>
                            </div>
                            <div class="col-10 pl-0 content_box">
                                <div class="tab-content pl-3" id="v-pills-tabContent">
                                <?php
                                    $i = 1;
                                    foreach ($Semesters as $sem) {
                                        if ($i == 1 || $i == 2) {
                                            echo "<div class=\"tab-pane fade show active\" id=\"v-pills-tab1\" role=\"tabpanel\">";
                                        } else {
                                            echo "<div class=\"tab-pane fade\" id=\"v-pills-tab$i\" role=\"tabpanel\">";
                                        }
                                        echo "<div id=\"accordion$i\">";
                                        $semClasses = getDptSemClasses($conn, $_SESSION['bookDeclUni'], $_SESSION['bookDeclDpt'], $i);
                                        if ($semClasses == []) echo "<h6><i>Δεν έχουν δηλωθεί μαθήματα για αυτό το εξάμηνο.</i></h6>";
                                        foreach ($semClasses as $class) {
                                            if ( isset($class['FREE_CLASS_SECRETARIES_id']) ) $freeClassDpt = "&ensp;(" . getDptForSecretary($conn, $class['FREE_CLASS_SECRETARIES_id']) . ")";
                                            else $freeClassDpt = "";
                                            echo <<<EOT
                                                <div class="class_card card mb-2">
                                                    <div class="card-header" data-toggle="collapse" href="#collapse{$class['idClass']}">
                                                        <div class="collapsed card-link">
                                                            <div class="form-check d-inline-block">
                                                                <input id="checkbDiv{$class['idClass']}" class="form-check-input d-inline-block" type="checkbox" id="checkbox{$class['idClass']}" name="class{$class['idClass']}">
                                                                <label class="form-check-label"><h5 class="d-inline-block">{$class['title']}</h5><h6 class="d-inline-block">$freeClassDpt</h6></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="collapse{$class['idClass']}" class="collapse">
                                                        <div class="card-body text-justify">
EOT;
                                                        $classBooks = getClassBooks($conn, $class['idClass']);
                                                        if ($classBooks == []) echo "<h6><i>Δεν προσφέρονται συγγράμματα για αυτό το μάθημα.</i></h6>";
                                                        foreach ($classBooks as $book) {
                                                            echo <<<EOT
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="book{$class['idClass']}" id="book{$class['idClass']}_{$book['idBook']}" value="{$book['idBook']}">
                                                                <label> <!-- NOTE: Removed this: class="form-check-label" for="book{$class['idClass']}_{$book['idBook']}" : the user that just want to bring up the modal may not want to select it --> 
                                                                    <strong>[{$book['idBook']}]:</strong> <span class="bookModalSpan simpler_link" data-toggle="modal" data-target="#book{$book['idBook']}">{$book['title']}</span> | {$book['authors']}
                                                                </label>
                                                            </div>
EOT;
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
                        <div class="text-center m-3 mb-4">
                            <button type="submit" class="btn btn-dark hover_orange" name="bookDeclSubmit">Συνέχεια</button>
                        </div>         
                    </form>
                <?php
                    include("bookModal.php");
                    $i = 1;
                    foreach ($Semesters as $sem) {
                        $semClasses = getDptSemClasses($conn, $_SESSION['bookDeclUni'], $_SESSION['bookDeclDpt'], $i);
                        foreach ($semClasses as $class) {
                            $classBooks = getClassBooks($conn, $class['idClass']);
                            foreach ($classBooks as $book) {
                                bookModal($conn, $book);
                            }
                        }
                        $i++;
                    }
                } ?>
                </div>
            <?php
            include("../footer.html"); 
            $conn->close();
        ?>
    </div>
    <script>
        <?php if ( !$isLoggedInStudent) { ?> showDptDropdown(); <?php } ?>
        <?php if ( isset($_SESSION['bookDeclClassesArr']) && isset($_SESSION['bookDeclBooksArr']) ) { ?>
            $(window).on('load', function() {
                var declaredClassesArr = <?php echo json_encode($_SESSION['bookDeclClassesArr']); ?>;
                if ( !Array.isArray(declaredClassesArr) || !declaredClassesArr.length ) return;
                var declaredBooksArr = <?php echo json_encode($_SESSION['bookDeclBooksArr']); ?>;
                for (i = 0; i < declaredClassesArr.length; i++) {
                    $("input[name=class" + declaredClassesArr[i] + "]").prop('checked', true);
                    $("#book" + declaredClassesArr[i] + "_" + declaredBooksArr[i]).prop('checked', true);
                }
            });
        <?php } ?>
    </script>
    <?php include("control/loginFailureHandler.php"); ?>
</body>
</html>