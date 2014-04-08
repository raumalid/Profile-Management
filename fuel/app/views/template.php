<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo $title; ?></title>
        <?php echo Asset::css('bootstrap.css'); ?>
        <?php echo Asset::css('bootstrap.css'); ?>
        <?php echo Asset::css('formee-structure.css'); ?>
        <?php echo Asset::css('formee-style.css'); ?>
        <?php echo Asset::css('menu.css'); ?>
        <?php echo Asset::css('reset.css'); ?>
        <?php echo Asset::css('template.css'); ?>

        <?php echo Asset::js('formee.js'); ?>
        <?php echo Asset::js('jquery-1.6.4.min.js'); ?>
        <style>
            body { margin: 40px; }
        </style>
    </head>
    <body>
        <script>


            function validatePassword() {
                var validator = $("#loginForm").validate({
                    rules: {
                        password: "required",
                        confirmpassword: {
                            equalTo: "#password"
                        }
                    },
                    messages: {
                        password: " Enter Password",
                        confirmpassword: " <span style='color:#f00;'><em>Enter Confirm Password same as Password</em></span>"
                    }
                });

            }

        </script>

        <div id="header">
            <h1>NIT Durgapur Profile Management System</h1>
            <div class="page-full-width cf">

                <ul id="header-nav">
                    <li class="v-sep">
                        <?php
                        if ($user = Session::get('user')) {
                            ?><a href="#" class="round-button dark" style="color:#fff;"><i class="icon-user icon-white"></i> Logged in as <strong><?php echo $user->username; ?></strong></a>
                            <?php if ($user->access_level == 'admin') { ?>
                                <ul>

                                    <li><?php echo Html::anchor('contact', 'Messages', array('class' => 'header-nav-child')); ?></li>
                                    <li><?php echo Html::anchor('user', 'Users list', array('class' => 'header-nav-child')); ?></li>
                                    <li><?php echo Html::anchor('subjectlist', 'Subjects list', array('class' => 'header-nav-child')); ?></li>
                                    <li><?php echo Html::anchor('user/password', 'Change Password', array('class' => 'header-nav-child')); ?></li>
                                </ul>
                            <?php } else if ($user->access_level = 'faculty') { ?>
                                <ul>
                                    <li><?php echo Html::anchor('user/password', 'Change Password', array('class' => 'header-nav-child')); ?></li>
                                </ul>
                            <?php } ?>
                        </li>
                        <li><?php echo Html::anchor('login/logout', '<i class="icon-off icon-white"></i>LOGOUT', array('class' => 'round-button dark', 'style' => 'color:#fff; width:80px;')); ?> </li>


                        <?php } else {
                        ?>  

                        <li class="v-sep"><?php echo Html::anchor('login/login', '<i class="icon-user icon-white"></i>LOGIN', array('class' => 'round-button dark', 'style' => 'color:#fff; width:110px; margin-left:160px;')); ?> </li>
                    <?php } ?>

                </ul>
            </div>

        </div>
        <?php

        function createYears($start_year, $end_year, $id = 'year_select', $selected = null) {


            $selected = is_null($selected) ? date('Y') : $selected;


            $r = range($start_year, $end_year);


            $select = '<select name="' . $id . '" id="' . $id . '">';
            foreach ($r as $year) {
                $select .= "<option value=\"$year\"";
                $select .= ($year == $selected) ? ' selected="selected"' : '';
                $select .= ">$year</option>\n";
            }
            $select .= '</select>';
            return $select;
        }

        function createMonths($id = 'month_select', $selected = null) {

            $months = array(
                1 => 'January',
                2 => 'February',
                3 => 'March',
                4 => 'April',
                5 => 'May',
                6 => 'June',
                7 => 'July',
                8 => 'August',
                9 => 'September',
                10 => 'October',
                11 => 'November',
                12 => 'December');


            $selected = is_null($selected) ? date('M') : $selected;

            $select = '<select name="' . $id . '" id="' . $id . '">' . "\n";
            foreach ($months as $key => $mon) {
                $select .= "<option value=\"$key\"";
                $select .= ($key == $selected) ? ' selected="selected"' : '';
                $select .= ">$mon</option>\n";
            }
            $select .= '</select>';
            return $select;
        }

        function createDays($id = 'day_select', $selected = null) {
            /*             * * range of days ** */
            $r = range(0, 31);

            /*             * * current day ** */
            $selected = is_null($selected) ? date('d') : $selected;

            $select = "<select name=\"$id\" id=\"$id\">\n";
            foreach ($r as $day) {
                $select .= "<option value=\"$day\"";
                $select .= ($day == $selected) ? ' selected="selected"' : '';
                $select .= ">$day</option>\n";
            }
            $select .= '</select>';
            return $select;
        }
        ?>


        <?php if (Session::get_flash('success')): ?>
            <div class="alert alert-success" style="z-index:500; margin-left: 500px; margin-top: 50px; position:fixed;">
                <strong>Success</strong>
                <p>
                    <?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
                </p>
            </div>
        <?php endif; ?>
        <?php if (Session::get_flash('error')): ?>
            <div class="alert alert-error" style="z-index:500; margin-left: 500px;margin-top:50px; position:fixed;">
                <strong>Error</strong>
                <p>
                    <?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
                </p>
            </div>
        <?php endif; ?>

        <div style="position:fixed; z-index: 20; background-color: #fff;">
             <a href="#" class='nav-logo'><?php echo Asset::img('header.png'); ?></a>
            <div class="left-sidebar">
               
                <div style="width:230px; margin-left:-40px;">
                    <ul class="menu">
                        <li class="item1"><?php echo Html::anchor('department/', 'Home'); ?></li>
                        <li class="item2"><?php echo Html::anchor('faculty/', 'Faculty'); ?></li>
                        <li class="item1"><?php echo Html::anchor('student/batch', 'Student'); ?></li>
                        <li class="item2"><?php echo Html::anchor('contact/create', 'Contact'); ?></li>

                    </ul>
                </div>
            </div>

            <div id="border"></div></div>

        <div id="container">
            <?php echo $content; ?>
        </div>
    </body>
</html>
