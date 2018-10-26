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
    public function getPair($element_1){
        $query = "SELECT element_2 FROM {$this->tableName} WHERE element_1 = ?";

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
}