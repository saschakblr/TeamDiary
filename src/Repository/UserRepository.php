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

        echo "$firstName, $name, $email, $password";
        $query = "INSERT INTO $this->tableName (firstname, name, email, password) VALUES (?, ?, ?, ?)";

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


    public function uploadMyFile($id, $image) {
        if (isset($_FILES["fileToUpload"]["name"])){
            $datetime = new \DateTime();
            $target_dir = "uploads/";
            $base_file = basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($base_file,PATHINFO_EXTENSION));
            $target_file = $target_dir . 'B'.$id.$datetime->getTimestamp().'.'.$imageFileType;
            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if($check !== false) {
                    $uploadOk = 1;
                } else {
                    return "";
                    $uploadOk = 0;
                }
            }
            // Check if file already exists
            if (file_exists($target_file)) {
                return "";
                $uploadOk = 0;
            }
            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                return "";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                return "";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                return "";
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    return $target_file;
                } else {
                    return "";
                }
            }
        }
    }
    public function save($id, $firstName, $name, $email) {
        $newImage=$this->uploadMyFile($id, $_FILES);
        echo $newImage;
        $query = "UPDATE $this->tableName SET imagePath = ?, firstname = ?, name = ?, email = ? WHERE id = ?";

        $statement = ConnectionHandler:: getConnection()->prepare($query);
        $statement->bind_param('ssssi', $newImage, $firstName, $name, $email, $id);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->insert_id;
    }

    public function delete($id) {
        $query = "DELETE  * FROM $this->tablename WHERE id = ?";
    }
}

