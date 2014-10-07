<?php
$post = $this->input->post();
?>
<span id="dummyRowChecklist" class="hidden">
    <li class="{REPL_CLASS} clear newline fl form-label">&nbsp;</li>
    <li class="fl {REPL_CLASS} form-field checklistRow">
        <input class="generic-input checklist-field" type="text" name="checklist[]" placeholder="Checklsit" value=""/><span class="action-links"><a rel="add" class="{REPL_CLASS}" href="javascript:void(0)" onClick="Checklist.checkListAction(this)">Add</a>&nbsp;&nbsp;&nbsp;<a rel="remove"  class="{REPL_CLASS}" href="javascript:void(0)" onClick="Checklist.checkListAction(this)">Remove</a></span>
    </li>
</span>
<div class="fl full-width">
    <div class="form-inner">
        <?php
        $attributes = array('class' => 'checklist', 'id' => 'frmChecklistAdd','name'=>'frmChecklistAdd');
        echo form_open($paths['add'], $attributes);
        ?>
        <ul class="fl form-fields-checklist" id="checkListRows">
            <li class="fl form-label">Country(s)</li>
            <li class="fl form-field">
                <?php 
                echo form_dropdown('country_id[]', $countries, @$post['country_id'], 'class="generic-" multiple'); ?>
            </li>
            <li class="clear"/>
            <li class="fl form-label">Checklist<sup class="mandatory">*</sup></li>
            <?php
            if($post['checklist']){
                for($i=0; $i<sizeof($post['checklist']); $i++) {
                ?>
                    <?php
                    if($i>0){?>
                   <li class="clear <?php echo $i?>"/>
                   <li class="<?php echo $i?> fl form-label">&nbsp;</li>
                   <?php
                    }
                    ?>
                   <li class="fl form-field checklistRow <?php echo $i?>">
                        <input class="generic-input" type="text" name="checklist[]" placeholder="Checklsit" value="<?php echo $post['checklist'][$i]?>"/><span class="action-links"><a rel="add" href="javascript:void(0)" class="<?php echo $i?>" onClick="Checklist.checkListAction(this)">Add</a>&nbsp;&nbsp;&nbsp;<a rel="remove"  class="<?php echo $i?>" href="javascript:void(0)" onClick="Checklist.checkListAction(this)">Remove</a></span>
                    </li>
                <?php
                }
            } else {
            ?>
                  <li class="fl form-field checklistRow default">
                        <input class="generic-input checklist-field" type="text" name="checklist[]" placeholder="Checklsit" value=""/><span class="action-links"><a rel="add" href="javascript:void(0)" class="default" onClick="Checklist.checkListAction(this)">Add</a></span>
                  </li> 
            <?php
            }
            ?>
        </ul>
        <ul class="fl form-fields-checklist">
            <li class="fl form-label">&nbsp;</li>
            <li class="fl form-field">
                <a href="javascript:void(0)" class="fl button save common-save-btn-click">Save</a>
                <a href="<?php echo $this->config->item('base_url').$paths['list'].'?'.  random_string() ?>" class="fl marginleft10 button cancel common-cancel-btn-click">Cancel</a>
            </li>
        </ul>
        <?php
        echo form_close()
        ?>
    </div>
</div>