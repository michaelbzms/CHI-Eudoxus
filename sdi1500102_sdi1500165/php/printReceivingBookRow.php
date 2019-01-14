<?php 
function printReceivingBookRow($conn, $bcTuple) {
    // [eudoxusID, title, authors, version, versionYear, keywords, ISBN, Publisher, Tie, dimensions, pageNum, website, contents, excerpt, frontpage, backpage, received]
    $class = getById($conn, "class", $bcTuple['UNIVERSITY_CLASSES_id']);
    $book = getById($conn, "book", $bcTuple['BOOKS_id']);
    $publisherName = getBookPublisherName($conn, $book['idBook']);
    $front_page_url = ($book['front_page_url'] != null) ? $book['front_page_url'] : "/sdi1500102_sdi1500165/images/default_book_front_page.jpg";
    echo <<<EOT
    <div class="row border border-dark rounded mb-3 p-2">
        <div class="col-6 border-right border-dark">
            <h3 class="mt-1 mb-2">{$class['title']}</h3>
            <div class="row mt-2">
                <div class="col-3">
                    <img src="{$front_page_url}" alt="frontpage" class="frontpage frontpage-mini mb-2" data-toggle="modal" data-target="#book{$book['idBook']}"/>
                </div>
                <div class="col-9 pl-4">
                    <span class="simpler_link bookModalSpan d-inline-block mt-3 mb-2" data-toggle="modal" data-target="#book{$book['idBook']}"><h5 style="font-weight: 600">{$book['title']}</h5></span><br>
                    <p>
                        $publisherName<br>
                        {$book['version']}
                    </p>
EOT;
    if ($bcTuple['received']) echo "<img src=\"/sdi1500102_sdi1500165/images/checkGreen.png\" class=\"greenCheck\"/ data-toggle=\"tooltip\" data-placement=\"right\" title=\"Έχετε ήδη παραλάβει αυτό το σύγγραμμα.\">";
    echo <<<EOT
                </div>
            </div>
        </div>
        <div class="col-6">
            <ol style="padding-inline-start: 25px;">
EOT;
    echo "<li><a class=\"simpler_link\" href=\"/sdi1500102_sdi1500165/php/notimplemented.php\">Παραλαβή από φοιτητή</a></li>";
    $bookDistPoints = getBookDistPoints($conn, $book['idBook']);
    if ( count($bookDistPoints) > 0) {
        echo <<<EOT
                <li>
                    <div>Παραλαβή από Σημείο Διανομής
                        <div id="accordion{$class['idClass']}" class="mt-1">
EOT;
        foreach ($bookDistPoints as $distPoint) {
            echo <<<EOT
                            <div class="card mb-2">
                                <div class="card-header">
                                    <a class="collapsed card-link" data-toggle="collapse" href="#collapse{$distPoint['idUser']}_{$class['idClass']}">
                                        <h6 style="color: black"><span style="font-weight: 600">{$distPoint['name']}</span> (Διαθέσιμα: {$distPoint['count']})</h6>
                                    </a>
                                </div>
                                <div id="collapse{$distPoint['idUser']}_{$class['idClass']}" class="collapse" data-parent="#accordion{$class['idClass']}">
                                    <div class="card-body text-justify p-0">
                                        <table class="table table-striped table-sm mb-0">
                                            <tr>
                                                <th class="border-right pl-2">Διεύθυνση</th>
                                                <th class="font-weight-normal">{$distPoint['address']}</th>
                                            </tr>
                                            <tr>
                                                <th class="border-right pl-2">Email</th>
                                                <th class="font-weight-normal">{$distPoint['email']}</th>
                                            </tr>
                                            <tr>
                                                <th class="border-right pl-2">Τηλέφωνο</th>
                                                <th class="font-weight-normal">{$distPoint['phone']}</th>
                                            </tr>
                                            <tr>
                                                <th class="border-right pl-2">Ώρες Λειτουργίας</th>
                                                <th class="font-weight-normal">{$distPoint['working_hours']}</th>
                                            </tr>
                                            <tr>
                                                <th colspan="2 pl-2">Σημείο στο Χάρτη
                                                    <div class="mapouter mt-1 ml-2"><div class="gmap_canvas"><iframe width="565px" height="350px" id="gmap_canvas" src="{$distPoint['map_url']}" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.pureblack.de">pureblack.de</a></div><style>.mapouter{text-align:right;height:350px;width:565px;}.gmap_canvas {overflow:hidden;background:none!important;height:350px;width:565px;}</style></div>
                                                </th>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
EOT;
        }
    echo "              </div>
                    </div>
                </li>";
    }
    echo "  </ol>
        </div>
    </div>";
}
?>
