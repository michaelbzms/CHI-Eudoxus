<?php 
function bookModal($conn, $book) {
    $publisherName = getBookPublisherName($conn, $book['idBook']);
    $front_page_url = ($book['front_page_url'] != null) ? $book['front_page_url'] : "/sdi1500102_sdi1500165/images/default_book_front_page.jpg";
    $back_page_url = ($book['back_page_url'] != null) ? $book['back_page_url'] : "/sdi1500102_sdi1500165/images/default_book_front_page.jpg";
    echo <<<EOT
    <div class="modal fade" id="book{$book['idBook']}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered book-modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col-3 mr-2"></div> <!-- this is only for spacing -->
                    <h3 class="modal-title book_title">{$book['title']}</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-3 text-center mb-2">
                            <img src="{$front_page_url}" alt="frontpage" height="50%" width="100%" class="d-block mb-2"/>
                            <img src="{$back_page_url}" alt="backpage" height="50%" width="100%" class="d-block"/>
                        </div>
                        <div class="col-9 pr-4">
                            <br>
                            <!-- OLD WAY: 
                            <h4>Κωδικός Βιβλίου:&ensp;<span class="font-weight-normal">{$book['idBook']}</span></h4>
                            <h4>Συγγραφέας/είς:&ensp;<span class="font-weight-normal">{$book['authors']}</span></h4><br> 
                            -->
                            <table class="table table-striped border book_table">
                                <tr>
                                    <th>Κωδικός Βιβλίου:</th>
                                    <th class="font-weight-normal">{$book['idBook']}</th>
                                </tr>
                                <tr>
                                    <th>Συγγραφέας/είς:</th>
                                    <th class="font-weight-normal">{$book['authors']}</th>
                                </tr>
                                <tr>
                                    <th>Αριθμός Έκδοσης:</th>
                                    <th class="font-weight-normal">{$book['version']}</th>
                                </tr>
                                <tr>
                                    <th>Έτος Τρέχουσας Έκδοσης:</th>
                                    <th class="font-weight-normal">{$book['published_year']}</th>
                                </tr>
                                <tr>
                                    <th>Λέξεις-κλειδιά:</th>
                                    <th class="font-weight-normal">{$book['keywords']}</th>
                                </tr>
                                <tr>
                                    <th>ISBN:</th>
                                    <th class="font-weight-normal">{$book['ISBN']}</th>
                                </tr>
                                <tr>
                                    <th>Εκδόσεις:</th>
                                    <th class="font-weight-normal">$publisherName</th>
                                </tr>
                                <tr>
                                    <th>Δέσιμο:</th>
                                    <th class="font-weight-normal">{$book['Tie']}</th>
                                </tr>
                                <tr>
                                    <th>Διαστάσεις:</th>
                                    <th class="font-weight-normal">{$book['dimensions']}</th>
                                </tr>
                                <tr>
                                    <th>Αριθμός σελίδων:</th>
                                    <th class="font-weight-normal">{$book['pagecount']}</th>
                                </tr>
                                <tr>
                                    <th>Ιστοσελίδα:</th>
                                    <th><a href="{$book['webpage_url']}" target="_blank"><img src="/sdi1500102_sdi1500165/images/outlink.png" height="32px" width="32px"></a></th>
                                </tr>
                            </table>
                            <div class="text-center">
                                <a href="{$book['contents_url']}" class="d-inline-block m-1" target="_blank">Πίνακας Περιεχομένων</a><br>
                                <a href="{$book['excerpt_url']}" class="d-inline-block m-2" target="_blank">Ενδεικτικό Απόσπασμα</a>
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
