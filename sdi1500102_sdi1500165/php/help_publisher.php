<?php $loginFailed = include("control/sessionManager.php"); ?>
<!DOCTYPE html>
<?php $active_page = "PublisherHelp"; ?>
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
            <p class="breadcrump_item">Εκδότες</p> > 
            <a class="breadcrump_item last_item" href="/sdi1500102_sdi1500165/php/help_publisher.php">Βοήθεια Εκδότη</a>
        </nav>
        <div class="row justify-content-center">
            <div class="col-10 m-2 text_div">
                <h2>Βοήθεια Εκδότη</h2>
                <br>
                <h3>Λειτουργία: Διαχείριση Συγγραμάτων</h3>            
                <p> 
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vitae lacus augue. Pellentesque eu ligula sed nisi hendrerit tempus nec a velit. Integer ac nunc eu est molestie auctor. Consectetur adipiscing elit. Suspendisse ullamcorper pretium luctus. Suspendisse potenti. Donec scelerisque augue nulla, eget venenatis leo lacinia eu. Sed vulputate quis ex fringilla vestibulum. Curabitur viverra lorem quis mi laoreet, id malesuada urna lobortis. Quisque facilisis tristique lacus, et posuere odio consectetur eget. Curabitur pulvinar molestie eros et pellentesque. <br>
                    Pellentesque id justo id justo sagittis gravida non accumsan turpis. Integer a cursus enim, quis molestie enim. Sed hendrerit sem ut vehicula venenatis. Fusce eu nisi consectetur, congue neque sed, auctor lacus. Cras tempus semper suscipit. Vestibulum pellentesque laoreet eros, in aliquam nibh tempor ut. Aliquam erat volutpat. Nam neque mauris, rutrum sed turpis sit amet, laoreet euismod nisl. Morbi interdum diam et mauris ultrices laoreet. Suspendisse potenti. Vestibulum aliquam odio sed lorem sagittis, quis lacinia mi porta. Aliquam at nunc a neque sagittis tempor. Nulla ac vehicula nisi, vitae molestie mi. Nullam viverra augue ac porta facilisis. Duis ultricies neque lacinia, laoreet quam id, vehicula metus. 
                </p>
                <br>

                <h3>Λειτουργία: Κοστολόγηση</h3>       
                <p> 
                    Donec tempus dapibus lacus. Sed ex mauris, pulvinar eget fringilla quis, faucibus vel ex. Nunc dignissim quam a enim molestie posuere. Aliquam hendrerit nibh eu finibus sagittis. Ut sagittis elit vel ex faucibus molestie. Curabitur sagittis, dui sit amet porttitor fermentum, tortor erat dapibus leo, eget pharetra magna purus a ante. Morbi malesuada tellus nulla, id finibus justo egestas ac. Phasellus a scelerisque ante, convallis imperdiet arcu. Sed in quam tellus. Pellentesque sit amet enim eget odio faucibus congue nec eget nisi. Duis faucibus mauris et erat ullamcorper, non bibendum turpis interdum. Vivamus ut sodales est, eu rutrum mauris. Donec tristique aliquet pulvinar. Duis purus augue, facilisis in malesuada id, finibus a diam. Integer non quam non orci luctus gravida id vitae justo. <br>

                    Phasellus vitae tellus ipsum. Praesent vitae lacus finibus, tincidunt lectus vitae, lobortis eros. Nulla bibendum nisl dolor, at tincidunt libero hendrerit nec. Fusce non odio augue. Duis nec ex nec sem faucibus malesuada id molestie nisl. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec ac pretium massa. Aenean eu nisi id augue rhoncus sodales a vitae orci. Nullam quis facilisis mi, id ullamcorper neque. Vivamus congue est eu turpis auctor dictum. Nunc eleifend vulputate ipsum, at feugiat magna commodo sit amet. Suspendisse molestie neque pharetra nisl dignissim, sed iaculis ante egestas. Etiam molestie turpis in sapien mollis egestas. 
                </p>
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