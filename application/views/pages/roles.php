<form id="permission-mapping" method="post">
    <table class="sticky-enabled tableheader-processed sticky-table permissions-processed" id="permissions">
        <thead>
            <tr>
                <th>Permission</th>
                <?php 
                    $colspan    = count($roles) + 1;
                    if($roles && !empty($roles)){
                        foreach($roles as $role){
                            echo "<th class='checkbox'>$role->role</th>";
                        }
                    }
                ?>            
            </tr>
        </thead>
        <tbody>
            <?php
                if($modules && !empty($modules)){
                    foreach($modules as $module){
            ?>
                        <tr class="odd">
                            <td colspan="4" id="module-comment" class="module"><?php echo $module->module_name; ?></td>
                        </tr>    
                        <tr class="even">
                            <td class="permission">
                                <div class="form-item form-type-item" id="edit-administer-comments">
                                    Add <?php echo $module->module_name; ?>
                                </div>
                            </td>
                            <?php 
                                if($roles && !empty($roles)){
                                    foreach($roles as $role){
                                        if(isAllowedPermission($role->id, "add $module->module_name"))
                                            $checkedStatus  = ' checked="checked" ';
                                        else
                                            $checkedStatus  = '';
                            ?>
                                        <td class="checkbox">
                                            <div class="form-item form-type-checkbox form-item-1-administer-comments">
                                                <input type="checkbox" <?php echo $checkedStatus; ?> value="add <?php echo $module->module_name; ?>" name="<?php echo $role->id; ?>[add <?php echo $module->module_name; ?>]" id="edit-<?php echo $role->id; ?>-add-<?php echo $module->module_name; ?>" class="rid-<?php echo $role->id; ?> form-checkbox">
                                           </div>
                                        </td>                        
                            <?php
                                    }
                                }
                            ?>                         
                        </tr>
                        <tr class="odd">
                            <td class="permission">
                                <div class="form-item form-type-item" id="edit-access-comments">
                                    Edit <?php echo $module->module_name; ?>
                               </div>
                            </td>
                            <?php 
                                if($roles && !empty($roles)){
                                    foreach($roles as $role){
                                        if(isAllowedPermission($role->id, "edit $module->module_name"))
                                            $checkedStatus  = ' checked="checked" ';
                                        else
                                            $checkedStatus  = '';
                            ?>
                                        <td class="checkbox">
                                            <div class="form-item form-type-checkbox form-item-1-access-comments">
                                                <input type="checkbox" <?php echo $checkedStatus; ?> value="edit <?php echo $module->module_name; ?>" name="<?php echo $role->id; ?>[edit <?php echo $module->module_name; ?>]" id="edit-<?php echo $role->id; ?>-edit-<?php echo $module->module_name; ?>" class="rid-<?php echo $role->id; ?> form-checkbox">
                                           </div>
                                        </td>                        
                            <?php
                                    }
                                }
                            ?>                           
                        </tr>    
                        <tr class="odd">
                            <td class="permission">
                                <div class="form-item form-type-item" id="edit-access-comments">
                                    Delete <?php echo $module->module_name; ?>
                               </div>
                            </td>
                            <?php 
                                if($roles && !empty($roles)){
                                    foreach($roles as $role){
                                        if(isAllowedPermission($role->id, "delete $module->module_name"))
                                            $checkedStatus  = ' checked="checked" ';
                                        else
                                            $checkedStatus  = '';
                            ?>
                                        <td class="checkbox">
                                            <div class="form-item form-type-checkbox form-item-1-access-comments">
                                                <input type="checkbox" <?php echo $checkedStatus; ?> value="delete <?php echo $module->module_name; ?>" name="<?php echo $role->id; ?>[delete <?php echo $module->module_name; ?>]" id="edit-<?php echo $role->id; ?>-delete-<?php echo $module->module_name; ?>" class="rid-<?php echo $role->id; ?> form-checkbox">
                                           </div>
                                        </td>                        
                            <?php
                                    }
                                }
                            ?>
                        </tr>    
            <?php
                    }
            ?>
            <?php
                }
            ?>
        </tbody>
        <tr>
            <td colspan="<?php echo $colspan; ?>">
                <input type="submit" name="submit" value="Update Permissions" class="permission-submit"/>
            </td>
        </tr>
    </table>    
</form>