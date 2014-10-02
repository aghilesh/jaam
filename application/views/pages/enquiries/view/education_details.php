<?php
$enquiryEducation = $enquiry_details['educationDetails'];
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
                </tr>
            </thead>
            <tbody id="eduRows">
                <?php
                for($i = 0; $i < sizeof($enquiryEducation); $i++ ) {
                    ?>
                    <tr>
                        <td><?php echo $enquiryEducation[$i]->qualification?></td>
                        <td><?php echo $enquiryEducation[$i]->board?></td>
                        <td><?php echo $enquiryEducation[$i]->institution?></td>
                        <td><?php echo getCountryName($enquiryEducation[$i]->country_id)?></td>
                        <td><?php echo $enquiryEducation[$i]->passout_year?></td>
                        <td><?php echo $enquiryEducation[$i]->percentage?></td>
                    </tr><?php
                }
                ?>
            </tbody>
        </table>
    </li>