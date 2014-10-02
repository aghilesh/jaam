<?php
$post = $this->input->post();
$enquiryMain = $enquiry_details['enquiryMain'];
?>
    <li class="fl form-label"><h2 class="form-sub-head strong">Personal details</h2></li>
    <li class="clear newline"/>

    <li class="fl form-label">Enquiry Mode<sup class="mandatory">*</sup></li>
    <li class="fl form-field">
            <?php echo form_dropdown('enquiry_mode', $enquiry_modes,$post['enquiry_mode'],'id="enquiry_mode" class="generic-input"');?>
    </li>
    <li class="clear newline"/>

    <li class="fl form-label">First Name<sup class="mandatory">*</sup></li>
    <li class="fl form-field"><input class="generic-input validate validate-mandatory" type="text" name="firstName" id="firstName" placeholder="First Name" value="<?php echo getFieldValue('firstName',$enquiryMain->first_name)?>"/></li>
    <li class="clear newline"/>

    <li class="fl form-label">Last Name<sup class="mandatory">*</sup></li>
    <li class="fl form-field"><input class="generic-input validate validate-mandatory" type="text" name="lastName" id="lastName" placeholder="Last Name" value="<?php echo getFieldValue('lastName',$enquiryMain->last_name)?>"/></li>
    <li class="clear newline"/>

    <li class="fl form-label">Address</li>
    <li class="fl form-field"><textarea name="address" class="generic-textarea" id="textarea"><?php echo getFieldValue('address',$enquiryMain->address)?></textarea></</li>
    <li class="clear newline"/>

    <li class="fl form-label">Country<sup class="mandatory">*</sup></li>
    <li class="fl form-field">
        <?php echo form_dropdown('country_id', $countries,getFieldValue('country_id',$enquiryMain->country_id),'id="country_id" class="generic-input"');?>
    </li>
    <li class="clear newline"/>




    <li class="fl form-label">State</li>
    <li class="fl form-field"><input class="generic-input" type="text" name="state" id="state" placeholder="State"  value="<?php echo getFieldValue('state',$enquiryMain->state)?>"/></li>
    <li class="clear newline"/>

    <li class="fl form-label">Pin Code<sup class="mandatory">*</sup></li>
    <li class="fl form-field"><input class="generic-input" type="text" name="pincode" id="state" placeholder="Pin Code"  value="<?php echo getFieldValue('pincode',$enquiryMain->pincode)?>"/></li>
    <li class="clear newline"/>

</ul>
<ul class="fl form-fields-ul-slider">

    <li class="fl form-label">&nbsp;</li>
    <li class="fl form-field">&nbsp;</li>
    <li class="clear newline"/>


    <li class="fl form-label">Email<sup class="mandatory">*</sup></li>
    <li class="fl form-field"><input class="generic-input  validate validate-email" type="text" name="email_id" id="email_id" placeholder="Email" value="<?php echo getFieldValue('email_id',$enquiryMain->email_id)?>"/></li>
    <li class="clear newline"/>

    <li class="fl form-label">Phone<sup class="mandatory">*</sup></li>
    <li class="fl form-field"><input class="generic-input  validate validate-mandatory" type="text" required name="phone" id="phone" placeholder="Phone" value="<?php echo getFieldValue('phone',$enquiryMain->phone_no)?>"/></li>
    <li class="clear newline"/>

    <li class="fl form-label">Source</li>
    <li class="fl form-field">
        <?php 
        $fieldValuePublicitySource = getFieldValue('publicity_source',$enquiryMain->source);
        echo form_dropdown('publicity_source', $publicity_sources, $fieldValuePublicitySource,'id="publicity_source" class="generic-input" onChange="Enquiry.toggleDescription(this)" ');
        foreach($publicity_sources as $k=>$v) {
            if($fieldValuePublicitySource == $k) {
                $fieldTxtValuePublicitySource = strtolower($v);
                break;
            }
        }
        ?>
    </li>
    <li class="clear newline"/>
    
    <li class="fl form-label source-desc-visible <?php echo $fieldTxtValuePublicitySource!='other' ? 'hidden' : '' ?>">Source Description</li>
    <li class="fl form-field source-desc-visible <?php echo $fieldTxtValuePublicitySource!='other' ? 'hidden' : '' ?>"><textarea class="generic-textarea" name="source_description" id="source_description"><?php echo getFieldValue('source_description',$enquiryMain->source_description)?></textarea></li>
    <li class="clear newline source-desc-visible <?php echo $fieldTxtValuePublicitySource!='other' ? 'hidden' : '' ?>"/>

    <li class="fl form-label">Description</li>
    <li class="fl form-field"><textarea class="generic-textarea" name="description" id="description"><?php echo getFieldValue('description',$enquiryMain->discription)?></textarea></li>
    <li class="clear newline"/>