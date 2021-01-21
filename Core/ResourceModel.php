<?php


namespace mvc\Core;


use mvc\Config\Database;
use PDO;

class ResourceModel implements ResourceModelInterface
{
    protected $id;
    protected $table;
    protected $model;

    public function _init($table, $id, $model)
    {
        $this->table= $table;
        $this->id = $id;
        $this->model = $model;
    }

    public function index($model)
    {
        $sql = ' SELECT * FROM ' .$this->table;
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function save($model){
        $properties = $model->getProperties();
        $columnsInsert = implode(',', array_keys($properties));

        $placeNames = [];
        foreach ($properties as $key => $value) {
            array_push($placeNames, ':' . $key);
        }
        $valuesInsert = implode(',', $placeNames);

        $columsUpdate = [];
        foreach (array_keys($properties) as $value) {
            if ($value !== 'id') {
                array_push($columsUpdate, $value . ' = :' . $value);
            }
        }
        $columsUpdate = implode(',', $columsUpdate);

        /* TRUE => Create, FALSE => Edit */
        if ($model->getId() === null) {
            $sql = 'INSERT INTO '.$this->table.' ('.$columnsInsert.', created_at, updated_at) VALUES ('.$valuesInsert.', :created_at, :updated_at)';
            $req = Database::getBdd()->prepare($sql);
            $date = array("created_at" => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'));

            return $req->execute(array_merge($properties, $date));

        }else {
            $sql = 'UPDATE '.$this->table.' SET ' . $columsUpdate . ', updated_at = :updated_at WHERE id = :id';
            $req = Database::getBdd()->prepare($sql);
            $date = array("id" => $model->getId(), 'updated_at' => date('Y-m-d H:i:s'));

            return $req->execute(array_merge($properties, $date));
        }
    }

    public function getId($id){
        $sql = 'SELECT * FROM '.$this->table.' where id = :id';
        $req = Database::getBdd()->prepare($sql);
        $req->execute(['id' => $id]);

        return $req->fetchObject();
    }

    public function delete($model)
    {
        $sql = ' DELETE FROM '.$this->table.' WHERE id = '.$model->getId();
        $req = Database::getBdd()->prepare($sql);
        return $req->execute([':id' => $model->getId()]);
    }

}