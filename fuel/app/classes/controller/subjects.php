<?php
class Controller_Subjects extends Controller_Base{

	public function action_index()
	{
		$data['subjects'] = Model_Subject::find('all');
		$this->template->title = "Subjects";
		$this->template->content = View::forge('subjects/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('subjects');

		if ( ! $data['subject'] = Model_Subject::find($id))
		{
			Session::set_flash('error', 'Could not find subject #'.$id);
		//	Response::redirect('subjects');
		}

		$this->template->title = "Subject";
		$this->template->content = View::forge('subjects/view', $data);

	}

	public function action_create($id = null)
	{
            is_null($id) and Response::redirect('faculty');
            $data['id'] = $id;
            $data['subjectlists'] = Model_Subjectlist::find('all',array('order_by'=>'course_id'));
		if (Input::method() == 'POST')
		{
			$val = Model_Subject::validate('create');
			
			if ($val->run())
			{
				$subject = Model_Subject::forge(array(
					'faculty_id' =>$id,
					
					'course' => Input::post('course'),
				));

				if ($subject and $subject->save())
				{
					Session::set_flash('success', 'Subject saved');

					//Response::redirect('faculty');
				}

				else
				{
					Session::set_flash('error', 'Could not save subject.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}
// print_r($data);
		$this->template->title = "Subjects taught";
		$this->template->content = View::forge('subjects/create', $data);

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('subjects');

		if ( ! $subject = Model_Subject::find($id))
		{
			Session::set_flash('error', 'Could not find subject #'.$id);
			Response::redirect('subjects');
		}

		$val = Model_Subject::validate('edit');

		if ($val->run())
		{
			$subject->faculty__id = Input::post('faculty__id');
			$subject->course_id = Input::post('course_id');
			$subject->course_name = Input::post('course_name');

			if ($subject->save())
			{
				Session::set_flash('success', 'Updated subject #' . $id);

				Response::redirect('subjects');
			}

			else
			{
				Session::set_flash('error', 'Could not update subject #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$subject->faculty__id = $val->validated('faculty__id');
				$subject->course_id = $val->validated('course_id');
				$subject->course_name = $val->validated('course_name');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('subject', $subject, false);
		}

		$this->template->title = "Subjects";
		$this->template->content = View::forge('subjects/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('subjects');

		if ($subject = Model_Subject::find($id))
		{
			$subject->delete();

			Session::set_flash('success', 'Deleted subject');
		}

		else
		{
			Session::set_flash('error', 'Could not delete subject');
		}

		Response::redirect('faculty/view/'.$subject->faculty_id);

	}


}
