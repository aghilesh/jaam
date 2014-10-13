<?php
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
                </tr>
            </thead>
            <tbody id="eduRows">
                <?php
                for($i = 0; $i < sizeof($registrationEducation); $i++ ) {
                    ?>
                    <tr>
                        <td><?php echo $registrationEducation[$i]->qualification?></td>
                        <td><?php echo $registrationEducation[$i]->board?></td>
                        <td><?php echo $registrationEducation[$i]->institution?></td>
                        <td><?php echo getCountryName($registrationEducation[$i]->country_id)?></td>
                        <td><?php echo $registrationEducation[$i]->passout_year?></td>
                        <td><?php echo $registrationEducation[$i]->percentage?></td>
                    </tr><?php
                }
                ?>
            </tbody>
        </table>
    </li>