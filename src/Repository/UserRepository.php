<?php

namespace App\Repository;

use App\Database\ConnectionHandler;
use Exception;

/**
 * Das UserRepository ist zuständig für alle Zugriffe auf die Tabelle "user".
 *
 * Die Ausführliche Dokumentation zu Repositories findest du in der Repository Klasse.
 */
class UserRepository extends Repository
{
    /**
     * Diese Variable wird von der Klasse Repository verwendet, um generische
     * Funktionen zur Verfügung zu stellen.
     */
    protected $tableName = 'user';

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
    public function create($firstName, $name, $email, $password)
    {
        $password = sha1($password);

        $query = "INSERT INTO $this->tableName (firstName, name, email, password) VALUES (?, ?, ?, ?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ssss', $firstName, $name, $email, $password);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->insert_id;
    }

    public function login($email, $password) {

        $password = sha1($password);

        $query = "SELECT * FROM $this->tableName WHERE email = ? AND password = ?";

        // Datenbankverbindung anfordern und, das Query "preparen" (vorbereiten)
        // und die Parameter "binden"
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ss', $email, $password);

        // Das Statement absetzen
        $statement->execute();

        // Resultat der Abfrage holen
        $result = $statement->get_result();
        if (!$result) {
            return false;
        }

        // Ersten Datensatz aus dem Reultat holen
        $row = $result->fetch_object();
        session_start();

        if (isset($row)) {
            $_SESSION["user_id"] = $row->id;
        } else {
            return false;
        }

        // Datenbankressourcen wieder freigeben
        $result->close();

        // Den gefundenen Datensatz zurückgeben
        return true;
    }

    public function save($id, $image, $firstName, $lastName, $email) {
        $query = "UPDATE $this->tableName SET image = ?, firstName = ?, name = ?, email = ? WHERE id = ?";

        $statement = ConnectionHandler:: getConnection()->prepare($query);
        $statement->bind_param('ssssi', $image, $firstName, $name, $email, $id);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->insert_id;
    }

    public function delete($id) {
        $query = "DELETE  * FROM $this->tablename WHERE id = ?";
    }
}

