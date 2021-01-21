<?php
namespace mvc\Models\Student;

use mvc\Models\Student\StudentResourceModel;

class StudentRepository
{
    protected $studentResource;

    public function __construct()
    {
        $this->studentResource = new StudentResourceModel();
    }
    public function getAll($model)
    {
        return $this->studentResource->index($model);
    }

    public function add($model){
        return $this->studentResource->save($model);
    }

    public function get($id){
        return $this->studentResource->getId($id);
    }

    public function edit($model){
        return $this->studentResource->save($model);
    }

    public function delete($model)
    {
        return $this->studentResource->delete($model);

    }


}

?>