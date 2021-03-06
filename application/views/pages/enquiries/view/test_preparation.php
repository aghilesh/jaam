<?php
$enquiryMain = $enquiry_details['enquiryMain'];
?>
    <li class="fl form-label"><h2 class="form-sub-head">Test Preparation</h2></li>
    <li class="clear newline"/>

    <li class="fl form-label">TOFFEL</li>
    <li class="fl form-field">
       <?php echo $enquiryMain->toffel?>
    </li>
    <li class="clear newline"/>

    <li class="fl form-label">GMAT</li>
    <li class="fl form-field"><?php echo $enquiryMain->gmat?></li>
    <li class="clear newline"/>

    <li class="fl form-label">SAT</li>
    <li class="fl form-field"><?php echo $enquiryMain->sat?></li>
    <li class="clear newline"/>
    
    
    <li class="fl form-label">Started Coaching</li>
    <li class="fl form-field">
            <?php
            $testPrepStartCoachingYes = $enquiryMain->started_coaching;
            $testPrepStartCoachingNo = !$testPrepStartCoachingYes;
            ?>
           <input class="" <?php echo $testPrepStartCoachingYes ? ' checked ' : ''?> disabled type="radio" name="testPrepStartCoaching" id="testPrepStartCoachingYes" value="1"/><label for="testPrepStartCoachingYes">Yes</label>
           <input class="" <?php echo $testPrepStartCoachingNo ? ' checked ' : ''?> disabled type="radio" name="testPrepStartCoaching" id="testPrepStartCoachingNo" value="0"/><label for="testPrepStartCoachingNo">No</label>
    </li>
    <li class="clear newline"/>
    
    <li class="fl form-label">Looking for Coaching</li>
    <li class="fl form-field">
            <?php
            $testPrepLookCoachingYes = $enquiryMain->looking_for_coaching;
            $testPrepLookCoachingNo = !$testPrepLookCoachingYes;
            ?>
           <input class="" <?php echo $testPrepLookCoachingYes ? ' checked ' : ''?> disabled type="radio" name="testPrepLookForCoaching" id="testPrepLookForCoachingYes" value="1"/><label for="testPrepLookForCoachingYes">Yes</label>
           <input class="" <?php echo $testPrepLookCoachingNo ? ' checked ' : ''?> disabled type="radio" name="testPrepLookForCoaching" id="testPrepLookForCoachingNo" value="0"/><label for="testPrepLookForCoachingNo">No</label>
    </li>
    <li class="clear newline"/>
    
    <li class="fl form-label">Looking for Waier</li>
    <li class="fl form-field">
             <?php
            $testPrepLookForWaierYes = $enquiryMain->looking_for_waier;
            $testPrepLookForWaierNo = !$testPrepLookForWaierYes;
            ?>
           <input class="" <?php echo $testPrepLookForWaierYes ? ' checked ' : ''?> disabled type="radio" name="testPrepLookForWaier" id="testPrepLookForWaierYes" value="1"/><label for="testPrepLookForWaierYes">Yes</label>
           <input class=""  <?php echo $testPrepLookForWaierNo ? ' checked ' : ''?> disabled type="radio" name="testPrepLookForWaier" id="testPrepLookForWaierNo" value="0"/><label for="testPrepLookForWaierNo">No</label>
    </li>
    <li class="clear newline"/>
</ul>
<ul class="fl form-fields-ul-slider">

    <li class="fl form-label">&nbsp;</li>
    <li class="fl form-field">&nbsp;</li>
    <li class="clear newline"/>


    <li class="fl form-label">IELTS</li>
    <li class="fl form-field"><?php echo $enquiryMain->ielts?></li>
    <li class="clear newline"/>

    <li class="fl form-label">GRE</li>
    <li class="fl form-field"><?php echo $enquiryMain->gre?></li>
    <li class="clear newline"/>
    
    <li class="fl form-label">Mode</li>
    <li class="fl form-field">
        <?php
        $modes =  array("regular"=>"Regular","fasttrack"=>"Fast track");
        echo $enquiryMain->regular_or_fast_track
        ?>
    </li>
    <li class="clear newline"/>
    
    <li class="fl form-label">Work Experience</li>
    <li class="fl form-field"><?php echo $enquiryMain->work_experiance?></li>
    <li class="clear newline"/>