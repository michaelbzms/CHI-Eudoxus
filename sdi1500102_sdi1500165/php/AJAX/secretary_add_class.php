<?php 
    include("../control/sessionManager.php");
    $update_previous_from_db = $_GET["removePrevious"];
    $conn = connectToDB();
    if ( $conn->connect_errno ) { die("AJAX Database connection failed: " . $conn->connect_error); }
    $hasSession = isset($_SESSION['userID']);
    if ( $hasSession && isset($_SESSION['userType']) && $_SESSION['userType'] == 'secretary' ) {
        $secretary_id = $_SESSION['userID']; 
        $num_of_semesters = getNumberOfSemesters($conn, $secretary_id);
        $affiliated_departments = getAllDepartementsForUniExceptGiven($conn, getUniForSecretary($conn, $secretary_id), $secretary_id);
        $class_id = -1;
        if ( $update_previous_from_db == "true"){
            // update  previous version of this class
            $sqlStmt = $conn->prepare("UPDATE UNIVERSITY_CLASSES SET title = ?, code = ?, professors = ?, semester = ?, comments = ?, FREE_CLASS_SECRETARIES_id = ? WHERE idClass = " . $_POST['class_id'] . ";");
            $foreignDepartment = ($_POST["isForeign"] == "true") ? $_POST["foreignDepartment"] : null;
            $sqlStmt->bind_param("ssssss", $_POST['title'], $_POST['id'], $_POST['professors'], $_POST['semester'], $_POST['comments'], $foreignDepartment);
            $sqlStmt->execute();
            $class_id = $_POST['class_id'];
            $sqlStmt->close();
        } else {
            // add new class to db
            // template: INSERT INTO `UNIVERSITY_CLASSES` (`idClass`, `SECRETARIES_id`, `FREE_CLASS_SECRETARIES_id`, `title`, `code`, `professors`, `semester`, `comments`) VALUES (...);
            $sqlStmt = $conn->prepare("INSERT INTO UNIVERSITY_CLASSES VALUES (default, $secretary_id, ?, ?, ?, ?, ?, ?)"); 
            $foreignDepartment = ($_POST["isForeign"] == "true") ? $_POST["foreignDepartment"] : null;
            $sqlStmt->bind_param("ssssss", $foreignDepartment, $_POST['title'], $_POST['id'], $_POST['professors'], $_POST['semester'], $_POST['comments']);
            $sqlStmt->execute();
            $class_id = $conn->insert_id;    // last id from db   TODO: Is this safe? Considering no other insert is going on with the same $conn then it should be -> each AJAX call makes its one connection
            $sqlStmt->close();
        }
        // then return it to be dynamically added to view
        $class = [$_POST["id"], $_POST["title"], $_POST["professors"], $_POST["semester"], $_POST["comments"], ($_POST["isForeign"] == "true") ? true : false , $_POST["foreignDepartment"] ];
        if ( !($update_previous_from_db == "true") ) echo "<li class_id=\"$class_id\">\n";
            echo <<<EOT
            <div class="item">
                <span class="id_span">[$class[0]]</span><h2>$class[1]</h2><img class="delete_box" src="/sdi1500102_sdi1500165/images/red_cross_box.png"/><img class="edit_box" src="/sdi1500102_sdi1500165/images/yellow_pencil_box.png"/>
EOT;
                if ( $class[5] ) { echo "<span class=\"foreign_title\">(" . $affiliated_departments[$class[6]][1] . ")</span>"; }
                echo<<<EOT
                <br>
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
                                <div class="col-5">Άλλης Σχολής:</div>
                                <div class="col-7 row pr-0">
EOT;
                                    ?>
                                    <div class="col-2"><input type="checkbox" class="form-control form-chek-input foreign_class_checkbox is_foreign_param" name="isForeign" <?php if ($class[5]) echo "checked"; ?>></div>
                                    <div class="col-10 pr-0 foreign_class_options" <?php if (!$class[5]) echo "style=\"display: none\"" ?>>
                                        <select class="form-control foreign_department_param" name="foreign_department" form="edit_class_form">
                                            <option value="" disabled hidden <?php if ( !$class[5] || $class[6] == "" ) echo " selected=\"selected\" " ?>>Επιλέξτε σχολή</option>
                                            <?php    foreach ( $affiliated_departments as $department ) { ?>
                                                    <option value="<?php echo $department[0] ?>" <?php if ( $class[5] && $class[6] == $department[0] ) echo " selected=\"selected\" " ?>><?php echo $department[1] ?></option>
                                            <?php }
                                            echo <<<EOT
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5">Σχόλια:</div>
                                <div class="col-7"><textarea class="form-control comment_param" name="comments" value="$class[4]">$class[4]</textarea></div>
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
EOT;
        if ( ! ($update_previous_from_db == "true") ) echo "</li>\n";
    } else {
        echo "NO_SESSION";
    }
    $conn->close();
?>