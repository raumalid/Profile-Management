
<div class="view" style='font-size: 14px; line-height: 25px;'>
    <?php echo Html::anchor('faculty', '<< Back', array('class' => 'btn btn-danger', 'style' => 'color:#fff;')); ?>

    <h1 style="font-size: 20px;"><i class="icon-user" style="margin-top:6px; margin-left:10px;"></i> <?php echo $faculty->name; ?> [<?php echo $faculty->id; ?>]</h1> 


    <hr />

    <div class="main-headline">BASIC INFORMATION</div>
    <br />    
    <?php echo Html::anchor('faculty/edit/' . $faculty->id, '   Edit   ', array('class' => 'btn btn-success', 'style' => 'z-index:500; float:right;  margin-right:30px;color:#fff;')); ?>

    <br />    

    <table style='border:0px; margin-top: 10px;'>
        <tbody>

            <tr>
                <td class="column-left">
                    <strong>Name :</strong><?php echo $faculty->name; ?>
                    <br />
                    <strong>Designation :</strong><?php echo $faculty->designation; ?>
                    <br />
                    <strong>Department :</strong><?php echo $faculty->department; ?>
                    <br />
                    <strong>College :</strong> <?php echo $faculty->college; ?>
                    <br />
                    <strong>Education :</strong> <?php echo $faculty->education; ?>

                </td>
                <td class='column-right'>
                    <img src='http://localhost/profilemanagement/public/faculties/<?php echo $faculty->image; ?>' style='height:200px;'/>

                </td>
            </tr>

        </tbody>
    </table>


    <div class="main-headline">CONTACT DETAILS</div>
    <br />
    <div class="grid-12-12">
        <div class="grid-4-12">
            <strong>Phone No:</strong>
            <?php echo $faculty->phone; ?>
        </div>
        <div class="grid-4-12">
            <strong>Email:</strong>
            <?php echo $faculty->email; ?>
        </div>
    </div>
    <br />  
    <div class="main-headline">RESEARCH AND INTERESTS</div>
    <br />
    <div class="grid-12-12">
        <strong>Education:</strong>
        <?php echo $faculty->education; ?>
    </div>
    <br />
    <div class="grid-12-12">
        <strong>Research Interest:</strong>
        <?php echo $faculty->research_interest; ?>
    </div>
   

    <br />
    <div class="main-headline">COURSES TAUGHT</div>
    <br />
    <table>
        <tbody>
            <?php foreach ($subjects as $subject) { ?>

                <tr> <td><?php echo $subject->course; ?></td>
                    <td>
                        <?php
                        if ($user = Session::get('user')) {
                            if (($user->access_level == 'admin') || ($user->faculty_id == $faculty->id)) {



                                echo Html::anchor('subjects/delete/' . $subject->id, '<i class="icon-trash" title="Delete"></i>', array('onclick' => "return confirm('Are you sure?')"));
                            }
                        }
                        ?>

                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php
    if ($user = Session::get('user')) {
        if (($user->access_level == 'admin') || ($user->faculty_id == $faculty->id)) {

            echo Html::anchor('subjects/create/' . $faculty->id, '<i class="icon-plus icon-white"></i> Add New Subject', array('class' => 'btn btn-success', 'style' => "color:#fff;float:right;margin-top:-10px;"));
        }
    }
    ?>
    <br />
    <?php if ($publications) { ?>
        <div class="main-headline">PUBLICATIONS</div>
        <br />
        <table>
            <tbody>
                <?php foreach ($publications as $publication) { ?>
                    <tr><td> <?php echo $publication->description; ?> </td>
                        <?php
                        if ($user = Session::get('user')) {
                            if (($user->access_level == 'admin') || ($user->faculty_id == $faculty->id)) {
                                ?>


                                <td> <?php echo Html::anchor('subjects/delete/' . $subject->id, '<i class="icon-trash" title="Delete"></i>', array('onclick' => "return confirm('Are you sure?')")); ?></td></tr>
                                <?php
                        }
                    }
                    ?>

                <?php } ?>
            </tbody>
        </table>

        <?php
        if ($user = Session::get('user')) {
            if (($user->access_level == 'admin') || ($user->faculty_id == $faculty->id)) {
                echo Html::anchor('publication/create/' . $faculty->id, '<i class="icon-plus icon-white"></i> Add New Publication', array('class' => 'btn btn-success', 'style' => "color:#fff;float:right; margin-top:-10px;"));
            }
        }
    }
    ?>   
</div>

