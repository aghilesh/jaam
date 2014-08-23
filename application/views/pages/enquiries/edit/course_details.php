<?php
$post = $this->input->post();
$courseInterestDetails = $enquiry_details['courseInterestDetails'];
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
            <tbody id="courseRows">
                <?php
                if($_POST && array_key_exists('course', $_POST)) {
                    for($i = 0; $i < sizeof($_POST['course']['course_name']); $i++) {
                    ?>
                    <tr>
                        <td><input class="generic-input validate validate-mandatory course-name" type="text" name="course[course_name][<?php echo $i?>]" placeholder="Course" value="<?php echo $_POST['course']['course_name'][$i]?>"/></td>
                        <td><?php echo form_dropdown('course[country_id]['.$i.']', $countries,$_POST['course']['country_id'][$i],'class="generic-input"');?></td>
                        <td>
                            <?php 
                            $actions =  array("select"=>"Select","remove"=>"Remove","add"=>"Add");
                            echo form_dropdown('action', $actions,'','class="generic-input" onchange="Enquiry.eduAction(this)" ');?>
                        </td>
                    </tr>
                    <?php
                    }
                } else {
                    for($i = 0; $i < sizeof($courseInterestDetails); $i++) {
                    ?>
                    <tr>
                        <td><input class="generic-input validate validate-mandatory course-name" type="text" name="course[course_name][<?php echo $i?>]" placeholder="Course" value="<?php echo $courseInterestDetails[$i]->course_interested?>"/></td>
                        <td><?php echo form_dropdown('course[country_id]['.$i.']', $countries,$courseInterestDetails[$i]->country_id,'class="generic-input"');?></td>
                        <td>
                            <?php 
                            $actions =  array("select"=>"Select","remove"=>"Remove","add"=>"Add");
                            echo form_dropdown('action', $actions,'','class="generic-input" onchange="Enquiry.courseAction(this)" ');?>
                        </td>
                    </tr>
                    <?php
                    }
                }
                ?>
                <tr class="hidden dummyDataRows" id="dummyRowCourse">
                    <td><input class="generic-input validate validate-mandatory course-name" type="text" name="course[course_name][]" placeholder="Course"/></td>
                    <td><?php echo form_dropdown('course[country_id][]', $countries,'','class="generic-input"');?></td>
                    <td>
                        <?php 
                        $actions =  array("select"=>"Select","remove"=>"Remove","add"=>"Add");
                        echo form_dropdown('action', $actions,'','class="generic-input" onchange="Enquiry.courseAction(this)" ');?>
                    </td>
                </tr>
            </tbody>
        </table>
    </li>