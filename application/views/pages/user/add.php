<div class="fl full-width">
    <div class="form-inner">
        <?php
        $attributes = array('class' => '', 'id' => '');
        echo form_open($paths['add'], $attributes);
        ?>
        <ul class="fl form-fields-ul-slider">
            <li class="fl form-label">First Name</li>
            <li class="fl form-field"><input class="generic-input" type="text" required name="first_name" id="first_name" placeholder="First Name"/></li>
            <li class="clear newline"/>

            <li class="fl form-label">Last Name</li>
            <li class="fl form-field"><input class="generic-input" type="text" name="last_name" id="last_name" placeholder="Last Name"/></li>
            <li class="clear newline"/>
            
            <li class="fl form-label">Email</li>
            <li class="fl form-field"><input class="generic-input" type="text" name="email" id="email" placeholder="Email"/></li>
            <li class="clear newline"/>
            
            <li class="fl form-label">Phone</li>
            <li class="fl form-field"><input class="generic-input" type="text" name="phone" id="phone" placeholder="Phone"/></li>
            <li class="clear newline"/>
            
            <li class="fl form-label">Department</li>
            <li class="fl form-field">
                <?php echo form_dropdown('dept_id', $departments,'','id="department_id" class="generic-input"');?>
            </li>
            <li class="clear newline"/>
            
            <li class="fl form-label">Branch</li>
            <li class="fl form-field">
                <?php echo form_dropdown('branch_id', $branches,'','id="branch_id" class="generic-input"');?>
            </li>
            <li class="clear newline"/>
        </ul>
        <ul class="fl form-fields-ul-slider">
            <li class="fl form-label">Role</li>
            <li class="fl form-field">
                <?php echo form_dropdown('role_id', $roles,'','id="role_id" class="generic-input"');?>
            </li>
            <li class="clear newline"/>

            <li class="fl form-label">User Name</li>
            <li class="fl form-field"><input class="generic-input" type="text" name="user_name" id="user_name" placeholder="User Name"/></li>
            <li class="clear newline"/>
            
            <li class="fl form-label">Password</li>
            <li class="fl form-field"><input class="generic-input" type="password" name="password" id="password" placeholder="Password"/></li>
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