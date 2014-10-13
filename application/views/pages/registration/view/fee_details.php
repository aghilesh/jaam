<?php
$registrationMain = $registration_details['registrationMain'];
?>
    <li class="fl form-label"><h2 class="form-sub-head strong">Fee Details</h2></li>
    <li class="clear newline"/>

    <li class="fl form-label">Total Fee</li>
    <li class="fl form-field">
       <?php echo $registrationMain->total_fee?>
    </li>
    <li class="clear newline"/>

    <li class="fl form-label">Comments</li>
    <li class="fl form-field">
        <?php echo nl2br($registrationMain->comments)?>
    </li>
    <li class="clear newline"/>

