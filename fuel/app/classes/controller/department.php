<?php
class Controller_Department extends Controller_Base{

	public function action_index()
	{
		$data['departments'] = Model_Department::find('all');
		$this->template->title = "Departments";
		$this->template->content = View::forge('department/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('department');

		if ( ! $data['department'] = Model_Department::find($id))
		{
			Session::set_flash('error', 'Could not find department #'.$id);
			Response::redirect('department');
		}

		$this->template->title = "Department";
		$this->template->content = View::forge('department/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Department::validate('create');
			
			if ($val->run())
			{
				$department = Model_Department::forge(array(
					'department_id' => Input::post('department_id'),
					'department_name' => Input::post('department_name'),
					'description' => Input::post('description'),
				));

				if ($department and $department->save())
				{
					Session::set_flash('success', 'Added department #'.$department->id.'.');

					Response::redirect('department');
				}

				else
				{
					Session::set_flash('error', 'Could not save department.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Departments";
		$this->template->content = View::forge('department/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('department');

		if ( ! $department = Model_Department::find($id))
		{
			Session::set_flash('error', 'Could not find department #'.$id);
			Response::redirect('department');
		}

		$val = Model_Department::validate('edit');

		if ($val->run())
		{
			$department->department_id = Input::post('department_id');
			$department->department_name = Input::post('department_name');
			$department->description = Input::post('description');

			if ($department->save())
			{
				Session::set_flash('success', 'Updated department #' . $id);

				Response::redirect('department');
			}

			else
			{
				Session::set_flash('error', 'Could not update department #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$department->department_id = $val->validated('department_id');
				$department->department_name = $val->validated('department_name');
				$department->description = $val->validated('description');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('department', $department, false);
		}

		$this->template->title = "Departments";
		$this->template->content = View::forge('department/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('department');

		if ($department = Model_Department::find($id))
		{
			$department->delete();

			Session::set_flash('success', 'Deleted department #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete department #'.$id);
		}

		Response::redirect('department');

	}


}
