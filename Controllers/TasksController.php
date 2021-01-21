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

    /* show list task */

    function index()
    {
        $tasks = new TaskModel;

        $d['tasks'] = $this->taskRepository->getAll($tasks);
        $this->set($d);
        $this->render("index");
    }

    /* add new task */

    function create()
    {
        extract($_POST);

        if (isset($title) && isset($description) && !empty($title) && !empty($description))
        {
            $task = new TaskModel;
            $task->setTitle($title) ;
            $task->setDescription($description);

            if ($this->taskRepository->add($task))
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }

        $this->render("create");
    }

    /* update task */
    function edit($id)
    {
        extract($_POST);

        $task = new TaskModel;
        $d["task"] = $this->taskRepository->get($id);

        if (isset($title) && isset($description) && !empty($title) && !empty($description))
        {
            $task->setId($id);
            $task->setTitle($title) ;
            $task->setDescription($description);

            if ($this->taskRepository->edit($task))
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }
        $this->set($d);
        $this->render("edit");

    }

    /* delete task*/

    function delete($id)
    {

        $tasks = new TaskModel;
        $tasks->setId($id);
        if ($this->taskRepository->delete($tasks))
        {
            header("Location: " . WEBROOT . "tasks/index");
        }
    }
}
?>