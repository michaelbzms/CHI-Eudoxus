<?php 
    $update_previous_from_db = $_GET["removePrevious"];
    if ( $update_previous_from_db == "true"){
        // update  previous version of this class
    } else {
        // add new class to db
    }
    // then return it to be dynamically added to view
    //echo "<li><span class=\"id_span\">[" . $_POST["id"] . "]</span><h2>" . $_POST["title"] . "</h2><br><span class=\"field_span\"><label>Καθηγητής/ές: </label>" . $_POST["professors"] . "</span><span class=\"field_span\"><label>Εξάμηνο: </label>" . $_POST["semester"] . "o</span><br><label>Σχόλια: </label>" . $_POST["comments"] . "</li>\n";
    $class = [$_POST["id"], $_POST["title"], $_POST["professors"], $_POST["semester"], $_POST["comments"] ];
    if ( !($update_previous_from_db == "true") ) echo "<li>\n";
    echo <<<EOT
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
                                    $maxSemesters = 8; // TODO: get from db
                                        for ( $i = 1 ; $i <= 8 ; $i++ ) { ?>
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
EOT;
    if ( ! ($update_previous_from_db == "true") ) echo "</li>\n";
?>