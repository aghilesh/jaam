<table class="fl table generic-listing enquiry">
    <thead>
        <tr>
            <th style="width:5%">Sl.No.</th>
            <th>Check List</th>
            <th>Select Country  <?php if(!$selectedCountryId) array_unshift($countries,'Select');echo form_dropdown('country_id', $countries, $selectedCountryId, 'class="generic-" id="country_id"')?>
                <?php if(getModuleActionPermission('add Checklist')){?>
                <a href="<?php echo base_url().$paths['add']; ?>" class="fr button common-add-btn-click">ADD</a>
                <?php }?>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($checklist) && !empty($checklist)) {
            $sl = 1;
            $clArr = array();
            foreach ($checklist as $cl) {
                ?>
                <tr>
                    <td><?php echo $sl; ?></td>
                    <td><?php echo $cl->description?></td>
                    <td align="right">
                        <?php if(getModuleActionPermission('delete Checklist')){?>
                        <a href="javascript:void(0)" class="button remove delete" data-link="<?php echo base_url().$paths['delete'].'/'. $cl->id; ?>">Remove</a>
                        <?php }?>
                        <?php if(getModuleActionPermission('edit Checklist')){?>
                        <a href="<?php echo base_url().$paths['edit'].'/'. $cl->id; ?>" class="button edit">Edit</a>
                        <?php }?>
                    </td>
                </tr>
                <?php
                $sl++;
            }
        } else {
            ?>
            <tr><td colspan="3">No Checklist(s) found or you didn't choose a country.</td></tr>
<?php } ?>
    </tbody>
</table>
<input type="hidden" id="list_url" value="<?php echo $paths['list']?>">