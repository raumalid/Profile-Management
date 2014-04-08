<?php
class Controller_Access_Rights extends Controller_Template{

	public function action_index()
	{
		$data['access_rights'] = Model_Access_Right::find('all');
		$this->template->title = "Access_rights";
		$this->template->content = View::forge('access/rights/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('access/rights');

		if ( ! $data['access_right'] = Model_Access_Right::find($id))
		{
			Session::set_flash('error', 'Could not find access_right #'.$id);
			Response::redirect('access/rights');
		}

		$this->template->title = "Access_right";
		$this->template->content = View::forge('access/rights/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Access_Right::validate('create');
			
			if ($val->run())
			{
				$access_right = Model_Access_Right::forge(array(
					'page' => Input::post('page'),
					'admin' => Input::post('admin'),
					'faculty' => Input::post('faculty'),
					'user' => Input::post('user'),
				));

				if ($access_right and $access_right->save())
				{
					Session::set_flash('success', 'Added access_right #'.$access_right->id.'.');

					Response::redirect('access/rights');
				}

				else
				{
					Session::set_flash('error', 'Could not save access_right.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Access_Rights";
		$this->template->content = View::forge('access/rights/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('access/rights');

		if ( ! $access_right = Model_Access_Right::find($id))
		{
			Session::set_flash('error', 'Could not find access_right #'.$id);
			Response::redirect('access/rights');
		}

		$val = Model_Access_Right::validate('edit');

		if ($val->run())
		{
			$access_right->page = Input::post('page');
			$access_right->admin = Input::post('admin');
			$access_right->faculty = Input::post('faculty');
			$access_right->user = Input::post('user');

			if ($access_right->save())
			{
				Session::set_flash('success', 'Updated access_right #' . $id);

				Response::redirect('access/rights');
			}

			else
			{
				Session::set_flash('error', 'Could not update access_right #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$access_right->page = $val->validated('page');
				$access_right->admin = $val->validated('admin');
				$access_right->faculty = $val->validated('faculty');
				$access_right->user = $val->validated('user');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('access_right', $access_right, false);
		}

		$this->template->title = "Access_rights";
		$this->template->content = View::forge('access/rights/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('access/rights');

		if ($access_right = Model_Access_Right::find($id))
		{
			$access_right->delete();

			Session::set_flash('success', 'Deleted access_right #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete access_right #'.$id);
		}

		Response::redirect('access/rights');

	}


}
