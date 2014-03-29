<div class="fl full-width">
    <div class="form-inner">
        <?php
        $attributes = array('class' => '', 'id' => '');
        echo form_open($paths['add'], $attributes);
        ?>
        <ul class="fl form-fields-ul-slider">
            <li class="fl form-label">Department Name</li>
            <li class="fl form-field"><input class="generic-input" type="text" required name="department_name" id="department_name" placeholder="Department Name"/></li>
            <li class="clear newline"/>

            <li class="fl form-label">Description</li>
            <li class="fl form-field"><textarea class="generic-textarea" name="description" id="description"></textarea></li>
            <li class="clear newline"/>

            <li class="fl form-label">&nbsp;</li>
            <li class="fl form-field" sty>
                <a href="<?php echo $this->config->item('base_url') ?>departments" class="fl marginleft10 button cancel common-cancel-btn-click">Cancel</a>
                <a href="javascript:void(0)" class="fl button save common-save-btn-click">Save</a>
            </li>
            <li class="clear newline"/>

        </ul>
        <?php echo form_close(); ?>
    </div>
</div>