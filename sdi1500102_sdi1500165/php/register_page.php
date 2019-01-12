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
            if ( isset($_GET['userType']) ) $formUserType = $_GET['userType'];
            else $formUserType = "student";
            $conn = connectToDB();
            if (! $conn) {
                die("Database connection failed: " . $conn->connect_error);
            }
        ?>
        <div class="row justify-content-center">
            <div class="col-6 m-2 text_div">
                <h2 id="registerTitle" class="m-3 mb-4">Εγγραφή Φοιτητή</h2>     <!-- changes dynamically -->
                <form class="border rounded m-3 p-3 bg-light" id="registerForm">
                    <div class="form-group">
                        <label class="requiredField">Email</label>
                        <input class="form-control" id="email" type="email" required>
                    </div>
                    <div class="form-group">
                        <label class="requiredField">Κωδικός</label>
                        <input class="form-control" id="password" type="password" required>
                    </div>
                    <div class="form-group">
                        <label class="requiredField">Επιβεβαίωση κωδικού</label>
                        <input class="form-control" id="rePassword" type="password" required>
                    </div>
                    <div class="form-group">
                        <label class="requiredField">Είδος Χρήστη</label>
                        <select class="form-control" id="userType" onchange="showUserRegisterOptions();">
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
                            <input class="form-control" id="student_req_firstname">
                        </div>
                        <div class="form-group">
                            <label class="requiredField">Επώνυμο</label>
                            <input class="form-control" id="student_req_lastname">
                        </div>
                        <div class="form-group">
                            <label class="requiredField">Αριθμός Μητρώου</label>
                            <input class="form-control" id="student_req_am">
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
                                    echo "<option value=\"\" disabled selected hidden></option>";
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
                            <input class="form-control" id="student_phone">
                        </div>
                    </div>
                    <div id="publisherOptions" display="none !important">
                        <div class="form-group">
                            <label class="requiredField">Όνομα</label>
                            <input class="form-control" id="publisher_req_firstname">
                        </div>
                        <div class="form-group">
                            <label class="requiredField">Επώνυμο</label>
                            <input class="form-control" id="publisher_req_lastname">
                        </div>
                        <div class="form-group">
                            <label class="requiredField">ΑΦΜ</label>
                            <input class="form-control" id="publisher_req_afm">
                        </div>
                        <div class="form-group">
                            <label class="requiredField">Τηλέφωνο</label>
                            <input class="form-control" id="publisher_req_phone">
                        </div>
                        <div class="form-group">
                            <label class="requiredField">Νομός</label>
                            <input class="form-control" id="publisher_req_county">
                        </div>
                        <div class="form-group">
                            <label class="requiredField">Πόλη</label>
                            <input class="form-control" id="publisher_req_city">
                        </div>
                        <div class="form-group">
                            <label class="requiredField">Διεύθυνση</label>
                            <input class="form-control" id="publisher_req_address">
                        </div>
                        <div class="form-group">
                            <label class="requiredField">Ταχυδρομικός Κώδικας</label>
                            <input class="form-control" id="publisher_req_tk">
                        </div>
                    </div>
                    <div id="secretaryOptions" display="none !important">
                        <div class="form-group">
                            <label class="requiredField">Σχολή</label>
                            <input class="form-control" id="secretary_req_university">
                        </div>
                        <div class="form-group">
                            <label class="requiredField">Τμήμα</label>
                            <input class="form-control" id="secretary_req_department">
                        </div>
                        <div class="form-group">
                            <label class="requiredField">Πλήθος Εξαμήνων</label>
                            <input class="form-control" id="secretary_req_number_of_semesters">
                        </div>
                        <div class="form-group">
                            <label class="requiredField">Τηλέφωνο Γραμματείας</label>
                            <input class="form-control" id="secretary_req_phone">
                        </div>
                        <div class="form-group">
                            <label class="requiredField">Νομός</label>
                            <input class="form-control" id="secretary_req_county">
                        </div>
                        <div class="form-group">
                            <label class="requiredField">Πόλη</label>
                            <input class="form-control" id="secretary_req_city">
                        </div>
                        <div class="form-group">
                            <label class="requiredField">Διεύθυνση</label>
                            <input class="form-control" id="secretary_req_address">
                        </div>
                        <div class="form-group">
                            <label class="requiredField">Ταχυδρομικός Κώδικας</label>
                            <input class="form-control" id="secretary_req_tk">
                        </div>
                    </div>
                    <div id="distPointOptions" display="none !important">
                        <div class="form-group">
                            <label class="requiredField">Επωνυμία</label>
                            <input class="form-control" id="distPoint_req_name">
                        </div>
                        <div class="form-group">
                            <label class="requiredField">Τηλέφωνο</label>
                            <input class="form-control" id="distPoint_req_phone">
                        </div>
                        <div class="form-group">
                            <label class="requiredField">Νομός</label>
                            <input class="form-control" id="distPoint_req_county">
                        </div>
                        <div class="form-group">
                            <label class="requiredField">Πόλη</label>
                            <input class="form-control" id="distPoint_req_city">
                        </div>
                        <div class="form-group">
                            <label class="requiredField">Διεύθυνση</label>
                            <input class="form-control" id="distPoint_req_address">
                        </div>
                        <div class="form-group">
                            <label class="requiredField">Ταχυδρομικός Κώδικας</label>
                            <input class="form-control" id="distPoint_req_tk">
                        </div>
                        <div class="form-group">
                            <label class="requiredField">Ώρες Λειτουργίας</label>
                            <textarea class="form-control" id="distPoint_req_working_hours" rows="2"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Ιστοσελίδα</label>
                            <input class="form-control" id="distPoint_website">
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-dark hover_orange">Εγγραφή</button>
                    </div>
                </form>
                <p class="text-center">Έχετε ήδη λογαριασμό; <a class="linklike" data-toggle="modal" data-target="#loginModal"><strong>Συνδεθείτε</strong></a></p>
            </div>
        </div>
        <?php 
            include("../footer.html");
            $conn->close(); 
        ?>
    </div>
    <script> 
        showUserRegisterOptions(); 
        showDptDropdown();
    </script>
    <?php include("control/loginFailureHandler.php"); ?>
</body>
</html>
