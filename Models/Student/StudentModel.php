<?php


namespace mvc\Models\Student;

use mvc\Core\Model;

class StudentModel extends Model
{

    protected $id;
    protected $name;
    protected $age;

    public function setId($id)
    {
        $this->id = $id;

    }

    public function getId(){

        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;

    }

    public function getName(){

        return $this->name;
    }

    public function setAge($age)
    {
        $this->age = $age;

    }

    public function getDescription(){

        return $this->age;
    }

}