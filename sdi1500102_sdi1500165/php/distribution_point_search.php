<?php $loginFailed = include("control/sessionManager.php"); ?>
<!DOCTYPE html>
<?php $active_page = "DistPointSearch"; ?>
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
    <script src="/sdi1500102_sdi1500165/javascript/lib/popper.min.js"></script>
    <script src="/sdi1500102_sdi1500165/javascript/lib/bootstrap.min.js"></script>
</head>
<body style="overflow-y: scroll">
    <div class="main-container">
        <?php include("headlines.php"); ?>
        <?php include("general_navbar.php"); ?>
        <nav class="my_breadcrump">
            <a class="breadcrump_item" href="/sdi1500102_sdi1500165/index.php">Αρχική Σελίδα</a> > 
            <p class="breadcrump_item">Αναζήτηση</p> > 
            <a class="breadcrump_item last_item" href="/sdi1500102_sdi1500165/php/dist_point_search.php">Αναζήτηση Σημείων Διανομής</a>
        </nav>
        <h2 class="orange_header mb-4">Αναζήτηση Σημείων Διανομής</h2>
        <div class="container w-50 border border-dark rounded p-3 bg-light">
            <form id="dist_point_search_form">
                <div class="row">
                    <div class="col-4 mb-2">Όνομα:</div>
                    <div class="col-8 mb-2">
                        <input id="name_param" class="form-control" type="text" name="name"/>
                    </div>
                    <div class="col-4 mb-2">Διεύθυνση:</div>
                    <div class="col-8 mb-2">
                        <input id="address_param" class="form-control" type="text" name="address"/>
                    </div>
                    <div class="col-4"></div>
                    <div class="col-8">
                        <button class="btn btn-dark hover_orange" type="submit">Αναζήτηση</button>
                        <button class="btn btn-outline-danger float-right" type="reset">Clear</button>
                    </div>
                </div>
            </form>
            <script>
                $("#dist_point_search_form").on("submit", function(e){
                    e.preventDefault();
                    formdata = {
                        'name' : $("#name_param").val(),
                        'address' : $("#address_param").val()
                    }
                    $.ajax({
                        url: "/sdi1500102_sdi1500165/php/AJAX/dist_point_search_results.php",
                        type: "post",
                        data: formdata,
                        success: function(response){
                            if (response !== "" && response !== "FAIL") {
                                $("#dist_point_search_results").html(response);
                                $('html, body').animate({
                                    scrollTop: $("#dist_point_search_results").offset().top
                                }, 450);
                            } else {
                                alert("Κάτι πήγε στραβά με την αναζήτηση!");
                            }
                        }
                    });
                });
            </script>
        </div>
        <br>
        <!-- AJAX content down here -->
        <div id="dist_point_search_results">

        </div>
        <br>
        <?php include("../footer.html"); ?>
    </div>
    <script src="/sdi1500102_sdi1500165/javascript/tooltipInit.js"></script>
    <script src="/sdi1500102_sdi1500165/javascript/formResubmissionPrevention.js"></script>
    <?php include("control/loginFailureHandler.php"); ?>
</body>
</html>