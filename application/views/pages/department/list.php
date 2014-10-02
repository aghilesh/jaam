<table class="fl table generic-listing">
    <thead>
        <tr>
            <th>Sl.No.</th>
            <th>Department Name</th>
            <th>Description</th>
            <th>
                <?php if(getModuleActionPermission('add Department')){?>
                <a href="<?php echo base_url() . $paths['add'] ?>" class="fr button common-add-btn-click">ADD</a>
                <?php }?>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($departments) && !empty($departments)) {
            $sl = 1;
            foreach ($departments as $list) {
                ?>
                <tr>
                    <td><?php echo $sl; ?></td>
                    <td><?php echo $list->dept_name; ?></td>
                    <td><?php echo $list->description; ?></td>
                    <td>
                        <?php if(getModuleActionPermission('delete Department')){?>
                        <a href="javascript:void(0)" class="button remove delete" data-link="<?php echo base_url() . $paths['delete'] . '/' . $list->id; ?>">Remove</a>
                        <?php }?>
                        <?php if(getModuleActionPermission('edit Department')){?>
                        <a href="<?php echo base_url() . $paths['edit'] . '/' . $list->id; ?>" class="button edit">Edit</a>
                        <?php }?>
                    </td>
                </tr>
                <?php
                $sl++;
            }
        } else {
            ?>
            <tr><td colspan="5">No Departments found.</td></tr>
        <?php } ?>
</table>