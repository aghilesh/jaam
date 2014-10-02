<?php
$post = $this->input->post();
$enquiryMain = $enquiry_details['enquiryMain'];
?>
<div class="fl full-width">
    <div class="form-inner">
        <ul class="fl form-fields-ul-slider">
           <li class="fl form-label">Enquiry Date</li>
           <li class="fl form-field">
               <?php echo  $enquiryMain->date?>
           </li>
        </ul>
        <div class="clear newline"></div>
        
        <ul class="fl form-fields-ul-slider">
            <?php $this->load->view($this->config->item('pages') . 'enquiries/view/personal_details', $this->gen_contents);?>
        </ul>
        <div class="clear newline"></div>
        <ul class="fl form-fields-ul-slider full-width">
            <?php $this->load->view($this->config->item('pages') . 'enquiries/view/education_details', $this->gen_contents);?>
        </ul>
        <ul class="fl form-fields-ul-slider full-width">
            <?php $this->load->view($this->config->item('pages') . 'enquiries/view/course_details', $this->gen_contents);?>
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