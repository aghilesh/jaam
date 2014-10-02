<?php
$enquiryMain = $enquiry_details['enquiryMain'];
?>
    <li class="fl form-label"><h2 class="form-sub-head strong">Personal details</h2></li>
    <li class="clear newline"/>

    <li class="fl form-label">Enquiry Mode</li>
    <li class="fl form-field">
            <?php echo getEnquiryModeName($enquiryMain->enquiry_mode)?>
    </li>
    <li class="clear newline"/>

    <li class="fl form-label">First Name</li>
    <li class="fl form-field"><?php echo $enquiryMain->first_name?></li>
    <li class="clear newline"/>

    <li class="fl form-label">Last Name</li>
    <li class="fl form-field"><?php echo $enquiryMain->last_name?></li>
    <li class="clear newline"/>

    <li class="fl form-label">Address</li>
    <li class="fl form-field"><?php echo $enquiryMain->address?></</li>
    <li class="clear newline"/>

    <li class="fl form-label">Country</li>
    <li class="fl form-field">
        <?php echo $enquiryMain->country_id?>
    </li>
    <li class="clear newline"/>




    <li class="fl form-label">State</li>
    <li class="fl form-field"><?php echo $enquiryMain->state?></li>
    <li class="clear newline"/>

    <li class="fl form-label">Pin Code</li>
    <li class="fl form-field"><?php echo $enquiryMain->pincode?></li>
    <li class="clear newline"/>

</ul>
<ul class="fl form-fields-ul-slider">

    <li class="fl form-label">&nbsp;</li>
    <li class="fl form-field">&nbsp;</li>
    <li class="clear newline"/>


    <li class="fl form-label">Email</li>
    <li class="fl form-field"><?php echo $enquiryMain->email_id?></li>
    <li class="clear newline"/>

    <li class="fl form-label">Phone</li>
    <li class="fl form-field"><?php echo $enquiryMain->phone_no?></li>
    <li class="clear newline"/>

    <li class="fl form-label">Source</li>
    <li class="fl form-field">
        <?php 
        $fieldValuePublicitySource = $enquiryMain->source;
        echo getEnquirySourceName($fieldValuePublicitySource);
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
    <li class="fl form-field source-desc-visible <?php echo $fieldTxtValuePublicitySource!='other' ? 'hidden' : '' ?>"><?php echo $enquiryMain->source_description?></li>
    <li class="clear newline source-desc-visible <?php echo $fieldTxtValuePublicitySource!='other' ? 'hidden' : '' ?>"/>

    <li class="fl form-label">Description</li>
    <li class="fl form-field"><?php echo $enquiryMain->discription?></li>
    <li class="clear newline"/>