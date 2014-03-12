<?php
    if($this->session->flashdata('msg_class')):
?>
<div class="<?php echo $this->session->flashdata('msg_class');?>" id="message_div" style="<?php if($this->session->flashdata('msg_class')) echo 'display:block'; else echo 'display:none';?>">
    <?php 
        echo $this->session->flashdata('message');
    ?>
</div>
<?php
    endif;
?>