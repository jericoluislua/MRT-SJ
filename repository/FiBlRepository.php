<?php
/**
 * Created by IntelliJ IDEA.
 * User: vmadmin
 * Date: 17.10.2018
 * Time: 15:54
 */
require_once '../lib/Repository.php';
class FiBlRepository extends Repository
{
    protected $tableName = "fibl";
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
    public function getAnswer($fiblid){
        $query = "SELECT answer FROM {$this->tableName} WHERE fiblid = ?";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i',$fiblid);
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