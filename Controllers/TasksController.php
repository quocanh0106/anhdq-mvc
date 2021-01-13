<?php
namespace mvc\Controllers;

use mvc\Core\Controller;
use mvc\Models\TaskModel;
use mvc\Models\TaskRepository;

class TasksController extends Controller
{

    protected $taskRepository;

    public function __construct()
    {
        $this->taskRepository = new TaskRepository;
    }

    function index()
    {
        $tasks = new TaskModel;

        $d['tasks'] = $this->taskRepository->getAll($tasks);
        $this->set($d);
        $this->render("index");
    }


    function create()
    {
        extract($_POST);

        if (isset($title) && isset($description) && !empty($title) && !empty($description))
        {
            $task = new TaskModel;
            $task->title = $title;
            $task->description =$description;

            if ($this->taskRepository->add($task))
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }

        $this->render("create");
    }

    /* hàm Sửa task với id */
    function edit($id)
    {
        extract($_POST);

        $task = new TaskModel;
        $d["task"] = $this->taskRepository->get($id);

        if (isset($title) && isset($description) && !empty($title) && !empty($description))
        {
            $task->id = $id;
            $task->title = $title;
            $task->description =$description;

            if ($this->taskRepository->edit($task))
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }
        $this->set($d);
        $this->render("edit");

    }


    function delete($id)
    {

        $tasks = new TaskModel;
        $tasks->id = $id;
        if ($this->taskRepository->delete($tasks))
        {
            header("Location: " . WEBROOT . "tasks/index");
        }
    }
}
?>