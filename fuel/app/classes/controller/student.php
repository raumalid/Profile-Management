<?php

class Controller_Student extends Controller_Base {

    public function action_index($id = null) {
        $data['students'] = Model_Student::find('all', array('where' => array('year' => $id)));
        $this->template->title = "Students";
        $this->template->content = View::forge('student/index', $data);
    }

    public function action_view($id = null) {

        is_null($id) and Response::redirect('student');

        if (!$data['student'] = Model_Student::find($id)) {
            Session::set_flash('error', 'Could not find student #' . $id);
            Response::redirect('student');
        }

        $this->template->title = "Student";
        $this->template->content = View::forge('student/view', $data);
    }

    public function action_create() {
        parent::has_access("create_student");
        if (Input::method() == 'POST') {
            $val = Model_Student::validate('create');

            if ($val->run()) {
                $config = array(
                    'path' => DOCROOT . DS . 'students'
                );
                Upload::process($config);
                if (Upload::is_valid()) {
                    Upload::save();
                    $file = Upload::get_files(0);

                    $student = Model_Student::forge(array(
                                'id' => Input::post('registration_no'),
                                'roll_no' => Input::post('roll_no'),
                                'name' => Input::post('name'),
                                //'department' => 'Computer Science and Engineering',
                                'contact' => Input::post('contact'),
                                'email' => Input::post('email'),
                                'cgpa' => Input::post('cgpa'),
                                'image' => $file['name'],
                                'year' => Input::post('year'),
                    ));

                    if ($student and $student->save()) {

                        Response::redirect('student/index/'.$student->year);
                    } else {
                        Session::set_flash('error', 'Could not save student.');
                    }
                }
            } else {
                Session::set_flash('error', $val->error());
            }
        }

        $this->template->title = "Students";
        $this->template->content = View::forge('student/create');
    }

    public function action_edit($id = null) {
       parent::has_access("edit_student");
        is_null($id) and Response::redirect('student');

        if (!$student = Model_Student::find($id)) {
            Session::set_flash('error', 'Could not find student #' . $id);
            Response::redirect('student');
        }

        $val = Model_Student::validate('edit');

        if ($val->run()) {
           
            //$student->registration_no = Input::post('registration_no');
            $student->roll_no = Input::post('roll_no');
            $student->name = Input::post('name');
          //  $student->department = Input::post('department');
            $student->contact = Input::post('contact');
            $student->email = Input::post('email');
            $student->cgpa = Input::post('cgpa');
            //$student->image = $file['name'];

            if ($student->save()) {
                Session::set_flash('success', 'Updated student #' . $id);

                Response::redirect('student/index/'.$student->year);
            } else {
                Session::set_flash('error', 'Could not update student #' . $id);
                }
        } else {
            if (Input::method() == 'POST') {
              //  $student->registration_no = $val->validated('registration_no');
                $student->roll_no = $val->validated('roll_no');
                $student->name = $val->validated('name');
            //    $student->department = $val->validated('department');
                $student->contact = $val->validated('contact');
                $student->email = $val->validated('email');
                $student->cgpa = $val->validated('cgpa');

                Session::set_flash('error', $val->error());
            }

            $this->template->set_global('student', $student, false);
        }

        $this->template->title = "Students";
        $this->template->content = View::forge('student/edit');
    }

    public function action_delete($id = null) {
        parent::has_access("delete_student");
        is_null($id) and Response::redirect('student');

            

            Session::set_flash('success', 'Deleted student #' . $id);
        } else {
            Session::set_flash('error', 'Could not delete student #' . $id);
        }

        Response::redirect(this);
    }

}
