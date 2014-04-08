<?php echo Form::open(array("class"=>"formee well")); ?>

<?php foreach ($subjectlists as $subjectlist): ?>
<?php echo $subjectlist->course_id +' '+$subjectlist->course_name; ?>
<?php endforeach; ?>


<?php echo Form::close(); ?>