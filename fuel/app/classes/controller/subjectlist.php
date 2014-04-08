<?php
class Controller_Subjectlist extends Controller_Template{

	public function action_index()
	{
		$data['subjectlists'] = Model_Subjectlist::find('all',array('order_by' => 'course_id'));
		$this->template->title = "Subjectlists";
		$this->template->content = View::forge('subjectlist/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('subjectlist');

		if ( ! $data['subjectlist'] = Model_Subjectlist::find($id))
		{
			Session::set_flash('error', 'Could not find subjectlist #'.$id);
			Response::redirect('subjectlist');
		}

		$this->template->title = "Subjectlist";
		$this->template->content = View::forge('subjectlist/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Subjectlist::validate('create');
			
			if ($val->run())
			{
				$subjectlist = Model_Subjectlist::forge(array(
					'course_id' => Input::post('course_id'),
					'course_name' => Input::post('course_name'),
				));

				if ($subjectlist and $subjectlist->save())
				{
					Session::set_flash('success', 'Added subjectlist #'.$subjectlist->id.'.');

					Response::redirect('subjectlist');
				}

				else
				{
					Session::set_flash('error', 'Could not save subjectlist.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Subjectlists";
		$this->template->content = View::forge('subjectlist/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('subjectlist');

		if ( ! $subjectlist = Model_Subjectlist::find($id))
		{
			Session::set_flash('error', 'Could not find subjectlist #'.$id);
			Response::redirect('subjectlist');
		}

		$val = Model_Subjectlist::validate('edit');

		if ($val->run())
		{
			$subjectlist->course_id = Input::post('course_id');
			$subjectlist->course_name = Input::post('course_name');

			if ($subjectlist->save())
			{
				Session::set_flash('success', 'Updated subjectlist #' . $id);

				Response::redirect('subjectlist');
			}

			else
			{
				Session::set_flash('error', 'Could not update subjectlist #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$subjectlist->course_id = $val->validated('course_id');
				$subjectlist->course_name = $val->validated('course_name');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('subjectlist', $subjectlist, false);
		}

		$this->template->title = "Subjectlists";
		$this->template->content = View::forge('subjectlist/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('subjectlist');

		if ($subjectlist = Model_Subjectlist::find($id))
		{
			$subjectlist->delete();

			Session::set_flash('success', 'Deleted subjectlist #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete subjectlist #'.$id);
		}

		Response::redirect('subjectlist');

	}


}
