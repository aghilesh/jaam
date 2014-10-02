<?php
$post = $this->input->post();
$enquiryEducation = $enquiry_details['educationDetails'];
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
                    <th>Actions<span class="action-link"><a href="javascript:void(0)" onClick="Enquiry.replicateEduRow()">ADD</a></span></th>
                </tr>
            </thead>
            <tbody id="eduRows">
                <?php
                if($_POST && array_key_exists('edu', $_POST)) {
                    $arr = array();
                    for($i = 0; $i < sizeof($_POST['edu']['qualification']); $i++ ) {
                        ?>
                       <tr>
                            <td><input class="generic-input validate validate-mandatory" type="text" name="edu[qualification][<?php echo $i?>]" placeholder="Qualification" value="<?php echo $_POST['edu']['qualification'][$i]?>"/></td>
                            <td><input class="generic-input validate validate-mandatory" type="text" name="edu[university][<?php echo $i?>]" placeholder="Board/University" value="<?php echo $_POST['edu']['university'][$i]?>"/></td>
                            <td><input class="generic-input validate validate-mandatory" type="text" name="edu[institution][<?php echo $i?>]" placeholder="Institution" value="<?php echo $_POST['edu']['institution'][$i]?>"/></td>
                            <td><?php echo form_dropdown('edu[country_id]['.$i.']', $countries,$_POST['edu']['country_id'][$i],'class="generic-input"');?></td>
                            <td><input class="generic-input validate validate-mandatory" type="text" name="edu[passoutyear][<?php echo $i?>]" placeholder="Passout Year" value="<?php echo $_POST['edu']['passoutyear'][$i]?>"/></td>
                            <td><input class="generic-input validate validate-mandatory  edu-percentage" type="text" name="edu[percentage][<?php echo $i?>]" placeholder="Percentage" value="<?php echo $_POST['edu']['percentage'][$i]?>"/></td>
                            <td>
                                <?php 
                                $actions =  array("select"=>"Select","remove"=>"Remove","add"=>"Add");
                                echo form_dropdown('action', $actions,'','class="generic-input" onchange="Enquiry.eduAction(this)" ');?>
                            </td>
                        </tr><?php
                    }
                } else {
                    for($i = 0; $i < sizeof($enquiryEducation); $i++ ) {
                        ?>
                       <tr>
                            <td><input class="generic-input validate validate-mandatory" type="text" name="edu[qualification][<?php echo 'edit-'.$enquiryEducation[$i]->ee_id?>]" placeholder="Qualification" value="<?php echo $enquiryEducation[$i]->qualification?>"/></td>
                            <td><input class="generic-input validate validate-mandatory" type="text" name="edu[university][<?php echo 'edit-'.$enquiryEducation[$i]->ee_id?>]" placeholder="Board/University" value="<?php echo $enquiryEducation[$i]->board?>"/></td>
                            <td><input class="generic-input validate validate-mandatory" type="text" name="edu[institution][<?php echo 'edit-'.$enquiryEducation[$i]->ee_id?>]" placeholder="Institution" value="<?php echo $enquiryEducation[$i]->institution?>"/></td>
                            <td><?php echo form_dropdown('edu[country_id][edit-'.$enquiryEducation[$i]->ee_id.']', $countries,$enquiryEducation[$i]->country_id,'class="generic-input"');?></td>
                            <td><input class="generic-input validate validate-mandatory" type="text" name="edu[passoutyear][<?php echo 'edit-'.$enquiryEducation[$i]->ee_id?>]" placeholder="Passout Year" value="<?php echo $enquiryEducation[$i]->passout_year?>"/></td>
                            <td><input class="generic-input validate validate-mandatory  edu-percentage" type="text" name="edu[percentage][<?php echo 'edit-'.$enquiryEducation[$i]->ee_id?>]" placeholder="Percentage" value="<?php echo $enquiryEducation[$i]->percentage?>"/></td>
                            <td>
                                <?php 
                                $actions =  array("select"=>"Select","remove"=>"Remove","add"=>"Add");
                                echo form_dropdown('action', $actions,'','class="generic-input" onchange="Enquiry.eduAction(this)" ');?>
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
                        echo form_dropdown('action', $actions,'','class="generic-input" onchange="Enquiry.eduAction(this)" ');?>
                    </td>
                </tr>
            </tbody>
        </table>
    </li>