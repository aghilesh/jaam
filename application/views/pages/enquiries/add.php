<?php
$post = $this->input->post();
?>
<div class="fl full-width">
    <div class="form-inner">
        <?php
        $attributes = array('class' => 'validate-form', 'id' => 'frmEnquiryAdd','name'=>'frmEnquiryAdd');
        echo form_open($paths['add'], $attributes);
        ?>
        <ul class="fl form-fields-ul-slider">
            <?php $this->load->view($this->config->item('pages') . 'enquiries/personal_details', $this->gen_contents);?>
        </ul>
        <div class="clear newline"></div>
        <ul class="fl form-fields-ul-slider">
            <?php $this->load->view($this->config->item('pages') . 'enquiries/education_details', $this->gen_contents);?>
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