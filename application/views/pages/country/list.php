<table class="fl table generic-listing">
    <thead>
        <tr>
            <th>Sl.No.</th>
            <th>Country</th>
            <th>Capital</th>
            <th>Currency</th>
            <th>Currency Name</th>
            <th>Enabled</th>
            <th><a href="<?php echo base_url().$paths['add']; ?>" class="fr button common-add-btn-click">ADD</a></th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($countries) && !empty($countries)) {
            $sl = 1;
            foreach ($countries as $country) {
                ?>
                <tr>
                    <td width="2%"><?php echo $sl; ?></td>
                    <td width="10%"><?php echo $country->country; ?></td>
                    <td width="10%"><?php echo $country->capital; ?></td>
                    <td width="5%"><?php echo $country->currency; ?></td>
                    <td width="10%"><?php echo $country->currency_name; ?></td>
                    <td width="5%"><?php echo ($country->show_in_list) ? 'YES':''; ?></td>
                    <td width="10%" align="right">
                        <a href="javascript:void(0)" class="button remove delete" data-link="<?php echo base_url().$paths['delete'].'/'.$country->id; ?>">Remove</a>
                        <a href="<?php echo base_url().$paths['edit'].'/'.$country->id; ?>" class="button edit">Edit</a>
                    </td>
                </tr>
                <?php
                $sl++;
            }
        } else {?>
                <tr><td colspan="5">No Countries found.</td></tr>
        <?php }?>
</table>