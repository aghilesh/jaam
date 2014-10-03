<table class="fl table generic-listing">
    <thead>
        <tr>
            <th>Sl.No.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Branch</th>
            <th>
                <?php if(getModuleActionPermission('add User')){?>
                <a href="<?php echo base_url().$paths['add']; ?>" class="fr button common-add-btn-click">ADD</a>
                <?php }?>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($users) && !empty($users)) {
            $sl = 1;
            foreach ($users as $user) {
                ?>
                <tr>
                    <td><?php echo $sl; ?></td>
                    <td><?php echo $user->first_name.' '.$user->last_name; ?></td>
                    <td><?php echo $user->email_id; ?></td>
                    <td><?php echo $user->phone_no; ?></td>
                    <td><?php echo getBranchName($user->branch_id); ?></td>
                    <td align="right">
                        <?php if(getModuleActionPermission('delete User')){?>
                        <a href="javascript:void(0)" class="button remove delete" data-link="<?php echo base_url().$paths['delete'].'/'. $user->id; ?>">Remove</a>
                        <?php }?>
                        <?php if(getModuleActionPermission('edit User')){?>
                        <a href="<?php echo base_url().$paths['edit'].'/'. $user->id; ?>" class="button edit">Edit</a>
                        <?php }?>
                    </td>
                </tr>
                <?php
                $sl++;
            }
        } else {
            ?>
            <tr><td colspan="6">No Users found.</td></tr>
<?php } ?>
</table>