<?php /* $book must be declared before including this with ALL of its fields (and string keys) */ 
    $front_page = ($book['front_page_url'] != null) ? $book['front_page_url'] : "/sdi1500102_sdi1500165/images/default_book_front_page.jpg";
?>
<li class="pl-2 mt-4 mb-3">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-11">
            <span class="simpler_link bookModalSpan" data-toggle="modal" data-target="#book<?php echo $book['idBook']; ?>"><h3><?php echo $book['title']; ?></h3></span>
        </div>
    </div>
    <div class="row">
        <div class="col-1">
            <img class="frontpage frontpage-extra-mini" src="<?php echo $front_page; ?>" data-toggle="modal" data-target="#book<?php echo $book['idBook']; ?>"/>
        </div>
        <div class="col-11">
            <table class="table table-striped table-sm border">
                <tr>
                    <td class="w-50 pl-2">Συγγραφέας/ες:</td>
                    <td class="w-50 pr-2"><?php echo $book['authors']; ?></td>
                </tr>
                <tr>
                    <td class="w-50 pl-2">Έτος:</td>
                    <td class="w-50 pr-2"><?php echo $book['published_year']; ?></td>
                </tr>
                <tr>
                    <td class="w-50 pl-2">ISBN:</td>
                    <td class="w-50 pr-2"><?php echo $book['ISBN']; ?></td>
                </tr>
            </table>
        </div>
    </div>
</li>