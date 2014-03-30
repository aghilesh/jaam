<table class="fl table generic-listing">
    <thead>
        <tr>
            <th>Sl.No.</th>
            <th>Agency</th>
            <th>Email</th>
            <th>Phone 1</th>
            <th>Commission Percentage</th>
            <th>Application Fee</th>
            <th>Service Charge</th>
            <th>Country</th>
            <th><a href="<?php echo base_url().$paths['add']; ?>" class="fr button common-add-btn-click">ADD</a></th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($agencies) && !empty($agencies)) {
            $sl = 1;
            foreach ($agencies as $agency) {
                ?>
                <tr>
                    <td><?php echo $sl; ?></td>
                    <td><?php echo $agency->agency; ?></td>
                    <td><?php echo $agency->email_id; ?></td>
                    <td><?php echo $agency->phone1; ?></td>
                    <td><?php echo $agency->commission_percentage; ?></td>
                    <td><?php echo $agency->application_fee; ?></td>
                    <td><?php echo $agency->service_charge; ?></td>
                    <td><?php echo getCountryName($agency->country_id); ?></td>
                    <td align="right">
                        <a href="javascript:void(0)" class="button remove delete" data-link="<?php echo base_url().$paths['delete'].'/'. $agency->id; ?>">Remove</a>
                        <a href="<?php echo base_url().$paths['edit'].'/'. $agency->id; ?>" class="button edit">Edit</a>
                        <a href="<?php echo base_url().$paths['view'].'/'. $agency->id; ?>" class="button view">View</a>
                    </td>
                </tr>
                <?php
                $sl++;
            }
        } else {
            ?>
            <tr><td colspan="14">No Agencies found.</td></tr>
<?php } ?>
</table>