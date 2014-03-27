<div class="fl full-width">
    <div class="form-inner">
        <ul class="fl form-fields-ul-slider">
            <li class="fl form-label">Code</li>
            <li class="fl form-field"><input class="generic-input" type="text" required name="code" id="code" placeholder="Code"/></li>
            <li class="clear newline"/>

            <li class="fl form-label">Contact Person</li>
            <li class="fl form-field"><input class="generic-input" type="text" required name="contact_person" id="contact_person" placeholder="Contact Person"/></li>
            <li class="clear newline"/>

            <li class="fl form-label">Phone 1</li>
            <li class="fl form-field"><input class="generic-input" type="phone" required name="phone1" id="phone1" placeholder="Phone 1"/></li>
            <li class="clear newline"/>

            <li class="fl form-label">Commission %</li>
            <li class="fl form-field"><input class="generic-input" type="number" required name="commission_percentage" id="commission_percentage" placeholder="Commission %"/></li>
            <li class="clear newline"/>

            <li class="fl form-label">Service Charge</li>
            <li class="fl form-field"><input class="generic-input" type="number" required name="service_charge" id="service_charge" placeholder="Service Charge"/></li>
            <li class="clear newline"/>

            <li class="fl form-label">About University</li>
            <li class="fl form-field"><textarea class="generic-textarea" name="description" id="description"></textarea></li>
            <li class="clear newline"/>
        </ul>
        <ul class="fl form-fields-ul-slider">
            <li class="fl form-label">University</li>
            <li class="fl form-field"><input class="generic-input" type="text" required name="university" id="university" placeholder="University"/></li>
            <li class="clear newline"/>

            <li class="fl form-label">Email Id</li>
            <li class="fl form-field"><input class="generic-input" type="email" name="email_id" id="email_id" placeholder="Email Id"/></li>
            <li class="clear newline"/>

            <li class="fl form-label">Phone 2</li>
            <li class="fl form-field"><input class="generic-input" type="phone" required name="phone1" id="phone1" placeholder="Phone 2"/></li>
            <li class="clear newline"/>

            <li class="fl form-label">Application Fee</li>
            <li class="fl form-field"><input class="generic-input" type="number" required name="application_fee" id="application_fee" placeholder="Application Fee"/></li>
            <li class="clear newline"/>

            <li class="fl form-label">Address</li>
            <li class="fl form-field"><textarea class="generic-textarea" name="address" id="address"></textarea></li>
            <li class="clear newline"/>

            <li class="fl form-label">&nbsp;</li>
            <li class="fl form-field" sty>
                <a href="javascript:void(0)" class="fl button save common-save-btn-click">Save</a>
                <a href="<?php echo $this->config->item('base_url') ?>universities" class="fl marginleft10 button cancel common-cancel-btn-click">Cancel</a>
            </li>
            <li class="clear newline"/>
        </ul>
    </div>
</div>