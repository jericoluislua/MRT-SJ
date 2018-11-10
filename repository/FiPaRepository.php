<?php

/**
 * Created by PhpStorm.
 * User: laffan
 * Date: 10/26/2018
 * Time: 2:37 PM
 */
require_once '../lib/Repository.php';
class FiPaRepository extends Repository
{
    protected $tableName = "fipa";

    public function readAllQuestions()
    {
        $query = "SELECT * FROM {$this->tableName}";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->execute();

        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }

        // Datensätze aus dem Resultat holen und in das Array $rows speichern
        $rows = array();
        while ($row = $result->fetch_object()) {
            $rows[] = $row;
        }

        return $rows;
    }

    public function getPair($element_1){
        $query = "SELECT element_right FROM {$this->tableName} WHERE element_left = ?";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('s',$element_1);
        $statement->execute();

        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }

        // Datensätze aus dem Resultat holen und in das Array $rows speichern
        $rows = array();
        while ($row = $result->fetch_object()) {
            $rows[] = $row;
        }

        return $rows[0];
    }
    public function readByRight($right)
    {

        $query = "SELECT element_1 FROM {$this->tableName} WHERE element_2=?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('s', $right);
        $statement->execute();
        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }
        $row = $result->fetch_object();
        $result->close();
        return $row;
    }
}