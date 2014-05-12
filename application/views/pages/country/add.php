<div class="fl full-width">
    <div class="form-inner">
        <?php
        $attributes = array('class' => '', 'id' => '');
        echo form_open($paths['add'], $attributes);
        ?>
        <ul class="fl form-fields-ul-slider">
            <li class="fl form-label">Country</li>
            <li class="fl form-field"><input class="generic-input" type="text" required name="country" id="country" placeholder="Country Name"/></li>
            <li class="clear newline"/>

            <li class="fl form-label">Capital</li>
            <li class="fl form-field"><input class="generic-input" type="text" name="capital" id="capital" placeholder="Capital"/></li>
            <li class="clear newline"/>
            
            <li class="fl form-label">Currency</li>
            <li class="fl form-field"><input class="generic-input uppercase" type="text" name="currency" id="currency" placeholder="Currency"/></li>
            <li class="clear newline"/>
            
            <li class="fl form-label">Currency Name</li>
            <li class="fl form-field"><input class="generic-input" type="text" name="currency_name" id="currency_name" placeholder="Currency Name"/></li>
            <li class="clear newline"/>
            
            <li class="fl form-label">Enable</li>
            <li class="fl form-field"><input class="generic-input fl" type="checkbox" name="show_in_list" id="show_in_list"/></li>
            <li class="clear newline"/>

            <li class="fl form-label">&nbsp;</li>
            <li class="fl form-field" sty>
                <a href="<?php echo $this->config->item('base_url').$paths['list'].'?'.  random_string() ?>" class="fl marginleft10 button cancel common-cancel-btn-click">Cancel</a>
                <a href="javascript:void(0)" class="fl button save common-save-btn-click">Save</a>
            </li>
            <li class="clear newline"/>

        </ul>
        <?php echo form_close(); ?>
    </div>
</div>