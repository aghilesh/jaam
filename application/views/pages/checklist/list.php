<form name="checkListSaveAllForm" id="checkListSaveAllForm" method="POST" action="<?php echo base_url().$paths['updatAll']?>">
<table class="fl table generic-listing enquiry">
    <thead>
        <tr>
            <th style="width:5%">Sl.No.</th>
            <th style="width:40%">Check List</th>
            <th style="width:55%">Select Country  <?php if(!$selectedCountryId) array_unshift($countries,'Select');echo form_dropdown('country_id', $countries, $selectedCountryId, 'class="generic-" id="country_id"')?>
                <?php if(getModuleActionPermission('add Checklist')){?>
                <a href="<?php echo base_url().$paths['add']; ?>" class="fr button common-add-btn-click">ADD</a>
                <a id="save-all-btn" href="javascript:void(0)" onClick="Checklist.submitCheckListSaveAllForm()" class="fr hidden button common-add-btn-click">SAVE ALL</a>
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
                    <td id="checkListRow-<?php echo $cl->id?>" onClick="Checklist.editRow('<?php echo $cl->id?>')"><?php echo $cl->description?></td>
                    <td align="right">
                        <?php if(getModuleActionPermission('delete Checklist')){?>
                        <a href="javascript:void(0)" class="button remove delete" data-link="<?php echo base_url().$paths['delete'].'/'. $cl->id; ?>">Remove</a>
                        <?php }?>
                        <?php if(getModuleActionPermission('edit Checklist')){?>
                        <a href="javascript:void(0)" onClick="Checklist.editRow('<?php echo $cl->id?>')" class="button edit">Edit</a>
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
    </form>
<input type="hidden" id="list_url" value="<?php echo $paths['listUrlWoId']?>">
<span class="hidden" id="checkListEditTemplate"><input type="text" class="generic-input checklist-field" name="checkListRows[{REPL_CHECKLIST_ID}]" value="{REPL_CHECKLIST_VALUE}"/></span>
