<?php
$post = $this->input->post();
$registrationMain = $registration_details['registrationMain'];
?>
<div class="fl full-width">
    <div class="form-inner">
        <ul class="fl form-fields-ul-slider">
           <li class="fl form-label">Registration Date</li>
           <li class="fl form-field">
               <?php echo  $registrationMain->date?>
           </li>
        </ul>
        <div class="clear newline"></div>
        
        <ul class="fl form-fields-ul-slider">
            <?php $this->load->view($this->config->item('pages') . 'registration/view/personal_details', $this->gen_contents);?>
        </ul>
        <div class="clear newline"></div>
        <ul class="fl form-fields-ul-slider full-width">
            <?php $this->load->view($this->config->item('pages') . 'registration/view/education_details', $this->gen_contents);?>
        </ul>
        <ul class="fl form-fields-ul-slider full-width">
            <?php $this->load->view($this->config->item('pages') . 'registration/view/course_details', $this->gen_contents);?>
        </ul>
        <ul class="fl form-fields-ul-slider follow-up full-width">
            <?php $this->load->view($this->config->item('pages') . 'registration/view/test_preparation', $this->gen_contents);?>
        </ul>
        <ul class="fl form-fields-ul-slider follow-up full-width">
            <?php $this->load->view($this->config->item('pages') . 'registration/view/fee_details', $this->gen_contents);?>
        </ul>
        <ul class="fl form-fields-ul-slider follow-up full-width">
            <?php $this->load->view($this->config->item('pages') . 'registration/view/follow_up', $this->gen_contents);?>
        </ul>
        <ul class="fl form-fields-ul-slider">
            <li class="fl form-label">&nbsp;</li>
            <li class="fl form-field" sty>
                <a href="<?php echo $this->config->item('base_url').$paths['list'].'?'.  random_string() ?>" class="fl marginleft10 button cancel common-cancel-btn-click">Back</a>
            </li>
            <li class="clear newline"/>
        </ul>
    </div>
</div>