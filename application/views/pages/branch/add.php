<div class="fl full-width">
    <div class="form-inner">
        <?php
        $attributes = array('class' => '', 'id' => '');
        echo form_open($paths['add'], $attributes);
        ?>
        <ul class="fl form-fields-ul-slider">
            <li class="fl form-label">Branch</li>
            <li class="fl form-field"><input class="generic-input" type="text" required name="branch_name" id="country" placeholder="Branch Name"/></li>
            <li class="clear newline"/>

            <li class="fl form-label">Description</li>
            <li class="fl form-field"><input class="generic-input" type="text" name="description" id="description" placeholder="Description"/></li>
            <li class="clear newline"/>
            
            <li class="fl form-label">Country</li>
            <li class="fl form-field">
                <?php echo form_dropdown('country_id', $countries,'','id="country_id" class="generic-input"');?>
            </li>
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