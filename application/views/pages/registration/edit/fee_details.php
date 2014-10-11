<?php
$post = $this->input->post();
$registrationMain = $registration_details['registrationMain'];
?>
    <li class="fl form-label"><h2 class="form-sub-head strong">Fee Details</h2></li>
    <li class="clear newline"/>

    <li class="fl form-label">Total Fee<sup class="mandatory">*</sup></li>
    <li class="fl form-field">
       <input class="generic-input validate validate-mandatory" type="text" name="total_fee" id="total_fee" placeholder="Total Fee" value="<?php echo getFieldValue('total_fee',$registrationMain->total_fee)?>"/>
    </li>
    <li class="clear newline"/>

    <li class="fl form-label">Comments<sup class="mandatory">*</sup></li>
    <li class="fl form-field">
        <textarea name="comments" class="generic-textarea" id="comments"><?php echo getFieldValue('comments',$registrationMain->comments)?></textarea>
    </li>
    <li class="clear newline"/>

