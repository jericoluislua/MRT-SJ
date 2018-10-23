<?php
/**
 * Created by IntelliJ IDEA.
 * User: vmadmin
 * Date: 17.10.2018
 * Time: 15:54
 */
require_once '../lib/Repository.php';
class MuChoRepository extends Repository
{
    protected $tableName = "mucho";
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
    public function getAnswer($question){
        $query = "SELECT answer FROM {$this->tableName} WHERE question = ?";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('s',$question);
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