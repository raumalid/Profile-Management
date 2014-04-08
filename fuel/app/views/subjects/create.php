<div class="headline">
    <h3 style="z-index:0;">Subjects <span class='muted'>Taught</span>
    </h3></div><br>

<?php echo Form::open(array("class"=>"formee")); ?>
    <table class="table table-striped">
        <tbody>
            <?php echo Html::anchor('faculty/view/'.$id, '<< Back', array('class' => 'btn btn-danger', 'style' => 'color:#fff;margin-left:20px;')); ?>
            <?php echo Form::Label('Please check the boxes beside subject taught','course',array('style' => 'margin-left:20px;')); ?>
              
<?php foreach ($subjectlists as $subjectlist): ?>
            
            <tr>
                <td><?php echo Form::checkbox('course',$subjectlist->course_id.'-'.$subjectlist->course_name); ?></td>
                <td><?php echo $subjectlist->course_id; ?></td>
                    <td><?php echo $subjectlist->course_name; ?></td>
         <td>           <?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary', 'style' => 'font-size:10px; margin-left:20px;height:30px;')); ?></td>
            </tr>
<?php endforeach; ?>
        </tbody>
    </table>

<?php echo Form::close(); ?>

