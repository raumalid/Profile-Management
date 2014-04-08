<div class="headline">
    <h3 style="z-index:0;">Student <span class='muted'>Directory</span>
    </h3></div>
<br>
    <?php echo Html::anchor('student/batch/', '<< Back', array('class' => 'btn btn-danger', 'style' => 'color:#fff;float:left; margin-top:25px; margin-left:15px;')); ?>
    
<?php
if ($user = Session::get('user')) {
    if ($user->access_level == 'admin') {

        echo Html::anchor('student/create', '<i class="icon-plus icon-white"></i> Add New Student', array('class' => 'btn btn-inverse', 'style' => "float:right; color:#fff; float:right; margin-top:30px;margin-right:0px; margin-bottom:5px;"));
    }
}
?>

<?php if ($students): ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Registration no</th>
                <th>Roll no</th>
                <th>Name</th>                
                <th>Contact</th>
                <th>Email</th>
                <th>cgpa</th>
                <th>Image</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student): ?>		<tr>

                    <td><?php echo $student->id; ?></td>
                    <td><?php echo $student->roll_no; ?></td>
                    <td><?php echo $student->name; ?></td>
                    <td><?php echo $student->contact; ?></td>
                    <td><?php echo $student->email; ?></td>
                    <td><?php echo $student->cgpa; ?></td>
                    
                    <td><img src='../../students/<?php echo $student->image; ?>' style='height:100px;'/></td>
                    <td>
                        <?php
                        if ($user = Session::get('user')) {
                            if ($user->access_level == 'admin') {

                                echo Html::anchor('student/edit/' . $student->id, '<i class="icon-wrench" title="Edit"></i>');
                                ?> |
                <?php echo Html::anchor('student/delete/' . $student->id, '<i class="icon-trash" title="Delete"></i>', array('onclick' => "return confirm('Are you sure?')"));
            }
        } ?>

                    </td>

                </tr>
    <?php endforeach; ?>	</tbody>
    </table>

<?php else: ?>
    <p>No Students.</p>

<?php endif; ?>