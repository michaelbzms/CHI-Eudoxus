<?php /* $book must be declared before including this with ALL of its fields (and string keys) */ 
    $front_page = ($book['front_page_url'] != null) ? $book['front_page_url'] : "/sdi1500102_sdi1500165/images/default_book_front_page.jpg";
?>
<li class="pl-2 mt-4 mb-3">
    <div style="height: 5px;" class="row"></div>
    <div class="row">
        <div class="col-1">
            <img class="frontpage frontpage-extra-mini" src="<?php echo $front_page; ?>" data-toggle="modal" data-target="#book<?php echo $book['idBook']; ?>"/>
        </div>
        <div class="col-11">
            <span class="simpler_link bookModalSpan" data-toggle="modal" data-target="#book<?php echo $book['idBook']; ?>"><h3><?php echo $book['title']; ?></h3></span>
            <span class="field_span"><label>Συγγραφέας/ες:</label> <?php echo $book['authors']; ?></span><span class="field_span"><label>Έτος:</label> <?php echo $book['published_year']; ?></span><br>
            <label>ISBN:</label> <?php echo $book['ISBN']; ?><br>
        </div>
    </div>
</li>