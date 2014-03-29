<table class="fl table generic-listing">
    <thead>
        <tr>
            <th>Sl.No.</th>
            <th>Branch</th>
            <th>Description</th>
            <th>Country</th>
            <th><a href="<?php echo base_url().$paths['add']; ?>" class="fr button common-add-btn-click">ADD</a></th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($branches) && !empty($branches)) {
            $sl = 1;
            foreach ($branches as $branch) {
                ?>
                <tr>
                    <td><?php echo $sl; ?></td>
                    <td><?php echo $branch->branch_name; ?></td>
                    <td><?php echo $branch->description; ?></td>
                    <td><?php echo getCountryName($branch->country_id); ?></td>
                    <td align="right">
                        <a href="javascript:void(0)" class="button remove delete" data-link="<?php echo base_url().$paths['delete'].'/'. $branch->id; ?>">Remove</a>
                        <a href="<?php echo base_url().$paths['edit'].'/'. $branch->id; ?>" class="button edit">Edit</a>
                    </td>
                </tr>
                <?php
                $sl++;
            }
        } else {
            ?>
            <tr><td colspan="5">No Branches found.</td></tr>
<?php } ?>
</table>