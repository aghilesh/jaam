<?php
    echo $this->load->view('common/messageTemplate');
?>
<?php 
    $attributes = array('class' => '', 'id' => '');
    echo form_open('departments/edit/'.@$department->id, $attributes); ?>
    <p>
        <label for="department_name">Department Name <span class="required">*</span></label>
        <br /><input id="department_name" type="text" name="department_name" maxlength="50" value="<?php echo @$department->dept_name; ?>"  />
    </p>
    <p>
        <label for="description">Description</label>
        <?php echo form_error('description'); ?>
        <br />
        <?php echo form_textarea( array( 'name' => 'description', 'rows' => '5', 'cols' => '80', 'value' => @$department->description ) )?>
    </p>
    <p>
        <?php echo form_submit( 'submit', 'Update'); ?>
    </p>
<?php echo form_close(); ?>