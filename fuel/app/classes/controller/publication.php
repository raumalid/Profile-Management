<?php
class Controller_Publication extends Controller_Base{

	public function action_index()
	{
		$data['publications'] = Model_Publication::find('all');
		$this->template->title = "Publications";
		$this->template->content = View::forge('publication/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('publication');

		if ( ! $data['publications'] = Model_Publication::find('all',array('where' => array('id' => $id))))
		{
			Session::set_flash('error', 'Could not find publication #'.$id);
			Response::redirect('publication');
		}
                //print_r($data);
		$this->template->title = "Publication";
                $this->template->content = View::forge('publication/view', $data);

	}

	public function action_create($id = null)
	{
         //   parent::has_access("create_publication");
		if (Input::method() == 'POST')
		{
			$val = Model_Publication::validate('create');
			
			if ($val->run())
			{
				$publication = Model_Publication::forge(array(
					'faculty_id' => $id,
					'description' => Input::post('description'),
				));

				if ($publication and $publication->save())
				{
				
					Response::redirect('faculty/view/'.$id);
				}

				else
				{
					Session::set_flash('error', 'Could not save publication.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Publications";
		$this->template->content = View::forge('publication/create');

	}

	public function action_edit($id = null)
	{
            parent::has_access("edit_publication");
		is_null($id) and Response::redirect('faculty/view' .$id);

		if ( ! $publication = Model_Publication::find('first', array('where' => array('id' => $id))))
		{
			Session::set_flash('error', 'Could not find user #'.$id);
			Response::redirect('faculty/view/'.$id);
		}

		$val = Model_Publication::validate('edit');

		if ($val->run())
		{
			$publication->id = Input::post('id');
			$publication->description = Input::post('description');

			if ($publication->save())
			{
				Session::set_flash('success', 'Updated publication #' . $id);

				Response::redirect('faculty/view'.$id);
			}

			else
			{
				Session::set_flash('error', 'Could not update publication #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$publication->id = $val->validated('id');
				$publication->description = $val->validated('description');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('publication', $publication, false);
		}

		$this->template->title = "Publications";
		$this->template->content = View::forge('publication/edit');

	}

	public function action_delete($id = null)
	{
            parent::has_access("delete_publication");
		is_null($id) and Response::redirect('publication');

		if ($publication = Model_Publication::find($id))
		{
			$publication->delete();

			Session::set_flash('success', 'Deleted publication #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete publication #'.$id);
		}

		Response::redirect('publication');

	}


}
