class Authentication {
    public function checkIfLoggedIn() {
        session_start();

        if (isset($_SESSION["user_id"]) {
            return true;
        } else {
            return false;
        }
    }
}