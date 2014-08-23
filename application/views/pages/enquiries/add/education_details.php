<?php
$post = $this->input->post();
?>
    <li class="fl form-label"><h2 class="form-sub-head">Education details</h2></li>
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
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="eduRows">
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