<script type="text/javascript">
    $(document).ready(function($) {
        $('#accordion-1').dcAccordion({
            eventType: 'click',
            autoClose: true,
            saveState: true,
            disableLink: true,
            speed: 'slow',
            showCount: true,
            autoExpand: true,
            cookie: 'dcjq-accordion-1',
            classExpand: 'dcjq-current-parent'
        });
    });
</script>                
<?php
$currentMenu = @strtolower($leftmenu_selected);
?>
<div class="wrap">
    <div class="graphite demo-container">
        <ul class="accordion" id="accordion-1">
            <li><a class="<?php echo $currentMenu == 'dashboard' ? 'selected' : '' ?>" href="<?php echo $this->config->item('base_url') ?>">Dashboard</a></li>
            <li><a class="<?php echo $currentMenu == 'roles' ? 'selected' : '' ?>" href="<?php echo $this->config->item('base_url') ?>roles">User Roles</a></li>
            <li><a class="<?php echo $currentMenu == 'branch' ? 'selected' : '' ?>" href="<?php echo $this->config->item('base_url') ?>branch">Branches</a></li>
            <li><a class="<?php echo $currentMenu == 'department' ? 'selected' : '' ?>" href="<?php echo $this->config->item('base_url') ?>department">Departments</a></li>
            <li><a class="<?php echo $currentMenu == 'user' ? 'selected' : '' ?>" href="<?php echo $this->config->item('base_url') ?>user">User</a></li>
            <li><a class="<?php echo $currentMenu == 'country' ? 'selected' : '' ?>" href="<?php echo $this->config->item('base_url') ?>country">Country</a></li>            
            <li><a class="<?php echo $currentMenu == 'university' ? 'selected' : '' ?>" href="<?php echo $this->config->item('base_url') ?>university">Universities</a></li>
            <li><a class="<?php echo $currentMenu == 'associate_agency' ? 'selected' : '' ?>" href="<?php echo $this->config->item('base_url') ?>associate_agency">Associate Agency</a></li>
            <li><a class="<?php echo $currentMenu == 'university_courses' ? 'selected' : '' ?>" href="<?php echo $this->config->item('base_url') ?>university_courses">University Courses</a></li>
            <li><a class="<?php echo $currentMenu == 'enquiries' ? 'selected' : '' ?>" href="<?php echo $this->config->item('base_url') ?>enquiries">Enquiries</a></li>
            <li><a class="<?php echo $currentMenu == 'task' ? 'selected' : '' ?>" href="<?php echo $this->config->item('base_url') ?>task">Task</a></li>
        </ul>
    </div>
</div>