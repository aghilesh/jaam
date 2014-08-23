<?php
$post = $this->input->post();
?>
    <li class="fl form-label"><h2 class="form-sub-head">Course Interested</h2></li>
    <li class="clear newline"/>

    <li class="full-width">
        <table class="table generic-listing" id="enquiry_course_details">
            <thead>
                <tr>
                    <th>Course Preferred</th>
                    <th>Preferred Country</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input class="generic-input validate validate-mandatory course-name" type="text" name="course[course_name][]" placeholder="Course"/></td>
                    <td><?php echo form_dropdown('course[country_id][]', $countries,'','class="generic-input"');?></td>
                    <td>
                        <?php 
                        $actions =  array("select"=>"Select","remove"=>"Remove","add"=>"Add");
                        echo form_dropdown('action', $actions,'','class="generic-input" onchange="Enquiry.eduAction(this)" ');?>
                    </td>
                </tr>
            </tbody>
        </table>
    </li>