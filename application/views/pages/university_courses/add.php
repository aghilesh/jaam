<?php
$post = $this->input->post();
?>
<div class="fl full-width">
    <div class="form-inner">
        <?php
        $attributes = array('class' => 'validate-form', 'id' => 'frmUniversityAdd','name'=>'frmUniversityAdd');
        echo form_open($paths['add'], $attributes);
        ?>
        <ul class="fl form-fields-ul-slider">
            <li class="fl form-label">Code<sup class="mandatory">*</sup></li>
            <li class="fl form-field"><input class="generic-input validate validate-mandatory" type="text" name="code" id="code" placeholder="Code" value="<?php echo $post['code']?>"/></li>
            <li class="clear newline"/>

            <li class="fl form-label">University<sup class="mandatory">*</sup></li>
            <li class="fl form-field"><?php echo form_dropdown('university_id', $universities, $post['university_id'],'id="university_id" class="generic-input"');?></li>
            <li class="clear newline"/>

            <li class="fl form-label">Country</li>
            <li class="fl form-field"><?php echo form_dropdown('country_id', $countries,$post['country_id'],'id="country_id" class="generic-input"');?></li>
            <li class="clear newline"/>

            <li class="fl form-label">Course title<sup class="mandatory">*</sup></li>
            <li class="fl form-field"><input class="generic-input validate validate-mandatory" type="text" name="course_title" id="course_title" placeholder="Course title" value="<?php echo $post['course_title']?>"/></li>
            <li class="clear newline"/>

            <li class="fl form-label">Course description</li>
            <li class="fl form-field"><input class="generic-input" type="text" name="course_description" id="course_description" placeholder="Course description"  value="<?php echo $post['course_description']?>"/></li>
            <li class="clear newline"/>
        </ul>
        <ul class="fl form-fields-ul-slider">
            
            <li class="fl form-label">Course level</li>
            <li class="fl form-field"><input class="generic-input" type="text" name="course_level" id="email_id" placeholder="Course level" value="<?php echo $post['course_level']?>"/></li>
            <li class="clear newline"/>
            
            <li class="fl form-label">Duration</li>
            <li class="fl form-field"><input class="generic-input" type="text" name="duration" id="duration" placeholder="Duration" value="<?php echo $post['duration']?>"/></li>
            <li class="clear newline"/>

            <li class="fl form-label">Course fee</li>
            <li class="fl form-field"><input class="generic-input" type="text" name="course_fee" id="course_fee" placeholder="Course fee" value="<?php echo $post['course_fee']?>"/></li>
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