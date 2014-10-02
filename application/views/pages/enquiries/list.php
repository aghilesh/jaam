<table class="fl table generic-listing enquiry">
    <thead>
        <tr>
            <th style="width:5%">Sl.No.</th>
            <th>Mode</th>
            <th>Name</th>
            <th>Address</th>
            <th>Email</th>
            <th>Phone</th>
            <th><a href="<?php echo base_url().$paths['add']; ?>" class="fr button common-add-btn-click">ADD</a></th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($enquiries) && !empty($enquiries)) {
            $sl = 1;
            foreach ($enquiries as $enquiry) {
                ?>
                <tr>
                    <td><?php echo $sl; ?></td>
                    <td><?php echo getEnquiryMode($enquiry->enquiry_mode)?></td>
                    <td><?php echo getFormattedName(array('FNAME'=>$enquiry->first_name,'LNAME'=>$enquiry->last_name))?></td>
                    <td><?php echo $enquiry->address.','.$enquiry->state.','.getCountryName($enquiry->country_id)?></td>
                    <td><?php echo $enquiry->email_id?></td>
                    <td><?php echo $enquiry->phone_no?></td>
                    <td align="right">
                        <a href="javascript:void(0)" class="button remove delete" data-link="<?php echo base_url().$paths['delete'].'/'. $enquiry->id; ?>">Remove</a>
                        <a href="<?php echo base_url().$paths['edit'].'/'. $enquiry->id; ?>" class="button edit">Edit</a>
                        <a href="<?php echo base_url().$paths['view'].'/'. $enquiry->id; ?>" class="button view">View</a>
                    </td>
                </tr>
                <?php
                $sl++;
            }
        } else {
            ?>
            <tr><td colspan="7">No Enquiries found.</td></tr>
<?php } ?>
    </tbody>
</table>