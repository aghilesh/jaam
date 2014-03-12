<div class="sitepage-container">
    <?php
        echo $this->load->view('common/messageTemplate');
    ?>
    <div class="head-container">
            <div class="tab">S.L No</div>
            <div class="tab" style="width:400px">Department Name</div>
            <div class="tab">Edit</div>
            <div class="tab">Delete</div>
            <div class="add" style="cursor:pointer"><a href="<?php echo base_url()?>departments/add"><img src="<?php echo base_url()?>images/add_img1.png" /></a></div>
    </div>
    <div class="clear_both"></div>
    <div class="list-liner" style="height:10px"></div>

    <?php
        //echo '<pre>'; print_r($departments);
        if(isset($departments) && !empty($departments)) {
            $sl = 1;
            foreach ($departments as $list) { 
            $body_class = ($sl % 2 == 0)?'body-container-one':'body-container-two';	
    ?>
                    <div class="<?php echo $body_class; ?>">
                            <div class="body-tab"><?php echo $sl; ?></div>
                            <div class="body-tab" style="width:400px"><?php echo $list->dept_name;?></div>
                            <div class="body-tab"><a href="<?php echo base_url()?>departments/edit/<?php echo $list->id;?>"><img src="<?php echo base_url()?>images/edit.gif" /></a></div>
                            <div class="body-tab"><a href="#"><img src="<?php echo base_url()?>images/delete.gif" class="delete" data-id="<?php echo $list->id;?>"/></a></div>
                    </div>
                    <div class="clear_both"></div>
                    <div class="list-liner"></div>
    <?php				
            $sl++; }
        }else{
            echo "No departments found.";
        }
    ?>
</div>