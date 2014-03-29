<table class="fl table generic-listing">
    <thead>
        <tr>
            <th>Sl.No.</th>
            <th>Department Name</th>
            <th><a href="<?php echo base_url() ?>departments/add" class="fr button common-add-btn-click">ADD</a></th>
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
                    <td>
                        <a href="javascript:void(0)" class="button remove delete" data-link="departments/delete/<?php echo $list->id; ?>">Remove</a>
                        <a href="<?php echo base_url() ?>departments/edit/<?php echo $list->id; ?>" class="button edit">Edit</a>

                    </td>
                </tr>
                <?php
                $sl++;
            }
        } else {
            echo "No departments found.";
        }
        ?>
</table>