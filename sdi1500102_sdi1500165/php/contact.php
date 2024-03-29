<?php $loginFailed = include("control/sessionManager.php"); ?>
<!DOCTYPE html>
<?php $active_page = "Contact"; ?>
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
            <a class="breadcrump_item last_item" href="/sdi1500102_sdi1500165/php/contact.php">Επικοινωνία</a>
        </nav>
        <div class="row justify-content-center">
            <div class="col-6 m-2 text_div">
                <h2>Επικοινωνήστε μαζί μας</h2>
                <form class="border rounded m-3 p-3">
                    <div class="form-group">
                        <label class="requiredField">Ονοματεπώνυμο</label>
                        <input class="form-control" id="name" required>
                    </div>
                    <div class="form-group">
                        <label class="requiredField">Email</label>
                        <input class="form-control" id="email" type="email" required>
                    </div>
                    <div class="form-group">
                        <label>Τηλέφωνο</label>
                        <input class="form-control" id="phone">
                    </div>
                    <div class="form-group">
                        <label class="requiredField">Είδος Χρήστη</label>
                        <select class="form-control" id="userType">
                            <option>Φοιτητής</option>
                            <option>Εκδότης</option>
                            <option>Γραμματεία</option>
                            <option>Σημείο Διανομής</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="requiredField">Κείμενο</label>
                        <textarea class="form-control" id="message" rows="5" required></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Αποστολή</button>
                    </div>
                </form>
            </div>
            <div class="col-7 pt-3 bg-light text-center">
                <p>Εναλλακτικά μπορείτε να επικοινωνήσετε με το Γραφείο Αρωγής της δράσης στο τηλέφωνο 215 215 7850.<br>
                Ώρες λειτουργίας Δευτέρα με Παρασκευή 09:00 πμ - 17:00 μμ</p>
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