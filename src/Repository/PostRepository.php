<?php

namespace App\Repository;

use App\Database\ConnectionHandler;
use Exception;

/**
 * Das UserRepository ist zuständig für alle Zugriffe auf die Tabelle "user".
 *
 * Die Ausführliche Dokumentation zu Repositories findest du in der Repository Klasse.
 */
class PostRepository extends Repository
{
    /**
     * Diese Variable wird von der Klasse Repository verwendet, um generische
     * Funktionen zur Verfügung zu stellen.
     */
    protected $tableName = 'post';
    protected $joinedTableName = 'user';

    /**
     * Erstellt einen neuen benutzer mit den gegebenen Werten.
     *
     * Das Passwort wird vor dem ausführen des Queries noch mit dem SHA1
     *  Algorythmus gehashed.
     *
     * @param $firstName Wert für die Spalte firstName
     * @param $lastName Wert für die Spalte lastName
     * @param $email Wert für die Spalte email
     * @param $password Wert für die Spalte password
     *
     * @throws Exception falls das Ausführen des Statements fehlschlägt
     */
    public function create($title, $length, $description, $userId) {

        $query = "INSERT INTO $this->tableName (title, length, description, createdAt, userId) VALUES (?, ?, ?, SYSDATE(), ?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('sisi', $title, $length, $description, $userId);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->insert_id;
    }

    public function save($id, $title, $length, $description) {
        $query = "UPDATE $this->tableName SET title = ?, length = ?, description = ? WHERE id = ?";

        $statement = ConnectionHandler:: getConnection()->prepare($query);
        $statement->bind_param('sisi', $title, $length, $description, $id);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->insert_id;
    }

    public function readAllWithUser() {
        $query = "SELECT a.id AS postId, a.title AS title, a.length AS length, a.description AS description, a.createdAt AS createdAt, b.id AS userId, b.firstname AS firstName, b.name AS name FROM `post` AS a JOIN user AS b ON (a.userId = b.id) ORDER BY a.id DESC";

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

    public function readAllFromCurrentUser($uId) {
        $query = "SELECT a.id AS postId, a.title AS title, a.length AS length, a.description AS description, a.createdAt AS createdAt, b.firstname AS firstName, b.name AS name FROM `post` AS a JOIN user AS b ON (a.userId = b.id) WHERE userId = ?";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $uId);

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
}
