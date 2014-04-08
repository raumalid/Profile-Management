<div class="headline">
    <h3 style="z-index:0;">Select <span class='muted'>Batch</span>
    </h3></div><br>
<?php
if ($user = Session::get('user')) {
    if ($user->access_level == 'admin') {

        echo Html::anchor('student/batch/create', '<i class="icon-plus icon-white"></i> Add New Batch', array('class' => 'btn btn-inverse', 'style' => "color:#fff; float:right; margin-top:30px;margin-right:10px; margin-bottom:5px;"));
    }
}
?>
<?php if ($student_batches): ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Start year</th>
                <th>End year</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($student_batches as $student_batch): ?>		<tr>

                    <td><?php echo $student_batch->start_year; ?></td>
                    <td><?php echo $student_batch->end_year; ?></td>
                    <td>
                        <?php echo Html::anchor('student/index/' . $student_batch->end_year, '<i class="icon-eye-open" title="View"></i>'); ?> 
                        <?php
                        if ($user = Session::get('user')) {
                            if ($user->access_level == 'admin') {

                                echo Html::anchor('student/batch/delete/' . $student_batch->id, '| <i class="icon-trash" title="Delete"></i>', array('onclick' => "return confirm('Are you sure?')"));
                            }
                        }
                        ?>

                    </td>
                </tr>
    <?php endforeach; ?>	</tbody>
    </table>

<?php else: ?>
    <p>No Student_batches.</p>

<?php endif; ?><p>

</p>
