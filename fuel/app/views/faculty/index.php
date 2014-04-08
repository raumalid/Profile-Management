<div class="headline">
    <h3 style="z-index:0;">Faculty <span class='muted'>Directory</span>
    </h3></div><br>
<div class="entry-content">
    <?php
    if ($user = Session::get('user')) {
        if ($user->access_level == 'admin') {

            echo Html::anchor('faculty/create', '<i class="icon-plus icon-white"></i> Add New Faculty', array('class' => 'btn btn-inverse', 'style' => "color:#fff; float:right; margin-top:30px;margin-right:170px; margin-bottom:5px;"));
        }
    }
    ?>
    
<?php if ($faculties): ?>
        <table id="wp-table-reloaded-id-1-no-1" style="width:900px; margin-top: 60px;">    
            <tbody class="row-hover" style="width:900px;">

    <?php foreach ($faculties as $faculty): ?>		<tr>


                    <tr class="row-<?php echo $faculty->id; ?>">
                        <td class="column-1"><img src=http://localhost/profilemanagement/public/faculties/<?php echo $faculty->image; ?> 'style'='height:150px;' /></td>
                        <td class="column-2">
                            <?php if ($userid = Session::get('user')){
                                if($userid->access_level == 'admin'){
                               echo Html::anchor('faculty/delete/'.$faculty->id, 'Delete', array('class' => 'btn btn-danger','style'=>'color:#fff;margin-top:-90px;float:right;','onclick' => "return confirm('Are you sure?')"));     
                                }
                            }?>
                            <font size="3"><span style="font-variant: small-caps;"><strong><u><?php echo Html::anchor('faculty/view/' . $faculty->id, $faculty->name); ?></u></strong></span>
                            <br />
                            <em><?php echo $faculty->designation; ?></em>
                            <br />
                            <strong>Research Interests :</strong><?php echo $faculty->research_interest; ?>
                            <br />
                            <strong>Email :</strong> <?php echo $faculty->email; ?>
                            <br />
                            <strong>Phone :</strong> <?php echo $faculty->phone; ?>
                            </font>
                        </td>
                    </tr>
        <?php endforeach;
        ?>            </tbody>
        </table>
    <?php else:
    ?>
        <p>No Faculties.</p>

<?php endif; ?>
    </div>

