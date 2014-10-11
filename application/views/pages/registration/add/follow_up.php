<?php
$post = $this->input->post();
?>
    <li class="fl form-label"><h2 class="form-sub-head strong">Follow up</h2></li>
    <li class="clear newline"/>

    <li class="fl form-label">Title<sup class="mandatory">*</sup></li>
    <li class="fl form-field">
       <input class="generic-input validate validate-mandatory" type="text" name="followUpTitle" id="followUpTitle" placeholder="Title" value="<?php echo $post['followUpTitle']?>"/>
    </li>
    <li class="clear newline"/>

    <li class="fl form-label">Description<sup class="mandatory">*</sup></li>
    <li class="fl form-field">
        <textarea name="followUpDescription" class="generic-textarea" id="followUpDescription"><?php echo $post['followUpDescription']?></textarea>
    </li>
    <li class="clear newline"/>

    <li class="fl form-label">Assign To<sup class="mandatory">*</sup></li>
    <li class="fl form-field">
        <?php echo form_dropdown('followUpAssignedTo', $users, @$post['followUpAssignedTo'],'id="followUpAssignedTo" class="generic-input"');?>
    </li>
    <li class="clear newline"/>
    
    
    <li class="fl form-label">Date</li>
    <li class="fl form-field">
        <input type="date" name="followUpWhen" id="followUpWhen" value="<?php echo $post && $post['followUpWhen'] ? $post['followUpWhen'] : date('Y-m-d'); ?>" >
    </li>
    <li class="clear newline"/>

