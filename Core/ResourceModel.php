<?php


namespace mvc\Core;


use mvc\Config\Database;
use PDO;

class ResourceModel implements ResourceModelInterface
{
    protected $table;
    protected $id;
    protected $model;

    public function _init($table, $id, $model)
    {
        $this->table= $table;
        $this->id = $id;
        $this->model = $model;


    }

    public function save($model)
    {


    }

    public function delete($model)
    {

    }

    public function all($model)
    {
        $sql = "SELECT * FROM" .$this->table;
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

}