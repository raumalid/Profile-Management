<div class="headline"><h3>Listing <span class='muted'>Users</span></h3></div>
<br>
<?php echo Html::anchor('user/create', '<i class="icon-plus icon-white"></i> Add New User', array('class' => 'btn btn-inverse', 'style' => "color:#fff; float:right; margin-top:20px; margin-right:0px;")); ?>

<?php if ($users): ?>
    <table class="table table-striped" style="margin-top:50px;">
        <thead>
            <tr>
                <th>Username</th>
                <th>Last Login</th>
                <th>Access Level</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>		
                <tr>

                    <td><?php echo $user->username; ?></td>
                    <td><?php echo $user->last_login_at; ?></td>
                    <td><?php echo $user->access_level; ?></td>
                      
                  

                    <td><?php echo Html::anchor('user/edit/' . $user->id, '<i class="icon-wrench" title="Edit"></i>'); ?></td>
                    <td><?php echo Html::anchor('user/delete/' . $user->id, '<i class="icon-trash" title="Delete"></i>', array('onclick' => "return confirm('Are you sure?')")); ?></td>
                </tr>
            <?php endforeach; ?>	
        </tbody>
    </table>

<?php else: ?>
    <div class='noexist'><h1>No Users</h1></div>

<?php endif; ?><p>

</p>
