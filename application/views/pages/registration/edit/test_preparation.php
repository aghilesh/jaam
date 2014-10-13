<?php
$post = $this->input->post();
$testPrepare = $registration_details['testPrepareDetails'];
?>
    <li class="fl form-label"><h2 class="form-sub-head strong">Test Preparation</h2></li>
    <li class="clear newline"/>

    <li class="fl form-label">TOFFEL</li>
    <li class="fl form-field">
       <input class="generic-input validate validate-mandatory" type="text" name="testPrepTOFFEL" id="testPrepTOFFEL" placeholder="Score" value="<?php echo getFieldValue('testPrepTOFFEL',$testPrepare->toffel)?>"/>
    </li>
    <li class="clear newline"/>

    <li class="fl form-label">GMAT</li>
    <li class="fl form-field"><input class="generic-input validate validate-mandatory" type="text" name="testPrepGMAT" id="testPrepGMAT" placeholder="Score" value="<?php echo getFieldValue('testPrepGMAT',$testPrepare->gmat)?>"/></li>
    <li class="clear newline"/>

    <li class="fl form-label">SAT</li>
    <li class="fl form-field"><input class="generic-input validate validate-mandatory" type="text" name="testPrepSAT" id="testPrepSAT" placeholder="Score" value="<?php echo getFieldValue('testPrepSAT',$testPrepare->sat)?>"/></li>
    <li class="clear newline"/>
    
    
    <li class="fl form-label">Started Coaching</li>
    <li class="fl form-field">
            <?php
            $testPrepStartCoachingYes = getFieldValue('testPrepStartCoaching',$testPrepare->started_coaching);
            $testPrepStartCoachingNo = !$testPrepStartCoachingYes;
            ?>
           <input class="" <?php echo $testPrepStartCoachingYes ? ' checked ' : ''?> type="radio" name="testPrepStartCoaching" id="testPrepStartCoachingYes" value="1"/><label for="testPrepStartCoachingYes">Yes</label>
           <input class="" <?php echo $testPrepStartCoachingNo ? ' checked ' : ''?> type="radio" name="testPrepStartCoaching" id="testPrepStartCoachingNo" value="0"/><label for="testPrepStartCoachingNo">No</label>
    </li>
    <li class="clear newline"/>
    
    <li class="fl form-label">Looking for Coaching</li>
    <li class="fl form-field">
            <?php
            $testPrepLookCoachingYes = getFieldValue('testPrepLookForCoaching',$testPrepare->looking_for_coaching);
            $testPrepLookCoachingNo = !$testPrepLookCoachingYes;
            ?>
           <input class="" <?php echo $testPrepLookCoachingYes ? ' checked ' : ''?> type="radio" name="testPrepLookForCoaching" id="testPrepLookForCoachingYes" value="1"/><label for="testPrepLookForCoachingYes">Yes</label>
           <input class="" <?php echo $testPrepLookCoachingNo ? ' checked ' : ''?> type="radio" name="testPrepLookForCoaching" id="testPrepLookForCoachingNo" value="0"/><label for="testPrepLookForCoachingNo">No</label>
    </li>
    <li class="clear newline"/>
    
    <li class="fl form-label">Looking for Waier</li>
    <li class="fl form-field">
             <?php
            $testPrepLookForWaierYes = getFieldValue('testPrepLookForWaier',$testPrepare->looking_for_waier);
            $testPrepLookForWaierNo = !$testPrepLookForWaierYes;
            ?>
           <input class="" <?php echo $testPrepLookForWaierYes ? ' checked ' : ''?> type="radio" name="testPrepLookForWaier" id="testPrepLookForWaierYes" value="1"/><label for="testPrepLookForWaierYes">Yes</label>
           <input class=""  <?php echo $testPrepLookForWaierNo ? ' checked ' : ''?>  type="radio" name="testPrepLookForWaier" id="testPrepLookForWaierNo" value="0"/><label for="testPrepLookForWaierNo">No</label>
    </li>
    <li class="clear newline"/>
</ul>
<ul class="fl form-fields-ul-slider">

    <li class="fl form-label">&nbsp;</li>
    <li class="fl form-field">&nbsp;</li>
    <li class="clear newline"/>


    <li class="fl form-label">IELTS</li>
    <li class="fl form-field"><input class="generic-input validate validate-mandatory" type="text" name="testPrepIELTS" id="testPrepIELTS" placeholder="Score" value="<?php echo getFieldValue('testPrepIELTS',$testPrepare->ielts)?>"/></li>
    <li class="clear newline"/>

    <li class="fl form-label">GRE</li>
    <li class="fl form-field"><input class="generic-input validate validate-mandatory" type="text" name="testPrepGRE" id="testPrepGRE" placeholder="Score" value="<?php echo getFieldValue('testPrepGRE',$testPrepare->gre)?>"/></li>
    <li class="clear newline"/>
    
    <li class="fl form-label">Mode</li>
    <li class="fl form-field">
        <?php
        $modes =  array("regular"=>"Regular","fasttrack"=>"Fast track");
        echo form_dropdown('testPrepCourseMode', $modes,getFieldValue('testPrepCourseMode',$testPrepare->regular_or_fasttrack),'class="generic-input"');?>
    </li>
    <li class="clear newline"/>
    
    <li class="fl form-label">Work Experience</li>
    <li class="fl form-field"><textarea class="generic-textarea" name="testPrepWorkExperience" id="testPrepWorkExperience"><?php echo getFieldValue('testPrepWorkExperience',$testPrepare->work_experiance)?></textarea></li>
    <li class="clear newline"/>
    <input type="hidden" name="testPrepareId" value="<?php echo $testPrepare->tp_id?>"/>