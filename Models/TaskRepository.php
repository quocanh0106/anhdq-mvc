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
    public function getAll($model)
    {
        return $this->taskResource->index($model);
    }

    public function add($model){
        return $this->taskResource->save($model);
    }

    public function get($id){
        return $this->taskResource->getId($id);
    }

    public function edit($model){
        return $this->taskResource->save($model);
    }

    public function delete($model)
    {
        return $this->taskResource->delete($model);

    }


}

?>