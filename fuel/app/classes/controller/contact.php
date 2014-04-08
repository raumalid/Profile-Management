<?php
class Controller_Contact extends Controller_Template{

	public function action_index()
	{
		$data['contacts'] = Model_Contact::find('all');
		$this->template->title = "Contacts";
		$this->template->content = View::forge('contact/index', $data);

	}

	public function action_view()
	{
		

		$this->template->title = "Contact";
		$this->template->content = View::forge('contact/view');

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Contact::validate('create');
			
			if ($val->run())
			{
				$contact = Model_Contact::forge(array(
					'name' => Input::post('name'),
					'email' => Input::post('email'),
					'phone_no' => Input::post('phone_no'),
					'description' => Input::post('description'),
				));

				if ($contact and $contact->save())
				{
					Session::set_flash('success', 'Your response has been saved');

					Response::redirect('contact/view');
				}

				else
				{
					Session::set_flash('error', 'Could not save contact.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Contacts";
		$this->template->content = View::forge('contact/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('contact');

		if ( ! $contact = Model_Contact::find($id))
		{
			Session::set_flash('error', 'Could not find contact #'.$id);
			Response::redirect('contact');
		}

		$val = Model_Contact::validate('edit');

		if ($val->run())
		{
			$contact->name = Input::post('name');
			$contact->email = Input::post('email');
			$contact->phone_no = Input::post('phone_no');
			$contact->description = Input::post('description');

			if ($contact->save())
			{
	
				Response::redirect('contact');
			}

			else
			{
				Session::set_flash('error', 'Could not update contact #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$contact->name = $val->validated('name');
				$contact->email = $val->validated('email');
				$contact->phone_no = $val->validated('phone_no');
				$contact->description = $val->validated('description');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('contact', $contact, false);
		}

		$this->template->title = "Contacts";
		$this->template->content = View::forge('contact/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('contact');

		if ($contact = Model_Contact::find($id))
		{
			$contact->delete();

		}

		else
		{
		}

		Response::redirect('contact');

	}


}
