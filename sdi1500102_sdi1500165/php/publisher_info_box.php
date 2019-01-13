<?php /* $publisher must be declared before including this with ALL of its fields (and string keys) */  ?>
<li class="pl-2 mt-4 mb-3">
    <h4 class="small_title"><?php echo $publisher['firstname'] . " " . $publisher['lastname'] ; ?></h4>
    <table class="table table-striped table-sm border">
        <tr>
            <td class="w-50 pl-2">Διεύθυνση:</td>
            <td class="w-50 pr-2"><?php echo $publisher['address']; ?></td>
        </tr>
        <tr>
            <td class="w-50 pl-2">Email:</td>
            <td class="w-50 pr-2"><?php echo $publisher['email']; ?></td>
        </tr>
        <tr>
            <td class="w-50 pl-2">Τηλέφωνο:</td>
            <td class="w-50 pr-2"><?php echo $publisher['phone']; ?></td>
        </tr>
    </table>
</li>