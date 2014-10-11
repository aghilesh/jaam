<?php
$post = $this->input->post();
?>
    <li class="fl form-label"><h2 class="form-sub-head strong">Course Interested</h2></li>
    <li class="clear newline"/>

    <li class="full-width">
        <table class="table generic-listing" id="enquiry_course_details">
            <thead>
                <tr>
                    <th>Course Preferred</th>
                    <th>Preferred Country</th>
                    <th>Actions<span class="action-link"><a href="javascript:void(0)" onClick="Registration.replicateCourseRow()">ADD</a></span></th>
                </tr>
            </thead>
            <tbody id="courseRows">
                <?php
                if($post['course']) {
                    $course =   $post['course'];
                    for($i=0; $i<sizeof($course['course_name']); $i++) {
                    ?>
                        <tr>
                            <td><input class="generic-input validate validate-mandatory course-name" type="text" name="course[course_name][]" value="<?php echo $course['course_name'][$i]?>"/></td>
                            <td><?php echo form_dropdown('course[country_id][]', $countries,  $course['country_id'][$i],'class="generic-input"');?></td>
                            <td>
                                <?php 
                                $actions =  array("select"=>"Select","remove"=>"Remove","add"=>"Add");
                                echo form_dropdown('action', $actions,'','class="generic-input" onchange="Registration.courseAction(this)" ');?>
                            </td>
                        </tr>
                    <?php
                    }
                } else {
                ?>
                <tr>
                    <td><input class="generic-input validate validate-mandatory course-name" type="text" name="course[course_name][]" placeholder="Course"/></td>
                    <td><?php echo form_dropdown('course[country_id][]', $countries,'','class="generic-input"');?></td>
                    <td>
                        <?php 
                        $actions =  array("select"=>"Select","remove"=>"Remove","add"=>"Add");
                        echo form_dropdown('action', $actions,'','class="generic-input" onchange="Registration.courseAction(this)" ');?>
                    </td>
                </tr>
                <?php
                }
                ?>
                <tr class="hidden dummyDataRows" id="dummyRowCourse">
                    <td><input class="generic-input validate validate-mandatory course-name" type="text" name="course[course_name][]" placeholder="Course"/></td>
                    <td><?php echo form_dropdown('course[country_id][]', $countries,'','class="generic-input"');?></td>
                    <td>
                        <?php 
                        $actions =  array("select"=>"Select","remove"=>"Remove","add"=>"Add");
                        echo form_dropdown('action', $actions,'','class="generic-input" onchange="Registration.courseAction(this)" ');?>
                    </td>
                </tr>
            </tbody>
        </table>
    </li>