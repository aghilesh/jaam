<?php
$courseInterestDetails = $registration_details['courseInterestDetails'];
?>
    <li class="fl form-label"><h2 class="form-sub-head strong">Course Interested</h2></li>
    <li class="clear newline"/>

    <li class="full-width">
        <table class="table generic-listing" id="enquiry_course_details">
            <thead>
                <tr>
                    <th>Course Preferred</th>
                    <th>Preferred Country</th>
                </tr>
            </thead>
            <tbody id="courseRows">
                <?php
                for($i = 0; $i < sizeof($courseInterestDetails); $i++) {
                ?>
                <tr>
                    <td><?php echo $courseInterestDetails[$i]->course_interested?></td>
                    <td><?php echo getCountryName($courseInterestDetails[$i]->country_id)?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </li>