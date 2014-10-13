<?php
$post = $this->input->post();
?>
<div class="fl full-width">
    <div class="form-inner">
        <?php
        $attributes = array('class' => '', 'id' => 'frmRegistrationAdd','name'=>'frmRegistrationAdd');
        echo form_open($paths['add'], $attributes);
        ?>
        <ul class="fl form-fields-ul-slider">
           <li class="fl form-label">Registration Date<sup class="mandatory">*</sup></li>
           <li class="fl form-field">
               <input type="date" name="regDate" id="regDate" value="<?php echo $post && $post['regDate'] ? $post['regDate'] : date('Y-m-d'); ?>" >
           </li>
        </ul>
        <div class="clear newline"></div>
        
        <ul class="fl form-fields-ul-slider">
            <?php $this->load->view($this->config->item('pages') . 'registration/add/personal_details', $this->gen_contents);?>
        </ul>
        <div class="clear newline"></div>
        <ul class="fl form-fields-ul-slider full-width">
            <?php $this->load->view($this->config->item('pages') . 'registration/add/education_details', $this->gen_contents);?>
        </ul>
        <ul class="fl form-fields-ul-slider full-width">
            <?php $this->load->view($this->config->item('pages') . 'registration/add/course_details', $this->gen_contents);?>
        </ul>
        <ul class="fl form-fields-ul-slider follow-up full-width">
            <?php $this->load->view($this->config->item('pages') . 'registration/add/test_preparation', $this->gen_contents);?>
        </ul>
        <ul class="fl form-fields-ul-slider follow-up full-width">
            <?php $this->load->view($this->config->item('pages') . 'registration/add/fee_details', $this->gen_contents);?>
        </ul>
        <ul class="fl form-fields-ul-slider follow-up full-width">
            <?php $this->load->view($this->config->item('pages') . 'registration/add/follow_up', $this->gen_contents);?>
        </ul>
        <ul class="fl form-fields-ul-slider">
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