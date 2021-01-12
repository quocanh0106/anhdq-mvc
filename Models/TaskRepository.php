<?php
namespace mvc\Models;

use mvc\Models\TaskResourceModel;

class TaskRepository
{
    protected $taskResource;

    public function __construct()
    {
        $this->taskResource = new TaskResourceModel();
    }


    public function add($model)
    {



    }

    public function get($id)
    {

    }

    public function delete($model)
    {

    }

    public function getAll($model)
    {
        return $this->taskResource->all($model);
    }
}

?>