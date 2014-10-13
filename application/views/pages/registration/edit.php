<?php
$post = $this->input->post();
$registrationMain = $registration_details['registrationMain'];
?>
<div class="fl full-width">
    <div class="form-inner">
        <?php
        $attributes = array('class' => '', 'id' => 'frmRegistrationEdit','name'=>'frmRegistrationEdit');
        echo form_open($paths['edit'].'/'.$registrationMain->id, $attributes);
        ?>
        <ul class="fl form-fields-ul-slider">
           <li class="fl form-label">Enquiry Date<sup class="mandatory">*</sup></li>
           <li class="fl form-field">
               <input type="date" name="regDate" id="enqDate" value="<?php echo $post && $post['regDate'] ? $post['regDate'] : date('Y-m-d'); ?>" >
           </li>
        </ul>
        <div class="clear newline"></div>
        
        <ul class="fl form-fields-ul-slider">
            <?php $this->load->view($this->config->item('pages') . 'registration/edit/personal_details', $this->gen_contents);?>
        </ul>
        <div class="clear newline"></div>
        <ul class="fl form-fields-ul-slider full-width">
            <?php $this->load->view($this->config->item('pages') . 'registration/edit/education_details', $this->gen_contents);?>
        </ul>
        <ul class="fl form-fields-ul-slider full-width">
            <?php $this->load->view($this->config->item('pages') . 'registration/edit/course_details', $this->gen_contents);?>
        </ul>
        <ul class="fl form-fields-ul-slider follow-up full-width">
            <?php $this->load->view($this->config->item('pages') . 'registration/edit/test_preparation', $this->gen_contents);?>
        </ul>
        <ul class="fl form-fields-ul-slider follow-up full-width">
            <?php $this->load->view($this->config->item('pages') . 'registration/edit/fee_details', $this->gen_contents);?>
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