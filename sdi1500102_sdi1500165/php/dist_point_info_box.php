<?php /* $distpoint must be declared before including this with ALL of its fields (and string keys) */  ?>
<li class="pl-2 mt-4 mb-3">
    <h4 class="small_title"><?php echo $distpoint['name']; ?></h4>
    <table class="table table-striped table-sm border">
        <tr>
            <td class="w-50 pl-2">Διεύθυνση:</td>
            <td class="w-50 pr-2"><?php echo $distpoint['address']; ?></td>
        </tr>
        <tr>
            <td class="w-50 pl-2">Email:</td>
            <td class="w-50 pr-2"><?php echo $distpoint['email']; ?></td>
        </tr>
        <tr>
            <td class="w-50 pl-2">Τηλέφωνο:</td>
            <td class="w-50 pr-2"><?php echo $distpoint['phone']; ?></td>
        </tr>
        <tr>
            <td class="w-50 pl-2">Ώρες Λειτουργίας:</td>
            <td class="w-50 pr-2"><?php echo $distpoint['working_hours']; ?></td>
        </tr>
    </table>
</li>