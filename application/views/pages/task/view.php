<div class="fl full-width">
    <div class="form-inner">
        <ul class="fl form-fields-ul-slider">
            <li class="fl form-label">Title</li>
            <li class="fl form-field"><?php echo @$task->title ?></li>
            <li class="clear newline"/>

            <li class="fl form-label">Description</li>
            <li class="fl form-field"><?php echo @$task->description ?></li>
            <li class="clear newline"/>

            <li class="fl form-label">Date Time</li>
            <li class="fl form-field"><?php echo @date('d-m-Y h:i A', strtotime($task->when)) ?></li>
            <li class="clear newline"/>

            <li class="fl form-label">Assigned By</li>
            <li class="fl form-field"><?php echo @getUserName($task->assigned_by) ?></li>
            <li class="clear newline"/>

            <li class="fl form-label">Status</li>
            <li class="fl form-field"><?php echo @getTaskStatus($task->status) ?></li>
            <li class="clear newline"/>

            <li class="fl form-label">&nbsp;</li>
            <li class="fl form-field">
                <a href="<?php echo $this->config->item('base_url') . $paths['list'] . '?' . random_string() ?>" class="fl marginleft10 button cancel common-cancel-btn-click">Cancel</a>
                <a onclick="javascript:(function() {
                            $('#task_log_form').show();
                            $('#comments').val('');
                        })()" class="button edit">Add Log</a>
            </li>
            <li class="clear newline"/>
        </ul>
        <ul class="fl form-fields-ul-slider hide" id="task_log_form">
            <?php
            $attributes = array('class' => '', 'id' => '');
            echo form_open($uri_string, $attributes);
            ?>
            <li class="fl form-label">Comment</li>
            <li class="fl form-field"><textarea name="comments" class="generic-textarea" id="comments"></textarea></li>
            <li class="clear newline"/>

            <li class="fl form-label">Task Status</li>
            <li class="fl form-field">
                <?php echo form_dropdown('status', $task_status, $task->status, 'id="status" class="generic-input"'); ?>
            </li>
            <li class="clear newline"/>

            <li class="fl form-label">&nbsp;</li>
            <li class="fl form-field" sty>
                <a onclick="javascript:(function() {
                            $('#task_log_form').hide();
                        })()" class="fl marginleft10 button cancel common-cancel-btn-click">Cancel</a>
                <a href="javascript:void(0)" class="fl button save common-save-btn-click">Save</a>
            </li>
            <li class="clear newline"/>
            <?php echo form_close() ?>
        </ul>
    </div>
</div>
<?php if (isset($task_history) && !empty($task_history)) { ?>
    <table class="fl table generic-listing">
        <thead>
            <tr>
                <th>Sl.No.</th>
                <th>Comment</th>
                <th>Date Time</th>
                <th>Task Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sl = 1;
            foreach ($task_history as $list) {
                ?>
                <tr>
                    <td><?php echo $sl; ?></td>
                    <td><?php echo $list->comments; ?></td>
                    <td><?php echo date('d-m-Y H:i A', strtotime($list->created_date)); ?></td>
                    <td><?php echo @getTaskStatus($list->task_status); ?></td>
                </tr>
                <?php
                $sl++;
            }
            ?>
        </tbody>
    </table>
<?php
}?>