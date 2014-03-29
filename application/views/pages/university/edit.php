<div class="fl full-width">
    <div class="form-inner">
        <?php
        $attributes = array('class' => '', 'id' => '');
        echo form_open($paths['edit'].'/'.$university->id, $attributes);
        ?>
        <ul class="fl form-fields-ul-slider">
            <li class="fl form-label">Code</li>
            <li class="fl form-field"><input value="<?php echo @$university->code?>" class="generic-input" type="text" required name="code" id="code" placeholder="Code"/></li>
            <li class="clear newline"/>

            <li class="fl form-label">University</li>
            <li class="fl form-field"><input value="<?php echo @$university->university?>" class="generic-input" type="text" name="university" id="university" placeholder="University"/></li>
            <li class="clear newline"/>

            <li class="fl form-label">Description</li>
            <li class="fl form-field"><input value="<?php echo @$university->description?>" class="generic-input" type="text" name="description" id="description" placeholder="Description"/></li>
            <li class="clear newline"/>

            <li class="fl form-label">Contact Person</li>
            <li class="fl form-field"><input value="<?php echo @$university->contact_person?>" class="generic-input" type="text" name="contact_person" id="contact_person" placeholder="Contact Person"/></li>
            <li class="clear newline"/>

            <li class="fl form-label">Address</li>
            <li class="fl form-field"><input value="<?php echo @$university->address?>" class="generic-input" type="text" name="address" id="address" placeholder="Address"/></li>
            <li class="clear newline"/>

            <li class="fl form-label">Country</li>
            <li class="fl form-field">
                <?php echo form_dropdown('country_id', $countries,@$university->country_id,'id="country_id" class="generic-input"');?>
            </li>
            <li class="clear newline"/>
        </ul>
        <ul class="fl form-fields-ul-slider">
            
            <li class="fl form-label">Email</li>
            <li class="fl form-field"><input value="<?php echo @$university->email_id?>" class="generic-input" type="text" name="email_id" id="email_id" placeholder="Email"/></li>
            <li class="clear newline"/>
            
            <li class="fl form-label">Phone 1</li>
            <li class="fl form-field"><input value="<?php echo @$university->phone1?>" class="generic-input" type="text" required name="phone1" id="phone1" placeholder="Phone 1"/></li>
            <li class="clear newline"/>

            <li class="fl form-label">Phone 2</li>
            <li class="fl form-field"><input value="<?php echo @$university->phone2?>" class="generic-input" type="text" name="phone2" id="phone2" placeholder="Phone 2"/></li>
            <li class="clear newline"/>

            <li class="fl form-label">Commission %</li>
            <li class="fl form-field"><input value="<?php echo @$university->commission_percentage?>" class="generic-input" type="text" name="commission_percentage" id="commission_percentage" placeholder="Commission %"/></li>
            <li class="clear newline"/>

            <li class="fl form-label">Application Fee</li>
            <li class="fl form-field"><input value="<?php echo @$university->application_fee?>" class="generic-input" type="text" name="application_fee" id="application_fee" placeholder="Application Fee"/></li>
            <li class="clear newline"/>

            <li class="fl form-label">Service Charge</li>
            <li class="fl form-field"><input value="<?php echo @$university->service_charge?>" class="generic-input" type="text" name="service_charge" id="service_charge" placeholder="Service Charge"/></li>
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