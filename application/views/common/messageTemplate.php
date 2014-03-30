<?php
$message_class = $this->session->flashdata('msg_class') ? $this->session->flashdata('msg_class') : (isset($msg_class) ? $msg_class : '');
$msg       = $this->session->flashdata('message') ? $this->session->flashdata('message') : (isset($message) ? $message : '');
?>
<?php
    if($message_class):
?>
<div class="common_message_div <?php echo $message_class?>" id="message_div" style="<?php if($message_class) echo 'display:block'; else echo 'display:none';?>">
    <?php 
        echo $msg;
    ?>
</div>
<?php
    endif;
?>