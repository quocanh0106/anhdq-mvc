<?php


namespace mvc\Models\Student;


use mvc\Core\ResourceModel;
use mvc\Models\Student\StudentModel;

class StudentResourceModel extends ResourceModel
{
    public function __construct()
    {
        parent::_init('students', 'id', new StudentModel);
    }

}