<?php

class Controller_Student_Batch extends Controller_Template {

    public function action_index() {
        $data['student_batches'] = Model_Student_Batch::find('all', array('order_by' => array('start_year' => 'desc')));
        $this->template->title = "Student_batches";
        $this->template->content = View::forge('student/batch/index', $data);
    }

    public function action_view($id = null) {
        is_null($id) and Response::redirect('student/batch');

        if (!$data['student_batch'] = Model_Student_Batch::find($id)) {
            Session::set_flash('error', 'Could not find student_batch #' . $id);
            Response::redirect('student/batch');
        }

        $this->template->title = "Student_batch";
        $this->template->content = View::forge('student/batch/view', $data);
    }

    public function action_create() {
        if (Input::method() == 'POST') {
            $val = Model_Student_Batch::validate('create');

            if ($val->run()) {
                $student_batch = Model_Student_Batch::forge(array(
                            'start_year' => Input::post('start_year'),
                            'end_year' => Input::post('end_year'),
                ));

                if ($student_batch and $student_batch->save()) {
                    Session::set_flash('success', 'Added student_batch #' . $student_batch->id . '.');

                    Response::redirect('student/batch');
                } else {
                    Session::set_flash('error', 'Could not save student_batch.');
                }
            } else {
                Session::set_flash('error', $val->error());
            }
        }

        $this->template->title = "Student_Batches";
        $this->template->content = View::forge('student/batch/create');
    }

    public function action_edit($id = null) {
        is_null($id) and Response::redirect('student/batch');

        if (!$student_batch = Model_Student_Batch::find($id)) {
            Session::set_flash('error', 'Could not find student_batch #' . $id);
            Response::redirect('student/batch');
        }

        $val = Model_Student_Batch::validate('edit');

        if ($val->run()) {
            $student_batch->start_year = Input::post('start_year');
            $student_batch->end_year = Input::post('end_year');

            if ($student_batch->save()) {
                Session::set_flash('success', 'Updated student_batch #' . $id);

                Response::redirect('student/batch');
            } else {
                Session::set_flash('error', 'Could not update student_batch #' . $id);
            }
        } else {
            if (Input::method() == 'POST') {
                $student_batch->start_year = $val->validated('start_year');
                $student_batch->end_year = $val->validated('end_year');

                Session::set_flash('error', $val->error());
            }

            $this->template->set_global('student_batch', $student_batch, false);
        }

        $this->template->title = "Student_batches";
        $this->template->content = View::forge('student/batch/edit');
    }

    public function action_delete($id = null) {
        is_null($id) and Response::redirect('student/batch');

        if ($student_batch = Model_Student_Batch::find($id)) {
            if ($student = Model_Student::find('all', array('where' => array('year' => '$student_batch->end_year')))) {
                
                    if ($student->image)
                        File::delete(DOCROOT . '/students/' . $student->image);
                    $student->delete();
                }
            
            $student_batch->delete();


            Session::set_flash('success', 'Deleted student_batch #' . $id);
        }

        else {
            Session::set_flash('error', 'Could not delete student_batch #' . $id);
        }

        Response::redirect('student/batch');
    }

}
