<?php
$post = $this->input->post();
?>
    <li class="fl form-label"><h2 class="form-sub-head">Personal details</h2></li>
    <li class="clear newline"/>

    <li class="fl form-label">Enquiry Moe<sup class="mandatory">*</sup></li>
    <li class="fl form-field">
            <?php echo form_dropdown('enquiry_mode', $enquiry_modes,$post['enquiry_mode'],'id="enquiry_mode" class="generic-input"');?>
    </li>
    <li class="clear newline"/>

    <li class="fl form-label">First Name<sup class="mandatory">*</sup></li>
    <li class="fl form-field"><input class="generic-input validate validate-mandatory" type="text" name="firstName" id="firstName" placeholder="First Name" value="<?php echo $post['firstName']?>"/></li>
    <li class="clear newline"/>

    <li class="fl form-label">Last Name<sup class="mandatory">*</sup></li>
    <li class="fl form-field"><input class="generic-input validate validate-mandatory" type="text" name="lastName" id="lastName" placeholder="Last Name" value="<?php echo $post['lastName']?>"/></li>
    <li class="clear newline"/>

    <li class="fl form-label">Address</li>
    <li class="fl form-field"><textarea name="address" class="generic-textarea" id="textarea"><?php echo $post['address']?></textarea></</li>
    <li class="clear newline"/>

    <li class="fl form-label">Country<sup class="mandatory">*</sup></li>
    <li class="fl form-field">
        <?php echo form_dropdown('country_id', $countries,$post['country_id'],'id="country_id" class="generic-input"');?>
    </li>
    <li class="clear newline"/>




    <li class="fl form-label">State</li>
    <li class="fl form-field"><input class="generic-input" type="text" name="state" id="state" placeholder="State"  value="<?php echo $post['state']?>"/></li>
    <li class="clear newline"/>

    <li class="fl form-label">Pin Code<sup class="mandatory">*</sup></li>
    <li class="fl form-field"><input class="generic-input" type="text" name="pincode" id="state" placeholder="Pin Code"  value="<?php echo $post['pincode']?>"/></li>
    <li class="clear newline"/>

</ul>
<ul class="fl form-fields-ul-slider">

    <li class="fl form-label">&nbsp;</li>
    <li class="fl form-field">&nbsp;</li>
    <li class="clear newline"/>


    <li class="fl form-label">Email<sup class="mandatory">*</sup></li>
    <li class="fl form-field"><input class="generic-input  validate validate-email" type="text" name="email_id" id="email_id" placeholder="Email" value="<?php echo $post['email_id']?>"/></li>
    <li class="clear newline"/>

    <li class="fl form-label">Phone<sup class="mandatory">*</sup></li>
    <li class="fl form-field"><input class="generic-input  validate validate-mandatory" type="text" required name="phone" id="phone" placeholder="Phone" value="<?php echo $post['phone']?>"/></li>
    <li class="clear newline"/>

    <li class="fl form-label">Source</li>
    <li class="fl form-field">
        <?php echo form_dropdown('publicity_source', $publicity_sources,$post['publicity_source'],'id="publicity_source" class="generic-input"');?>
    </li>
    <li class="clear newline"/>

    <li class="fl form-label">Description</li>
    <li class="fl form-field"><textarea class="generic-textarea" name="description" id="description"><?php echo $post['description']?></textarea></li>
    <li class="clear newline"/>