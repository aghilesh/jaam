<table class="fl table generic-listing enquiry">
    <thead>
        <tr>
            <th style="width:5%">Sl.No.</th>
            <th>Mode</th>
            <th>Name</th>
            <th>Address</th>
            <th>Email</th>
            <th>Phone</th>
            <th style="width:19.5%">
                <?php if(getModuleActionPermission('add Enquiries')){?>
                <a href="<?php echo base_url().$paths['add']; ?>" class="fr button common-add-btn-click">ADD</a>
                <?php }?>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($registrations) && !empty($registrations)) {
            $sl = 1;
            foreach ($registrations as $registration) {
                ?>
                <tr>
                    <td><?php echo $sl; ?></td>
                    <td><?php echo getEnquiryMode($registration->enquiry_mode)?></td>
                    <td><?php echo getFormattedName(array('FNAME'=>$registration->first_name,'LNAME'=>$registration->last_name))?></td>
                    <td><?php echo $registration->address.','.$registration->state.','.getCountryName($registration->country_id)?></td>
                    <td><?php echo $registration->email_id?></td>
                    <td><?php echo $registration->phone_no?></td>
                    <td align="right">
                        <?php if(getModuleActionPermission('delete Registration')){?>
                        <a href="javascript:void(0)" class="button remove delete" data-link="<?php echo base_url().$paths['delete'].'/'. $registration->id; ?>">Remove</a>
                        <?php }?>
                        <?php if(getModuleActionPermission('edit Enquiries')){?>
                        <a href="<?php echo base_url().$paths['edit'].'/'. $registration->id; ?>" class="button edit">Edit</a>
                        <?php }?>
                        <a href="<?php echo base_url().$paths['view'].'/'. $registration->id; ?>" class="button view">View</a>
                    </td>
                </tr>
                <?php
                $sl++;
            }
        } else {
            ?>
            <tr><td colspan="7">No Registrations found.</td></tr>
<?php } ?>
    </tbody>
</table>