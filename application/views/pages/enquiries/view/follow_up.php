<?php
$enquiryMain = $enquiry_details['enquiryMain'];
$followUp = $enquiry_details['followUp'];
?>
    <li class="fl form-label"><h2 class="form-sub-head strong">Follow up</h2></li>
    <li class="clear newline"/>

    <li class="fl form-label">Title</li>
    <li class="fl form-field">
       <?php echo $followUp->title?>
    </li>
    <li class="clear newline"/>

    <li class="fl form-label">Description</li>
    <li class="fl form-field">
         <?php echo $followUp->description?></textarea>
    </li>
    <li class="clear newline"/>

    <li class="fl form-label">Assigned To</li>
    <li class="fl form-field">
        <?php echo getUserName($followUp->assigned_to)?>
    </li>
    <li class="clear newline"/>
    
    
    <li class="fl form-label">Date</li>
    <li class="fl form-field">
        <?php echo $followUp->when?>
    </li>
    <li class="clear newline"/>

