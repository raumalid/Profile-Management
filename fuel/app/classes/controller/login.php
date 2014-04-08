<?php

class Controller_Login extends Controller_Base {

    public function action_index() {

        $this->template->title = 'Profile Management  &raquo; Login';
        Response::redirect('login/login');
    }

    public function action_signup() {
        if (Input::method() == 'POST') {
            $id = Input::post('faculty_id');
            if (!$faculty = Model_Faculty::find($id)) {
                Session::set_flash('error', 'You are not authorised to signup. Please contact System Administrator');
                Response::redirect('login/login');
            } else if ($user_id = Model_User::find($id)) {
                Session::set_flash('error', 'Account exists');
                Response::redirect('login/login');
            } else {
                $val = Model_User::validate('signup');
                if ($val->run()) {
                    $user = Model_User::forge(array(
                                'faculty_id' => $id,
                                'username' => Input::post('username'),
                                'password' => md5(Input::post('password')),
                                'access_level' => 'faculty',
                    ));
                    if ($user and $user->save()) {
                        Session::set_flash('success', 'Account created');
                        Response::redirect('login/login');
                    } else {
                        Session::set_flash('error', 'Could not create account');
                    }
                } else {
                    Session::set_flash('error', $val->error());
                }
            }
        }$this->template->title = 'Signup';
        $this->template->content = View::forge('login/signup');
        
            }

    public function action_login() {
        $this->template->title = 'Profile Management &raquo; Login';
        if (Session::get('user') == NULL)
            return Response::forge(View::forge('login/login'));
        else
            Response::redirect('/');
    }

    public function action_verify() {
        $this->template->title = 'Profile Management &raquo; Verify';
        if (!Input::post()) {
            Response::redirect('login/login');
        }
        $username = Input::post('username');
        $password = Input::post('password');
        $user = Model_User::find('first', array(
                    'where' => array(
                        array('username', $username),
                        array('password', md5($password)),
                    ),
        ));

        if (!$user) {
            Session::set_flash('error', 'Invalid username or password');
            return Response::forge(View::forge('login/login'));
        } else {
            $data['user'] = $user;
            View::set_global('current_user', $user);
            Session::set_flash('Success', 'Login Successful');

            $data["subnav"] = array('index' => 'active');

            parent::do_login($user);
            Response::redirect('/');
        }
    }

    public function action_logout() {
        $this->template->title = 'Profile Management &raquo; Login';
        if (Session::get('user') !== NULL) {
            parent::logout_user();
            Session::set_flash('success', 'You have successfully logged out!');
            $this->template->content = View::forge('login/logout');
            Response::redirect('login/login');
        } else {
            Response::redirect('login/login');
        }
    }

}