<?php
$post = $this->input->post();
?>
<div class="fl full-width">
    <div class="form-inner">
        <?php
        $attributes = array('class' => 'validate-form', 'id' => 'frmAgencyAdd','name'=>'frmAgencyAdd');
        echo form_open($paths['add'], $attributes);
        ?>
        <ul class="fl form-fields-ul-slider">
            <li class="fl form-label">Country<sup class="mandatory">*</sup></li>
            <li class="fl form-field">
                <?php echo form_dropdown('country_id', $countries,$post['country_id'],'id="country_id" class="generic-input"');?>
            </li>
            <li class="clear newline"/>
            
            <li class="fl form-label">Code<sup class="mandatory">*</sup></li>
            <li class="fl form-field"><input class="generic-input validate validate-mandatory" type="text" name="code" id="code" placeholder="Code" value="<?php echo $post['code']?>"/></li>
            <li class="clear newline"/>

            <li class="fl form-label">Agency<sup class="mandatory">*</sup></li>
            <li class="fl form-field"><input class="generic-input validate validate-mandatory" type="text" name="agency" id="agency" placeholder="Agency" value="<?php echo $post['agency']?>"/></li>
            <li class="clear newline"/>

            <li class="fl form-label">Description</li>
            <li class="fl form-field"><input class="generic-input" type="text" name="description" id="description" placeholder="Description" value="<?php echo $post['description']?>"/></li>
            <li class="clear newline"/>

            <li class="fl form-label">Contact Person</li>
            <li class="fl form-field"><input class="generic-input" type="text" name="contact_person" id="contact_person" placeholder="Contact Person" value="<?php echo $post['contact_person']?>"/></li>
            <li class="clear newline"/>

            <li class="fl form-label">Address</li>
            <li class="fl form-field"><input class="generic-input" type="text" name="address" id="address" placeholder="Address"  value="<?php echo $post['address']?>"/></li>
            <li class="clear newline"/>

        </ul>
        <ul class="fl form-fields-ul-slider">
            
            <li class="fl form-label">Email<sup class="mandatory">*</sup></li>
            <li class="fl form-field"><input class="generic-input  validate validate-email" type="text" name="email_id" id="email_id" placeholder="Email" value="<?php echo $post['email_id']?>"/></li>
            <li class="clear newline"/>
            
            <li class="fl form-label">Phone 1<sup class="mandatory">*</sup></li>
            <li class="fl form-field"><input class="generic-input  validate validate-mandatory" type="text" required name="phone1" id="phone1" placeholder="Phone 1" value="<?php echo $post['phone1']?>"/></li>
            <li class="clear newline"/>

            <li class="fl form-label">Phone 2</li>
            <li class="fl form-field"><input class="generic-input" type="text" name="phone2" id="phone2" placeholder="Phone 2" value="<?php echo $post['phone2']?>"/></li>
            <li class="clear newline"/>

            <li class="fl form-label">Commission %</li>
            <li class="fl form-field"><input class="generic-input" type="text" name="commission_percentage" id="commission_percentage" placeholder="Commission %"  value="<?php echo $post['commission_percentage']?>"/></li>
            <li class="clear newline"/>

            <li class="fl form-label">Application Fee</li>
            <li class="fl form-field"><input class="generic-input" type="text" name="application_fee" id="application_fee" placeholder="Application Fee"  value="<?php echo $post['application_fee']?>"/></li>
            <li class="clear newline"/>

            <li class="fl form-label">Service Charge</li>
            <li class="fl form-field"><input class="generic-input" type="text" name="service_charge" id="service_charge" placeholder="Service Charge" value="<?php echo $post['service_charge']?>"/></li>
            <li class="clear newline"/>

            <li class="fl form-label">&nbsp;</li>
            <li class="fl form-field" sty>
                <a href="<?php echo $this->config->item('base_url').$paths['list'] ?>" class="fl marginleft10 button cancel common-cancel-btn-click">Cancel</a>
                <a href="javascript:void(0)" class="fl button save common-save-btn-click">Save</a>
            </li>
            <li class="clear newline"/>
        </ul>
        <?php echo form_close(); ?>
    </div>
</div>