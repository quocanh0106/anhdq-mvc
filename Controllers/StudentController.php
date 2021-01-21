<?php


namespace mvc\Controllers;

use mvc\Core\Controller;
use mvc\Models\Student\StudentModel;
use mvc\Models\Student\StudentRepository;

class StudentController extends Controller
{
    protected $studentRepository;

    public function __construct()
    {
        $this->studentRepository = new StudentRepository();

    }

    function index()
    {
        $students = new StudentModel;

        $d['students'] = $this->studentRepository->getAll($students);
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        extract($_POST);

        if (isset($name) && isset($age) && !empty($name) && !empty($age))
        {
            $student = new StudentModel;
            $student->setName($name) ;
            $student->setAge($age);

            if ($this->studentRepository->add($student))
            {
                header("Location: " . WEBROOT . "student/index");
            }
        }
        $this->render('create');
    }

    /* update student */
    function edit($id)
    {
        extract($_POST);

        $student = new StudentModel;
        $d["student"] = $this->studentRepository->get($id);

        if (isset($name) && isset($age) && !empty($name) && !empty($age))
        {
            $student->setId($id);
            $student->setName($name) ;
            $student->setAge($age);

            if ($this->studentRepository->edit($student))
            {
                header("Location: " . WEBROOT . "student/index");
            }
        }
        $this->set($d);
        $this->render("edit");

    }

    /* delete student */

    function delete($id)
    {

        $student = new StudentModel;
        $student->setId($id);
        if ($this->studentRepository->delete($student))
        {
            header("Location: " . WEBROOT . "student/index");
        }
    }



}