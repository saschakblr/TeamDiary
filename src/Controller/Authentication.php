<?php

namespace App\Controller;

class Authentication {
    public static function checkIfLoggedIn() {
        session_start();

        if (isset($_SESSION["user_id"])) {
            return $_SESSION["user_id"];
        } else {
            return 0;
        }
    }
}

?>