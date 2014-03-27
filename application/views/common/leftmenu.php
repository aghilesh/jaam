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
            <li><a href="#">Dashboard</a></li>
			<li><a class="<?php echo $currentMenu == 'roles' ? 'selected' : '' ?>" href="<?php echo $this->config->item('base_url') ?>roles">User Roles</a></li>
			<li><a class="<?php echo $currentMenu == 'branches' ? 'selected' : '' ?>" href="<?php echo $this->config->item('base_url') ?>branches">Branches</a></li>
            <li><a class="<?php echo $currentMenu == 'departments' ? 'selected' : '' ?>" href="<?php echo $this->config->item('base_url') ?>departments">Departments</a></li>
			<li><a class="<?php echo $currentMenu == 'user' ? 'selected' : '' ?>" href="<?php echo $this->config->item('base_url') ?>user">User</a></li>
			<li><a class="<?php echo $currentMenu == 'country' ? 'selected' : '' ?>" href="<?php echo $this->config->item('base_url') ?>country">Country</a></li>            
            <li><a class="<?php echo $currentMenu == 'universities' ? 'selected' : '' ?>" href="<?php echo $this->config->item('base_url') ?>universities">Universities</a></li>
			<li><a class="<?php echo $currentMenu == 'associate_agency' ? 'selected' : '' ?>" href="<?php echo $this->config->item('base_url') ?>associate_agency">Associate Agency</a></li>
			<li><a class="<?php echo $currentMenu == 'university_courses' ? 'selected' : '' ?>" href="<?php echo $this->config->item('base_url') ?>university_courses">University Courses</a></li>
			<li><a class="<?php echo $currentMenu == 'enquiries' ? 'selected' : '' ?>" href="<?php echo $this->config->item('base_url') ?>enquiries">Enquiries</a></li>
        </ul>
    </div>
</div>