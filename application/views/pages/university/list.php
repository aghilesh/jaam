<table class="fl table generic-listing">
    <thead>
        <tr>
            <th>Sl.No.</th>
            <th>University</th>
            <th>Email</th>
            <th>Phone 1</th>
            <th>Commission %</th>
            <th class="txt-right">Application Fee</th>
            <th class="txt-right">Service Charge</th>
            <th>Country</th>
            <th>
                <?php if(getModuleActionPermission('add University')){?>
                <a href="<?php echo base_url().$paths['add']; ?>" class="fr button common-add-btn-click">ADD</a>
                <?php }?>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($universities) && !empty($universities)) {
            $sl = 1;
            foreach ($universities as $university) {
                ?>
                <tr>
                    <td><?php echo $sl; ?></td>
                    <td><?php echo $university->university; ?></td>
                    <td><?php echo $university->email_id; ?></td>
                    <td><?php echo $university->phone1; ?></td>
                    <td><?php echo $university->commission_percentage; ?></td>
                    <td class="txt-right"><?php echo $university->application_fee; ?></td>
                    <td class="txt-right"><?php echo $university->service_charge; ?></td>
                    <td><?php echo getCountryName($university->country_id); ?></td>
                    <td align="right">
                        <?php if(getModuleActionPermission('delete University')){?>
                        <a href="javascript:void(0)" class="button remove delete" data-link="<?php echo base_url().$paths['delete'].'/'. $university->id; ?>">Remove</a>
                        <?php }?>
                        <?php if(getModuleActionPermission('edit University')){?>
                        <a href="<?php echo base_url().$paths['edit'].'/'. $university->id; ?>" class="button edit">Edit</a>
                        <?php }?>
                        <a href="<?php echo base_url().$paths['view'].'/'. $university->id; ?>" class="button view">View</a>
                    </td>
                </tr>
                <?php
                $sl++;
            }
        } else {
            ?>
            <tr><td colspan="14">No Universities found.</td></tr>
<?php } ?>
</table>