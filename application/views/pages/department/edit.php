
<div class="fl full-width">
    <div class="form-inner">
        <?php
        $attributes = array('class' => '', 'id' => '');
        echo form_open($paths['edit'].'/'.@$department->id, $attributes);
        ?>
        <ul class="fl form-fields-ul-slider">
            <li class="fl form-label">Department Name*</li>
            <li class="fl form-field"><input class="generic-input" type="text" required name="department_name" id="department_name" placeholder="Department Name" value="<?php echo @$department->dept_name; ?>"/></li>
            <li class="clear newline"/>

            <li class="fl form-label">Description</li>
            <li class="fl form-field">
                <?php echo form_textarea( array( 'name' => 'description', 'class'=>'generic-textarea','rows' => '5', 'cols' => '80', 'value' => @$department->description ) )?>
            </li>
            <li class="clear newline"/>

            <li class="fl form-label">&nbsp;</li>
            <li class="fl form-field">
                <a href="<?php echo $this->config->item('base_url').$paths['list'].'?'.  random_string() ?>" class="fl marginleft10 button cancel common-cancel-btn-click">Cancel</a>
                <a href="javascript:void(0)" class="fl button save common-save-btn-click">Save</a>
            </li>
            <li class="clear newline"/>

        </ul>
        <?php echo form_close(); ?>
    </div>
</div>