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
                $body_class = ($sl % 2 == 0) ? 'body-container-one' : 'body-container-two';
                ?>
                <tr>
                    <td><?php echo $sl; ?></td>
                    <td><?php echo $list->dept_name; ?></td>
                    <td>
                        <a href="<?php echo base_url() ?>departments/edit/<?php echo $list->id; ?>"" class="button edit">Edit</a>
                        <a href="javascript:void(0)" class="button remove delete" data-id="<?php echo $list->id; ?>">Remove</a>
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