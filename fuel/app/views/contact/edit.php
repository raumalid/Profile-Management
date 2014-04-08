<h2>Editing <span class='muted'>Contact</span></h2>
<br>

<?php echo render('contact/_form'); ?>
<p>
	<?php echo Html::anchor('contact/view/'.$contact->id, 'View'); ?> |
	<?php echo Html::anchor('contact', 'Back'); ?></p>
