<table class="fl table generic-listing">
    <thead>
        <tr>
            <th>Sl.No.</th>
            <th>Course Code</th>
            <th>Course Title</th>
            <th><a href="<?php echo base_url() . $paths['add'] ?>" class="fr button common-add-btn-click">ADD</a></th>
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
                    <td><?php echo $list->code; ?></td>
                    <td><?php echo $list->course_title; ?></td>
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
            <tr><td colspan="5">No Courses found.</td></tr>
        <?php } ?>
</table>