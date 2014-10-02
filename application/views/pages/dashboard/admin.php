<div class="fl full-width">
    <div class="form-inner">
        <ul class="fl form-fields-ul-slider">
            <li class="fl form-label">Code</li>
            <li class="fl form-field"><?php echo @$agency->code?></li>
            <li class="clear newline"/>

            <li class="fl form-label">Agency</li>
            <li class="fl form-field"><?php echo @$agency->agency?></li>
            <li class="clear newline"/>

            <li class="fl form-label">Description</li>
            <li class="fl form-field"><?php echo @$agency->description?></li>
            <li class="clear newline"/>

            <li class="fl form-label">Contact Person</li>
            <li class="fl form-field"><?php echo @$agency->contact_person?></li>
            <li class="clear newline"/>

            <li class="fl form-label">Address</li>
            <li class="fl form-field"><?php echo @$agency->address?></li>
            <li class="clear newline"/>

            <li class="fl form-label">Country</li>
            <li class="fl form-field"><?php echo getCountryName(@$agency->country_id);?></li>
            <li class="clear newline"/>
        </ul>
        <ul class="fl form-fields-ul-slider">
            
            <li class="fl form-label">Email</li>
            <li class="fl form-field"><?php echo @$agency->email_id?></li>
            <li class="clear newline"/>
            
            <li class="fl form-label">Phone 1</li>
            <li class="fl form-field"><?php echo @$agency->phone1?></li>
            <li class="clear newline"/>

            <li class="fl form-label">Phone 2</li>
            <li class="fl form-field"><?php echo @$agency->phone2?></li>
            <li class="clear newline"/>

            <li class="fl form-label">Commission %</li>
            <li class="fl form-field"><?php echo @$agency->commission_percentage?></li>
            <li class="clear newline"/>

            <li class="fl form-label">Application Fee</li>
            <li class="fl form-field"><?php echo @$agency->application_fee?></li>
            <li class="clear newline"/>

            <li class="fl form-label">Service Charge</li>
            <li class="fl form-field"><?php echo @$agency->service_charge?></li>
            <li class="clear newline"/>

            <li class="fl form-label">&nbsp;</li>
            <li class="fl form-field" sty>
                <a href="<?php echo $this->config->item('base_url').$paths['list'].'?'.  random_string() ?>" class="fl marginleft10 button cancel common-cancel-btn-click">Cancel</a>
                <a href="javascript:void(0)" class="button remove delete" data-link="<?php echo base_url().$paths['delete'].'/'. @$agency->id; ?>">Remove</a>
                <a href="<?php echo base_url().$paths['edit'].'/'. @$agency->id; ?>" class="button edit">Edit</a>
            </li>
            <li class="clear newline"/>
        </ul>
    </div>
</div>