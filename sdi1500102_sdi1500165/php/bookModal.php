<?php 
function bookModal($bookRow) {
    // [eudoxusID, title, authors, version, versionYear, keywords, ISBN, Publisher, Tie, dimensions, pageNum, website, contents, excerpt, frontpage, backpage]
    echo <<<EOT
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#book$bookRow[0]">
        $bookRow[1]
    </button>
    <div class="modal fade" id="book$bookRow[0]" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered book-modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">$bookRow[1]</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-3 text-center mb-2">
                            <img src=$bookRow[14] alt="frontpage" height="50%" width="100%" class="d-block mb-2"/>
                            <img src=$bookRow[15] alt="backpage" height="50%" width="100%" class="d-block"/>
                        </div>
                        <div class="col-9 pr-4">
                            <br>
                            <h4>Κωδικός Βιβλίου στον Εύδοξο:&ensp;<span class="font-weight-normal">$bookRow[0]</span></h4>
                            <h4>Συγγραφέας/είς:&ensp;<span class="font-weight-normal">$bookRow[2]</span></h4><br>
                            <table class="table table-striped border book_table">
                                <tr>
                                    <th>Αριθμός Έκδοσης:</th>
                                    <th class="font-weight-normal">$bookRow[3]</th>
                                </tr>
                                <tr>
                                    <th>Έτος Τρέχουσας Έκδοσης:</th>
                                    <th class="font-weight-normal">$bookRow[4]</th>
                                </tr>
                                <tr>
                                    <th>Λέξεις-κλειδιά:</th>
                                    <th class="font-weight-normal">$bookRow[5]</th>
                                </tr>
                                <tr>
                                    <th>ISBN:</th>
                                    <th class="font-weight-normal">$bookRow[6]</th>
                                </tr>
                                <tr>
                                    <th>Εκδόσεις:</th>
                                    <th class="font-weight-normal">$bookRow[7]</th>
                                </tr>
                                <tr>
                                    <th>Δέσιμο:</th>
                                    <th class="font-weight-normal">$bookRow[8]</th>
                                </tr>
                                <tr>
                                    <th>Διαστάσεις:</th>
                                    <th class="font-weight-normal">$bookRow[9]</th>
                                </tr>
                                <tr>
                                    <th>Αριθμός σελίδων:</th>
                                    <th class="font-weight-normal">$bookRow[10]</th>
                                </tr>
                                <tr>
                                    <th>Ιστοσελίδα:</th>
                                    <th><a href=$bookRow[11] target="_blank"><img src="/sdi1500102_sdi1500165/images/outlink.png" height="32px" width="32px"></a></th>
                                </tr>
                            </table>
                            <div class="text-center">
                                <a href=$bookRow[12] class="d-inline-block m-1" target="_blank">Πίνακας Περιεχομένων</a><br>
                                <a href=$bookRow[13] class="d-inline-block m-2" target="_blank">Ενδεικτικό Απόσπασμα</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
EOT;
}
?>
