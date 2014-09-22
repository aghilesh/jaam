<div class="fl full-width">
    <div class="form-inner">
        <?php
        $attributes = array('class' => '', 'id' => '');
        echo form_open($paths['add'], $attributes);
        ?>
        <ul class="fl form-fields-ul-slider">
            <li class="fl form-label">Title</li>
            <li class="fl form-field"><input class="generic-input" type="text" required name="title" id="title" placeholder="Title"/></li>
            <li class="clear newline"/>

            <li class="fl form-label">Description</li>
            <li class="fl form-field"><textarea class="generic-textarea" name="description" id="description"></textarea></li>
            <li class="clear newline"/>
            
            <li class="fl form-label">Date</li>
            <li class="fl form-field"><input class="generic-input" type="date" required name="when" id="when"/></li>
            <li class="clear newline"/>
            
            <li class="fl form-label">Time</li>
            <li class="fl form-field"><input class="generic-input" type="time" name="time" id="time"/></li>
            <li class="clear newline"/>
            
            <li class="fl form-label">Assigned To</li>
            <li class="fl form-field">
                <?php echo form_dropdown('assigned_to', $users,'','id="assigned_to" class="generic-input"');?>
            </li>
            <li class="clear newline"/>

            <li class="fl form-label">&nbsp;</li>
            <li class="fl form-field" sty>
                <a href="<?php echo $this->config->item('base_url') ?>task" class="fl marginleft10 button cancel common-cancel-btn-click">Cancel</a>
                <a href="javascript:void(0)" class="fl button save common-save-btn-click">Save</a>
            </li>
            <li class="clear newline"/>

        </ul>
        <?php echo form_close(); ?>
    </div>
</div>