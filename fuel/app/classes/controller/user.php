<?php
class Controller_User extends Controller_Base{

	public function action_index()
	{
		$data['users'] = Model_User::find('all');
		$this->template->title = "Users";
		$this->template->content = View::forge('user/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('user');

		if ( ! $data['user'] = Model_User::find($id))
		{
			Session::set_flash('error', 'Could not find user #'.$id);
			Response::redirect('user');
		}

		$this->template->title = "User";
		$this->template->content = View::forge('user/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_User::validate('create');
			
			if ($val->run())
			{
				$user = Model_User::forge(array(
					'faculty_id' => Input::post('faculty_id'),
					'username' => Input::post('username'),
					'password' => md5(Input::post('password')),
					'access_level' => Input::post('access_level'),
				));

				if ($user and $user->save())
				{
					
					Response::redirect('user');
				}

				else
				{
					Session::set_flash('error', 'Could not save user.');
                                        Response::redirect('user');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Users";
		$this->template->content = View::forge('user/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('user');

		if ( ! $user = Model_User::find($id))
		{
			Session::set_flash('error', 'Could not find user');
			Response::redirect('user');
		}

		$val = Model_User::validate('edit');

		if ($val->run())
		{
			$user->faculty_id = Input::post('faculty_id');
			$user->username = Input::post('username');
			$user->password = Input::post('password');
			$user->access_level = Input::post('access_level');

			if ($user->save())
			{
				Session::set_flash('success', 'Updated user');

				Response::redirect('user');
			}

			else
			{
				Session::set_flash('error', 'Could not update user');
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$user->faculty_id = $val->validated('faculty_id');
				$user->username = $val->validated('username');
				$user->password = $val->validated('password');
				$user->access_level = $val->validated('access_level');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('user', $user, false);
		}

		$this->template->title = "Users";
		$this->template->content = View::forge('user/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('user');

		if ($user = Model_User::find($id))
		{
			$user->delete();

			Session::set_flash('success', 'Deleted user #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete user #'.$id);
		}

		Response::redirect('user');

	}
            public function action_password() {

        // parent::has_access("add_user");
        $u = Session::get('user');
        is_null($u) and Response::redirect('deparment');

        if (!$user = Model_User::find($u->id)) {
            Session::set_flash('error', 'User does not exist #' . $u->id);
            Response::redirect('department');
        }

        if (Input::method() == 'POST') {

            if ($user->password != md5(Input::post('old_password'))) {
                Session::set_flash('error', 'Old password does not match');
                Response::redirect('user/password');
            }
            else{
                if(Input::post('password') != Input::post('confirmpassword')){
                    Session::set_flash('error','Confirm Password');
                    Response::redirect('user/password');
                }else
                $user->password = md5(Input::post('password'));
            }
            if ($user->save()) {
                Session::set_flash('success', 'Password updated successfully');

                Response::redirect('department');
            } 
        }

        $this->template->title = "Change Password";
        $this->template->content = View::forge('user/password');
    }


}
