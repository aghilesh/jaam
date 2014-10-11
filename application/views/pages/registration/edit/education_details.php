<?php
$post = $this->input->post();
$registrationEducation = $registration_details['educationDetails'];
?>
    <li class="fl form-label"><h2 class="form-sub-head strong">Education details</h2></li>
    <li class="clear newline"/>

    <li class="full-width">
        <table class="table generic-listing" id="enquiry_edu_details">
            <thead>
                <tr>
                    <th>Qualification</th>
                    <th>Board/University</th>
                    <th>Institution</th>
                    <th>Country</th>
                    <th>Passout Year</th>
                    <th>Percentage</th>
                    <th>Actions<span class="action-link"><a href="javascript:void(0)" onClick="Registration.replicateEduRow()">ADD</a></span></th>
                </tr>
            </thead>
            <tbody id="eduRows">
                <?php
                if($_POST && array_key_exists('edu', $_POST)) {
                    $education = $post['edu'];
                    $arr = array();
                    foreach($education['qualification'] as $id=>$val) {
                        ?>
                       <tr>
                            <td><input class="generic-input validate validate-mandatory" type="text" name="edu[qualification][<?php echo $id?>]" placeholder="Qualification" value="<?php echo $education['qualification'][$id]?>"/></td>
                            <td><input class="generic-input validate validate-mandatory" type="text" name="edu[university][<?php echo $id?>]" placeholder="Board/University" value="<?php echo $education['university'][$id]?>"/></td>
                            <td><input class="generic-input validate validate-mandatory" type="text" name="edu[institution][<?php echo $id?>]" placeholder="Institution" value="<?php echo $education['institution'][$id]?>"/></td>
                            <td><?php echo form_dropdown('edu[country_id]['.$id.']', $countries,$education['country_id'][$id],'class="generic-input"');?></td>
                            <td><input class="generic-input validate validate-mandatory" type="text" name="edu[passoutyear][<?php echo $id?>]" placeholder="Passout Year" value="<?php echo $education['passoutyear'][$id]?>"/></td>
                            <td><input class="generic-input validate validate-mandatory  edu-percentage" type="text" name="edu[percentage][<?php echo $id?>]" placeholder="Percentage" value="<?php echo $education['percentage'][$id]?>"/></td>
                            <td>
                                <?php 
                                $actions =  array("select"=>"Select","remove"=>"Remove","add"=>"Add");
                                echo form_dropdown('action', $actions,'','class="generic-input" onchange="Registration.eduAction(this)" ');?>
                            </td>
                        </tr><?php
                    }
                } else {
                    for($i = 0; $i < sizeof($registrationEducation); $i++ ) {
                        ?>
                       <tr>
                            <td><input class="generic-input validate validate-mandatory" type="text" name="edu[qualification][<?php echo 'edit-'.$registrationEducation[$i]->ee_id?>]" placeholder="Qualification" value="<?php echo $registrationEducation[$i]->qualification?>"/></td>
                            <td><input class="generic-input validate validate-mandatory" type="text" name="edu[university][<?php echo 'edit-'.$registrationEducation[$i]->ee_id?>]" placeholder="Board/University" value="<?php echo $registrationEducation[$i]->board?>"/></td>
                            <td><input class="generic-input validate validate-mandatory" type="text" name="edu[institution][<?php echo 'edit-'.$registrationEducation[$i]->ee_id?>]" placeholder="Institution" value="<?php echo $registrationEducation[$i]->institution?>"/></td>
                            <td><?php echo form_dropdown('edu[country_id][edit-'.$registrationEducation[$i]->ee_id.']', $countries,$registrationEducation[$i]->country_id,'class="generic-input"');?></td>
                            <td><input class="generic-input validate validate-mandatory" type="text" name="edu[passoutyear][<?php echo 'edit-'.$registrationEducation[$i]->ee_id?>]" placeholder="Passout Year" value="<?php echo $registrationEducation[$i]->passout_year?>"/></td>
                            <td><input class="generic-input validate validate-mandatory  edu-percentage" type="text" name="edu[percentage][<?php echo 'edit-'.$registrationEducation[$i]->ee_id?>]" placeholder="Percentage" value="<?php echo $registrationEducation[$i]->percentage?>"/></td>
                            <td>
                                <?php 
                                $actions =  array("select"=>"Select","remove"=>"Remove","add"=>"Add");
                                echo form_dropdown('action', $actions,'','class="generic-input" onchange="Registration.eduAction(this)" ');?>
                            </td>
                        </tr><?php
                    }
                }
                ?>
                <tr class="hidden dummyDataRows" id="dummyRowEducation">
                    <td><input class="generic-input validate validate-mandatory" type="text" name="edu[qualification][]" placeholder="Qualification"/></td>
                    <td><input class="generic-input validate validate-mandatory" type="text" name="edu[university][]" placeholder="Board/University"/></td>
                    <td><input class="generic-input validate validate-mandatory" type="text" name="edu[institution][]" placeholder="Institution"/></td>
                    <td><?php echo form_dropdown('edu[country_id][]', $countries,'','class="generic-input"');?></td>
                    <td><input class="generic-input validate validate-mandatory" type="text" name="edu[passoutyear][]" placeholder="Passout Year"/></td>
                    <td><input class="generic-input validate validate-mandatory  edu-percentage" type="text" name="edu[percentage][]" placeholder="Percentage"/></td>
                    <td>
                        <?php 
                        $actions =  array("select"=>"Select","remove"=>"Remove","add"=>"Add");
                        echo form_dropdown('action', $actions,'','class="generic-input" onchange="Registration.eduAction(this)" ');?>
                    </td>
                </tr>
            </tbody>
        </table>
    </li>