<?php
$post = $this->input->post();
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
                if($post['edu']){
                    $education = $post['edu'];
                    for($i=0; $i<sizeof($education['qualification']); $i++) {
                    ?>
                    <tr>
                        <td><input class="generic-input validate validate-mandatory" type="text" name="edu[qualification][]" value="<?php echo $education['qualification'][$i]?>"/></td>
                        <td><input class="generic-input validate validate-mandatory" type="text" name="edu[university][]" value="<?php echo $education['university'][$i]?>"/></td>
                        <td><input class="generic-input validate validate-mandatory" type="text" name="edu[institution][]" value="<?php echo $education['institution'][$i]?>"/></td>
                        <td><?php echo form_dropdown('edu[country_id][]', $countries,$education['country_id'][$i],'class="generic-input"');?></td>
                        <td><input class="generic-input validate validate-mandatory" type="text" name="edu[passoutyear][]" value="<?php echo $education['passoutyear'][$i]?>"/></td>
                        <td><input class="generic-input validate validate-mandatory  edu-percentage" type="text" name="edu[percentage][]" value="<?php echo $education['percentage'][$i]?>"/></td>
                        <td>
                            <?php 
                            $actions =  array("select"=>"Select","remove"=>"Remove","add"=>"Add");
                            echo form_dropdown('action', $actions,'','class="generic-input" onchange="Enquiry.eduAction(this)" ');?>
                        </td>
                    <tr>
                    <?php
                    }
                } else {
                ?>
                <tr>
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
                <?php
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