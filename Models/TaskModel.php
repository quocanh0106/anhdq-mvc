<?php


namespace mvc\Models;

use mvc\Core\Model;

class TaskModel extends Model
{

    public $id;
    public $title;
    public $description;

    public function setId($id)
    {
        $this->id = $id;

    }

    public function getId(){

        return $this->id;
    }

    public function setTitle($title)
    {
        $this->title = $title;

    }

    public function getTitle(){

        return $this->title;
    }

    public function setDescription($description)
    {
        $this->description = $description;

    }

    public function getDescription(){

        return $this->description;
    }

}