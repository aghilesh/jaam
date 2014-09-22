<table width="100%" class="margin0">
    <tr>
        <td width="20%" class="padding0">
            <div class="tab-item <?php echo ($paths['list'] == $uri_string) ? 'selected':''?>">
                <a href="<?php echo base_url() . $paths['list']; ?>">Assigned Task</a>
            </div>
        </td>
        <td width="20%" class="padding0">
            <div class="tab-item <?php echo ($paths['owned'] == $uri_string) ? 'selected':''?>">
                <a href="<?php echo base_url() . $paths['owned']; ?>">Owned Task</a>
            </div>
        </td>
        <td width="60%"></td>
    </tr>
</table>
<table class="fl table generic-listing">
    <thead>
        <tr>
            <th>Sl.No.</th>
            <th>Title</th>
            <th>Date Time</th>
            <th>Assigned By</th>
            <th>Status</th>
            <th>&nbsp;</th>
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
                    <td><?php echo date('d-m-Y H:i A',strtotime($list->when)); ?></td>
                    <td><?php echo @getUserName($list->assigned_by); ?></td>
                    <td><?php echo @getTaskStatus($list->status)?></td>
                    <td>
                        <a href="<?php echo base_url() . $paths['view'] . '/' . $list->id; ?>" class="button view">View</a>
                    </td>
                </tr>
                <?php
                $sl++;
            }
        } else {
            ?>
            <tr><td colspan="6">No Task found.</td></tr>
        <?php } ?>
</table>