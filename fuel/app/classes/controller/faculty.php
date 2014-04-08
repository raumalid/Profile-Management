<?php

class Controller_Faculty extends Controller_Base {

    public function action_index() {
        $data['faculties'] = Model_Faculty::find('all');
        $this->template->title = "Faculties";
        $this->template->content = View::forge('faculty/index', $data);
    }

    public function action_view($id = null) {

        is_null($id) and Response::redirect('faculty');
        $data['faculty'] = Model_Faculty::find('all', array('where' => array('id' => $id)));
        $data['publications'] = Model_Publication::find('all', array('where' => array('faculty_id' => $id)));
        $data['subjects'] = Model_Subject::find('all', array('where' => array('faculty_id' => $id)));
        if (!$data['faculty'] = Model_Faculty::find($id)) {
            Session::set_flash('error', 'Could not find faculty #' . $id);
            Response::redirect('faculty');
        }
       
        $this->template->title = "Faculty";
        $this->template->content = View::forge('faculty/view', $data);
    }

    public function action_create() {
        parent::has_access("create_faculty");

        if (Input::method() == 'POST') {
            $val = Model_Faculty::validate('create');

            if ($val->run()) {
                $config = array(
                    'path' => DOCROOT . DS . 'faculties'
                );
                Upload::process($config);
                if (Upload::is_valid()) {
                    Upload::save();
                    $file = Upload::get_files(0);

                    $faculty = Model_Faculty::forge(array(
                 //               'id' => Input::post('id'),
                        'title'=>Input::post('title'),
                                'name' => Input::post('name'),
                                'designation' => Input::post('designation'),
                                'department' => Input::post('department'),
                                'college' => Input::post('college'),
                                'phone' => Input::post('phone'),
                                'email' => Input::post('email'),
                                'education' => Input::post('education'),
                                'research_interest' => Input::post('education'),
                                'image' => $file['name'],
                    ));

                    if ($faculty and $faculty->save()) {

                        Response::redirect('subjects/create/' . $faculty->id);
                    } else {
                        Session::set_flash('error', 'Could not save faculty');
                    }
                }else{
                    
                }
            } else {
                Session::set_flash('error', $val->error());
            }
        }
        $this->template->title = 'Create Faculty';
        $this->template->content = View::forge('faculty/create');
    }

    public function action_edit($id = null) {
        parent::has_access("edit_faculty");
        is_null($id) and Response::redirect('faculty');

        if (!$faculty = Model_Faculty::find($id)) {
            Session::set_flash('error', 'Could not find faculty #' . $id);
            Response::redirect('faculty');
        }

        $val = Model_Faculty::validate('edit');

        if ($val->run()) {
          //  $config = array(
            //    'path' => DOCROOT . DS . 'faculties'
            //);
            //Upload::process($config);
           // if (Upload::is_valid()) {
             //   Upload::save();
               // $file = Upload::get_files(0);

               // $faculty->id = Input::post('id');
                $faculty->title = Input::post('title');
                $faculty->name = Input::post('name');
                $faculty->designation = Input::post('designation');
                $faculty->department = Input::post('department');
                $faculty->college = Input::post('college');
                $faculty->phone = Input::post('phone');
                $faculty->email = Input::post('email');
                $faculty->education = Input::post('education');
                $faculty->research_interest = Input::post('research_interest');
                //$faculty->image = $file['name'];

                if ($faculty->save()) {
                    Session::set_flash('success', 'Updated faculty #' . $id);

                    Response::redirect('faculty');
                } else {
                    Session::set_flash('error', 'Could not update faculty #' . $id);
                }
            }else {
            if (Input::method() == 'POST') {
                $faculty->id = $val->validated('id');
                $faculty->name = $val->validated('name');
                $faculty->designation = $val->validated('designation');
                $faculty->department = $val->validated('department');
                $faculty->college = $val->validated('college');
                $faculty->phone = $val->validated('phone');
                $faculty->email = $val->validated('email');
                $faculty->education = $val->validated('education');
                $faculty->research_interest = $val->validated('research_interest');
                // $faculty->image = $val->validated('image');

                Session::set_flash('error', $val->error());
            }

            $this->template->set_global('faculty', $faculty, false);
        }

        $this->template->title = "Faculties";
        $this->template->content = View::forge('faculty/edit');
    }

    public function action_delete($id = null) {
        parent::has_access("delete_faculty");
        is_null($id) and Response::redirect('faculty');

        if ($faculty = Model_Faculty::find($id)) {
            if($faculty->image)
            File::delete(DOCROOT.'/faculties/'.$faculty->image);
            if($user = Model_User::find('all',array('where'=>array('faculty_id' => $faculty->id)))){
                $user->delete();
            }

            $faculty->delete();
            
            Session::set_flash('success', 'Deleted faculty #' . $id);
        } else {
            Session::set_flash('error', 'Could not delete faculty #' . $id);
        }

        Response::redirect('faculty');
    }

}
