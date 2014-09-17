<table class="fl table generic-listing">
    <thead>
        <tr>
            <th>Sl.No.</th>
            <th>Title</th>
            <th>Task Date</th>
            <th>Assigned To</th>
            <th><a href="<?php echo base_url() . $paths['add'] ?>" class="fr button common-add-btn-click">ADD</a></th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($tasks) && !empty($tasks)) {
            $sl = 1;
            foreach ($tasks as $list) {
                ?>
                <tr>
                    <td><?php echo $sl; ?></td>
                    <td><?php echo $list->title; ?></td>
                    <td><?php echo date('d-m-Y',strtotime($list->when)); ?></td>
                    <td><?php echo @getUserName($list->assigned_to); ?></td>
                    <td>
                        <a href="javascript:void(0)" class="button remove delete" data-link="<?php echo base_url() . $paths['delete'] . '/' . $list->id; ?>">Remove</a>
                        <a href="<?php echo base_url() . $paths['edit'] . '/' . $list->id; ?>" class="button edit">Edit</a>
                    </td>
                </tr>
                <?php
                $sl++;
            }
        } else {
            ?>
            <tr><td colspan="5">No Task found.</td></tr>
        <?php } ?>
</table>