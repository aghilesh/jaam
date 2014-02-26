<?php
    if($this->session->flashdata('msg_class')){
?>
        <div class="<?php echo $this->session->flashdata('msg_class'); ?> message_template">
            <?php echo $this->session->flashdata('message'); ?>
        </div>
<?php
    }
?>