<?php $loginFailed = include("control/sessionManager.php"); ?>
<!DOCTYPE html>
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
    <script src="/sdi1500102_sdi1500165/javascript/register.js"></script>
</head>
<body>
    <div class="main-container">
        <?php include("headlines.php") ?>
        <?php include("general_navbar.php"); ?>
        <?php 
            $conn = connectToDB();
            if (! $conn) {
                die("Database connection failed: " . $conn->connect_error);
            }
            if ( isset($_POST['registerSubmit']) ) { 
                mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
                try {
                    // check if mail exists:
                    $sqlStmt = $conn->prepare("SELECT * FROM USERS WHERE email=?");
                    $sqlStmt->bind_param("s", $_POST['email']);
                    $sqlStmt->execute();
                    $result = $sqlStmt->get_result();
                    if ($result->num_rows > 0) { ?>
                        <div class="alert alert-danger text-center ml-auto mr-auto mt-3 w-50" role="alert">
                            <p>Υπάρχει ήδη λογαριασμός με αυτό το email.<br>
                            Παρακαλούμε <a href="/sdi1500102_sdi1500165/php/register_page.php">προσπαθήστε ξανά</strong></a> με άλλο email ή δοκιμάστε να <a class="linklike" data-toggle="modal" data-target="#loginModal">συνδεθείτε</a>.</p>
                        </div>
                        <div class="text-center">
                            <img class="mt-2" src="/sdi1500102_sdi1500165/images/oops-sign.jpg"/>
                        </div>
                <?php } else {
                        $sqlStmt = $conn->prepare("INSERT INTO `USERS` (`idUser`, `email`, `password`, `user_type`) VALUES (default, ?, ?, {$_POST['userType']})");
                        $sqlStmt->bind_param("ss", $_POST['email'], $_POST['password']);
                        $sqlStmt->execute();
                        $userId = $conn->insert_id;
                        switch ($_POST['userType']) {
                            case "1":
                                $secId = getSecId($conn, $_POST['student_uni'], $_POST['student_dpt']);
                                if ( !isset($_POST['student_phone']) ) $student_phone = "";
                                else $student_phone = $_POST['student_phone'];
                                $sqlStmt = $conn->prepare("INSERT INTO `students` (`idUser`, `SECRETARIES_id`, `AM`, `firstname`, `lastname`, `current_semester`, `phone`) VALUES ({$userId}, {$secId}, ?, ?, ?, ?, ?)");
                                $sqlStmt->bind_param("sssis", $_POST['student_am'], $_POST['student_firstname'], $_POST['student_lastname'], $_POST['student_curr_sem'], $student_phone);
                                break;
                            case "2":
                                $sqlStmt = $conn->prepare("INSERT INTO `publishers` (`idUser`, `AFM`, `firstname`, `lastname`, `phone`, `address`) VALUES ({$userId}, ?, ?, ?, ?, ?)");
                                $sqlStmt->bind_param("sssss", $_POST['publisher_afm'], $_POST['publisher_firstname'], $_POST['publisher_lastname'], $_POST['publisher_phone'], $_POST['publisher_address']);
                                break;
                            case "3":
                                $sqlStmt = $conn->prepare("INSERT INTO `secretaries` (`idUser`, `university`, `department`, `number_of_semesters`, `phone`, `address`, `TK`, `county`, `city`) VALUES ({$userId}, ?, ?, ?, ?, ?, ?, ?, ?)");
                                $sqlStmt->bind_param("ssississ", $_POST['secretary_university'], $_POST['secretary_department'], $_POST['secretary_number_of_semesters'], $_POST['secretary_phone'], $_POST['secretary_address'], $_POST['secretary_tk'], $_POST['secretary_county'], $_POST['secretary_city']);
                                break;
                            case "4":
                                $sqlStmt = $conn->prepare("INSERT INTO `distribution_points` (`idUser`, `name`, `address`, `email`, `phone`, `working_hours`, `map_url`) VALUES ({$userId}, ?, ?, ?, ?, ?, '')");
                                $sqlStmt->bind_param("sssss", $_POST['distPoint_name'], $_POST['distPoint_address'], $_POST['distPoint_email'], $_POST['distPoint_phone'], $_POST['distPoint_working_hours']);
                                break;
                            default:    // can't ever get here
                                die("No userType provided");
                        }
                        $sqlStmt->execute();
                        ?>
                        <div class="alert alert-primary text-center ml-auto mr-auto mt-3 w-25" role="alert">
                            <p>Η εγγραφή σας ήταν επιτυχής!<br>
                            <a class="linklike" data-toggle="modal" data-target="#loginModal"><strong>Συνδεθείτε</strong></a>!</p>
                        </div>
                <?php }
                } catch (Exception $e) { ?>
                    <div class="alert alert-danger text-center ml-auto mr-auto mt-3 w-50" role="alert">
                        <p>Προέκυψε κάποιο σφάλμα κατά την εγγραφή σας.<br>
                        Παρακαλούμε <a href="/sdi1500102_sdi1500165/php/register_page.php">προσπαθήστε ξανά</strong></a>.</p>
                        <p class="text-normal">Σφάλμα: "<?php echo $conn->connect_error . " | " .$sqlStmt->error; ?>"" </p>
                    </div>
                    <div class="text-center">
                        <img class="mt-2" src="/sdi1500102_sdi1500165/images/oops-sign.jpg"/>
                    </div>
                <?php 
                    $conn->close(); 
                } ?>
        <?php } else { 
                if ( isset($_GET['userType']) ) $formUserType = $_GET['userType'];
                else $formUserType = "student";
            ?>
            <div class="row justify-content-center">
                <div class="col-6 m-2 text_div">
                    <h2 id="registerTitle" class="m-3 mb-4">Εγγραφή Φοιτητή</h2>     <!-- changes dynamically -->
                    <form class="border rounded m-3 p-3 bg-light" action="/sdi1500102_sdi1500165/php/register_page.php?registration=success" id="registerForm" method="POST">
                        <div class="form-group">
                            <label class="requiredField">Email</label>
                            <input class="form-control" id="email" name="email" type="email" required>
                        </div>
                        <div class="form-group">
                            <label class="requiredField">Κωδικός</label>
                            <input class="form-control" id="password" name="password" type="password" required>
                        </div>
                        <div class="form-group">
                            <label class="requiredField">Επιβεβαίωση κωδικού</label>
                            <input class="form-control" id="rePassword" type="password" required>
                        </div>
                        <div class="form-group">
                            <label class="requiredField">Είδος Χρήστη</label>
                            <select class="form-control" id="userType" name="userType" onchange="showUserRegisterOptions();">
                                <?php if ($formUserType == "student") { ?>
                                    <option value="1" selected>Φοιτητής</option>
                                <?php } else { ?>
                                    <option value="1">Φοιτητής</option>
                                <?php } ?>
                                <?php if ($formUserType == "publisher") { ?>
                                    <option value="2" selected>Εκδότης</option>
                                <?php } else { ?>
                                    <option value="2">Εκδότης</option>
                                <?php } ?>
                                <?php if ($formUserType == "secretary") { ?>
                                    <option value="3" selected>Γραμματεία</option>
                                <?php } else { ?>
                                    <option value="3">Γραμματεία</option>
                                <?php } ?>
                                <?php if ($formUserType == "distPoint") { ?>
                                    <option value="4" selected>Σημείο Διανομής</option>
                                <?php } else { ?>
                                    <option value="4">Σημείο Διανομής</option>
                                <?php } ?>
                            </select>
                        </div>

                        <div id="studentOptions" display="none !important">
                            <div class="form-group">
                                <label class="requiredField">Όνομα</label>
                                <input class="form-control" id="student_req_firstname" name="student_firstname">
                            </div>
                            <div class="form-group">
                                <label class="requiredField">Επώνυμο</label>
                                <input class="form-control" id="student_req_lastname" name="student_lastname">
                            </div>
                            <div class="form-group">
                                <label class="requiredField">Αριθμός Μητρώου</label>
                                <input class="form-control" id="student_req_am" name="student_am">
                            </div>
                            <div class="form-group">
                                <label class="requiredField">Σχολή</label>
                                <select class="form-control" id="student_req_uni" name="student_uni" onchange="showDptDropdown()">
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
                            <div class="form-group">
                                <label class="requiredField">Τμήμα</label>
                                <?php
                                    $i = 0;
                                    foreach ($Unis as $uni) {
                                        echo "<select class=\"form-control d-inline-block department_select\" id=\"student_req_dpt_uni{$i}\" name=\"student_dpt\" style=\"display: none!important;\">";
                                        foreach ($Departments[$i] as $dpt) {
                                            echo "<option value=\"$dpt\">$dpt</option>";
                                        }
                                        echo "</select>";
                                        $i++;
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label class="requiredField">Τρέχον Εξάμηνο</label>
                                <select class="form-control" id="student_req_curr_sem" name="student_curr_sem">
                                <?php
                                    $i = 1;       // TODO: get period
                                    $semNum = 8;    // TODO: actually getting semNum here is troublesome
                                    for (; $i <= $semNum; $i += 2) {
                                        echo "<option value=\"$i\">{$i}ο Εξάμηνο</option>";
                                    }
                                ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Τηλέφωνο</label>
                                <input class="form-control" id="student_phone" name="student_phone">
                            </div>
                        </div>
                        <div id="publisherOptions" display="none !important">
                            <div class="form-group">
                                <label class="requiredField">Όνομα</label>
                                <input class="form-control" id="publisher_req_firstname" name="publisher_firstname">
                            </div>
                            <div class="form-group">
                                <label class="requiredField">Επώνυμο</label>
                                <input class="form-control" id="publisher_req_lastname" name="publisher_lastname">
                            </div>
                            <div class="form-group">
                                <label class="requiredField">ΑΦΜ</label>
                                <input class="form-control" id="publisher_req_afm" name="publisher_afm">
                            </div>
                            <div class="form-group">
                                <label class="requiredField">Τηλέφωνο</label>
                                <input class="form-control" id="publisher_req_phone" name="publisher_phone">
                            </div>
                            <div class="form-group">
                                <label class="requiredField">Νομός</label>
                                <input class="form-control" id="publisher_req_county" name="publisher_county">
                            </div>
                            <div class="form-group">
                                <label class="requiredField">Πόλη</label>
                                <input class="form-control" id="publisher_req_city" name="publisher_city">
                            </div>
                            <div class="form-group">
                                <label class="requiredField">Διεύθυνση</label>
                                <input class="form-control" id="publisher_req_address" name="publisher_address">
                            </div>
                            <div class="form-group">
                                <label class="requiredField">Ταχυδρομικός Κώδικας</label>
                                <input class="form-control" id="publisher_req_tk" name="publisher_tk">
                            </div>
                        </div>
                        <div id="secretaryOptions" display="none !important">
                            <div class="form-group">
                                <label class="requiredField">Σχολή</label>
                                <input class="form-control" id="secretary_req_university" name="secretary_university">
                            </div>
                            <div class="form-group">
                                <label class="requiredField">Τμήμα</label>
                                <input class="form-control" id="secretary_req_department" name="secretary_department">
                            </div>
                            <div class="form-group">
                                <label class="requiredField">Πλήθος Εξαμήνων</label>
                                <input class="form-control" id="secretary_req_number_of_semesters" name="secretary_number_of_semesters">
                            </div>
                            <div class="form-group">
                                <label class="requiredField">Τηλέφωνο Γραμματείας</label>
                                <input class="form-control" id="secretary_req_phone" name="secretary_phone">
                            </div>
                            <div class="form-group">
                                <label class="requiredField">Νομός</label>
                                <input class="form-control" id="secretary_req_county" name="secretary_county">
                            </div>
                            <div class="form-group">
                                <label class="requiredField">Πόλη</label>
                                <input class="form-control" id="secretary_req_city" name="secretary_city">
                            </div>
                            <div class="form-group">
                                <label class="requiredField">Διεύθυνση</label>
                                <input class="form-control" id="secretary_req_address" name="secretary_address">
                            </div>
                            <div class="form-group">
                                <label class="requiredField">Ταχυδρομικός Κώδικας</label>
                                <input class="form-control" id="secretary_req_tk" name="secretary_tk">
                            </div>
                        </div>
                        <div id="distPointOptions" display="none !important">
                            <div class="form-group">
                                <label class="requiredField">Επωνυμία</label>
                                <input class="form-control" id="distPoint_req_name" name="distPoint_name">
                            </div>
                            <div class="form-group">
                                <label class="requiredField">Τηλέφωνο Σημείου Διανομής</label>
                                <input class="form-control" id="distPoint_req_phone" name="distPoint_phone">
                            </div>
                            <div class="form-group">
                                <label class="requiredField">Email Σημείου Διανομής</label>
                                <input class="form-control" id="distPoint_req_email" name="distPoint_email">
                            </div>
                            <div class="form-group">
                                <label class="requiredField">Νομός</label>
                                <input class="form-control" id="distPoint_req_county" name="distPoint_county">
                            </div>
                            <div class="form-group">
                                <label class="requiredField">Πόλη</label>
                                <input class="form-control" id="distPoint_req_city" name="distPoint_city">
                            </div>
                            <div class="form-group">
                                <label class="requiredField">Διεύθυνση</label>
                                <input class="form-control" id="distPoint_req_address" name="distPoint_address">
                            </div>
                            <div class="form-group">
                                <label class="requiredField">Ταχυδρομικός Κώδικας</label>
                                <input class="form-control" id="distPoint_req_tk" name="distPoint_tk">
                            </div>
                            <div class="form-group">
                                <label class="requiredField">Ώρες Λειτουργίας</label>
                                <textarea class="form-control" id="distPoint_req_working_hours" name="distPoint_working_hours" rows="2"></textarea>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" name="registerSubmit" class="btn btn-dark hover_orange">Εγγραφή</button>
                        </div>
                    </form>
                    <p class="text-center">Έχετε ήδη λογαριασμό; <a class="linklike" data-toggle="modal" data-target="#loginModal"><strong>Συνδεθείτε</strong></a></p>
                </div>
            </div>
            <script> 
                showUserRegisterOptions(); 
                showDptDropdown();
            </script>
            <?php $conn->close(); 
        }
        include("../footer.html");
    ?>
    </div>
    <?php include("control/loginFailureHandler.php"); ?>
</body>
</html>
