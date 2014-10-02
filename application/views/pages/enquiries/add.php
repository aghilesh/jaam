<?php
$post = $this->input->post();
?>
<div class="fl full-width">
    <div class="form-inner">
        <?php
        $attributes = array('class' => '', 'id' => 'frmEnquiryAdd','name'=>'frmEnquiryAdd');
        echo form_open($paths['add'], $attributes);
        ?>
        <ul class="fl form-fields-ul-slider">
           <li class="fl form-label">Enquiry Moe<sup class="mandatory">*</sup></li>
           <li class="fl form-field">
               <input type="date" name="enqDate" id="enqDate" value="<?php echo $post && $post['enqDate'] ? $post['enqDate'] : date('Y-m-d'); ?>" >
           </li>
        </ul>
        <div class="clear newline"></div>
        
        <ul class="fl form-fields-ul-slider">
            <?php $this->load->view($this->config->item('pages') . 'enquiries/add/personal_details', $this->gen_contents);?>
        </ul>
        <div class="clear newline"></div>
        <ul class="fl form-fields-ul-slider full-width">
            <?php $this->load->view($this->config->item('pages') . 'enquiries/add/education_details', $this->gen_contents);?>
        </ul>
        <ul class="fl form-fields-ul-slider full-width">
            <?php $this->load->view($this->config->item('pages') . 'enquiries/add/course_details', $this->gen_contents);?>
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