<?php 
function printReceivingBookRow($subject, $bookRow) {
    // [eudoxusID, title, authors, version, versionYear, keywords, ISBN, Publisher, Tie, dimensions, pageNum, website, contents, excerpt, frontpage, backpage, received]
    echo <<<EOT
    <div class="row border border-dark rounded mb-3 p-2">
        <div class="col-6 border-right border-dark">
            <h5>$subject</h5>
            <div class="row mt-2">
                <div class="col-3">
                    <img src=$bookRow[14] alt="frontpage" class="frontpage frontpage-mini mb-2" data-toggle="modal" data-target="#book$bookRow[0]"/>
                </div>
                <div class="col-9">
                    <span class="bookModalSpan d-inline-block mt-3 mb-2" data-toggle="modal" data-target="#book$bookRow[0]"><strong>$bookRow[1]</strong></span><br>
                    <p>
                        $bookRow[2]<br>
                        $bookRow[7]
                    </p>
EOT;
    if ($bookRow[16]) echo "<img src=\"/sdi1500102_sdi1500165/images/checkGreen.png\" class=\"greenCheck\"/ data-toggle=\"tooltip\" data-placement=\"right\" title=\"Έχετε ήδη παραλάβει αυτό το σύγγραμμα.\">";
    echo <<<EOT
                </div>
            </div>
        </div>
        <div class="col-6">
            <ol style="padding-inline-start: 25px;">
EOT;
    // get these from db
    $bookOptions = [7.34, [["distPointID", "availableNum"], [00456, 3]] ];
    $distPointsRows = [ ["distPointID", "name", "address", "email", "phone", "workingHours", "mapLink"], [00456, "Κλειδάριθμος", "Στουρνάρη 27β 10682 Αθήνα", "info@klidarithmos.gr", "210 3832044", "Δευτέρα - Παρασκευή: 09:30 - 17:30, Σάββατο & Κυριακή κλειστά", "https://maps.google.com/maps?q=%CF%83%CF%84%CE%BF%CF%85%CF%81%CE%BD%CE%AC%CF%81%CE%B7%2027%CE%B2&t=&z=13&ie=UTF8&iwloc=&output=embed"] ];
    echo <<<EOT
                <li><a href="/sdi1500102_sdi1500165/php/notimplemented.php">Παραλαβή από φοιτητή</a> [κερδίζετε $bookOptions[0] μονάδες]</li>
                <li>
                    <div>Παραλαβή από Σημείο Διανομής
                        <div id="accordion$bookRow[0]" class="mt-1">
EOT;
    $i = 0;
    foreach ($distPointsRows as $distPoint) {
        $available = $bookOptions[1][$i][1];
        echo <<<EOT
                            <div class="card">
                                <div class="card-header">
                                    <a class="collapsed card-link" data-toggle="collapse" href="#collapse$distPoint[0]_$bookRow[0]">
                                        <h6>$distPoint[1] (Διαθέσιμα: $available)</h6>
                                    </a>
                                </div>
                                <div id="collapse$distPoint[0]_$bookRow[0]" class="collapse" data-parent="#accordion$bookRow[0]">
                                    <div class="card-body text-justify p-0">
                                        <table class="table table-striped border">
                                            <tr>
                                                <th class="border-right">Διεύθυνση</th>
                                                <th class="font-weight-normal">$distPoint[2]</th>
                                            </tr>
                                            <tr>
                                                <th class="border-right">Email</th>
                                                <th class="font-weight-normal">$distPoint[3]</th>
                                            </tr>
                                            <tr>
                                                <th class="border-right">Τηλέφωνο</th>
                                                <th class="font-weight-normal">$distPoint[4]</th>
                                            </tr>
                                            <tr>
                                                <th class="border-right">Ώρες Λειτουργίας</th>
                                                <th class="font-weight-normal">$distPoint[5]</th>
                                            </tr>
                                            <tr>
                                                <th colspan="2">Σημείο στο Χάρτη
                                                    <div class="mapouter mt-1"><div class="gmap_canvas"><iframe width="565px" height="350px" id="gmap_canvas" src=$distPoint[6] frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.pureblack.de">pureblack.de</a></div><style>.mapouter{text-align:right;height:350px;width:565px;}.gmap_canvas {overflow:hidden;background:none!important;height:350px;width:565px;}</style></div>
                                                </th>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
EOT;
        $i++;
    }
    echo "              </div>
                    </div>
                </li>
            </ol>
        </div>
    </div>";
}
?>
