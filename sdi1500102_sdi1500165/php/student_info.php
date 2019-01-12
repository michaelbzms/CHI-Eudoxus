<?php include("control/sessionManager.php") ?>
<!DOCTYPE html>
<?php $active_page = "StudentInfo"; ?>
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
</head>
<body>
    <div class="main-container">
        <?php include("headlines.php") ?>
        <?php include("general_navbar.php"); ?>
        <nav class="my_breadcrump">
            <a class="breadcrump_item" href="/sdi1500102_sdi1500165/index.php">Αρχική Σελίδα</a> > 
            <p class="breadcrump_item">Φοιτητές</p> > 
            <a class="breadcrump_item last_item" href="/sdi1500102_sdi1500165/php/student_info.php">Επισκόπηση Στοιχείων Φοιτητή</a>
        </nav>
        <?php
            $conn = connectToDB();
            if (! $conn) {
                die("Database connection failed: " . mysqli_connect_error());
            }
            // TODO: error page if user type != student
            $hasSession = isset($_SESSION['userID']);
            if ( $hasSession && isset($_SESSION['userType']) && $_SESSION['userType'] == 'student' ) {
                $studentID = $_SESSION['userID'];
                $sqlQuery = "SELECT st.*, sec.university, sec.department, usr.email FROM STUDENTS st, SECRETARIES sec, USERS usr WHERE st.idUser = $studentID AND st.SECRETARIES_id = sec.idUser AND st.idUser = usr.idUser";
                $result = $conn->query($sqlQuery);
                if ($result->num_rows == 0) { die("Invalid UserID"); }  // should be caught at login
                $studentRow = $result->fetch_assoc();
?>
                <h2 class="orange_header m-3"> <?php echo $studentRow['firstname'] . " " . $studentRow['lastname']; ?> </h2>
                <div id="info_box" class="m-3 mb-5">
                    <div class="container border border-dark rounded bg-light w-60 pl-3 pr-3 pt-2 pb-2">
                        <div class="row">
                            <div class="col-6"><strong>Πανεπιστήμιο:</strong></div>
                            <div class="col-6"><?php echo $studentRow['university']; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-6"><strong>Τμήμα:</strong></div>
                            <div class="col-6"><?php echo $studentRow['department']; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-6"><strong>Κωδικός Φοιτητή στον Εύδοξο:</strong></div>
                            <div class="col-6"><?php echo $studentRow['idUser']; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-6"><strong>Αριθμός Μητρώου:</strong></div>
                            <div class="col-6"><?php echo $studentRow['AM']; ?></div>
                        </div>                        
                        <div class="row">
                            <div class="col-6"><strong>Email:</strong></div>
                            <div class="col-6"><?php echo $studentRow['email']; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-6"><strong>Τηλέφωνο:</strong></div>
                            <div class="col-6"><?php echo $studentRow['phone']; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-6"><strong>Τρέχον Εξάμηνο:</strong></div>
                            <div class="col-6"><?php echo $studentRow['current_semester']; ?>o</div>
                        </div>
                    </div>
                    <div class="text-center m-3"><button id="edit_btn" class="btn btn-warning">✏ Τροποποίηση</button></div>
                </div>
                <div id="edit_box" class="m- mb-5" style="display: none"> <!-- hidden at start -->
                    <form id="student_edit_info_form">
                        <div class="container border border-dark rounded bg-light w-60 pl-3 pr-3 pt-2 pb-2">
                            <div class="row mb-2">
                                <div class="col-6"><strong>Πανεπιστήμιο:</strong></div>
                                <div class="col-6"><div style="padding-bottom: 5px"><?php echo $studentRow['university']; ?></div></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6"><strong>Τμήμα:</strong></div>
                                <div class="col-6"><div style="padding-bottom: 5px"><?php echo $studentRow['department']; ?></div></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6"><strong>Κωδικός Φοιτητή στον Εύδοξο:</strong></div>
                                <div class="col-6"><div style="padding-bottom: 5px"><?php echo $studentRow['idUser']; ?></div></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6"><strong>Αριθμός Μητρώου:</strong></div>
                                <div class="col-6"><div style="padding-bottom: 5px"><?php echo $studentRow['AM']; ?></div></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6"><strong>Email:</strong></div>
                                <div class="col-6"><input id="email" type="email" class="form-control input-sm" value="<?php echo $studentRow['email']; ?>" required/></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6"><strong>Τηλέφωνο:</strong></div>
                                <div class="col-6"><input id="phone" type="text" class="form-control input-sm" value="<?php echo $studentRow['phone']; ?>" required/></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6"><strong>Τρέχον Εξάμηνο:</strong></div>
                                <div class="col-6"><div style="padding-bottom: 5px"><?php echo $studentRow['current_semester']; ?>o</div></div>
                            </div>
                        </div>
                        <div class="text-center m-3">
                            <button type="submit" class="btn btn-warning mr-1">Αποθήκευση</button>
                            <button type="reset" id="cancel_edit_btn" class="btn btn-outline-secondary ml-1">Ακύρωση</button>
                        </div>
                    </form>
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
    <script src="/sdi1500102_sdi1500165/javascript/user_info.js"></script>
</body>
</html>