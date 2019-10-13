<?php
// User Class for account creation and login purpose
class User {
    private $_CON;

    function __construct() {
        include_once("../database/db.php");
        $db = new Database();
        $this->_CON = $db->connect();

        if ($this->_CON){
            return "Connected";
        }
    }

    // Function that checks if User email is already registered in the database.
    private function emailExists($email){
        $pre_stmt = $this->_CON->prepare("SELECT `id` FROM `users` WHERE `email` = ?");
        $pre_stmt->bind_param("s", $email);
        $pre_stmt->execute() or die($this->_CON->error);
        $result = $pre_stmt->get_result();
        if ($result->num_rows > 0){
            return 1;
        } else {
            return 0;
        }
    }

    public function createUserAccount($username, $email, $password, $userType) {
        if ($this->emailExists($email)){
            return "EMAIL_ALREADY_EXISTS";
        } else {
            $pass_hash = password_hash($password, PASSWORD_BCRYPT, ["cost"=>8]);
            $date = date("Y-m-d");
            $notes = "Notes";
            $pre_stmt = $this->_CON->prepare("INSERT INTO `users`(`usn`, `email`, `pass`, `user_type`, `register_date`, `last_login`, `notes`)
                                                VALUES (?,?,?,?,?,?,?)");
            $pre_stmt->bind_param("sssssss",$username, $email, $pass_hash, $userType, $date, $date, $notes);
            $result = $pre_stmt->execute() or die($this->_CON->error);
            if ($result){
                return $this->_CON->insert_id;
            } else {
                return "ERROR!";
            }

        }
    }

    public function userLogin($email, $password){
    //     $sql = "SELECT `id`,`username`,`password`,`last_login` FROM `users` WHERE `email` = '$email'";
    //     echo $sql;
    //     exit;
        $pre_stmt = $this->_CON->prepare("SELECT `id`,`usn`,`pass`,`last_login` FROM `users` WHERE `email` = ?");
        $pre_stmt->bind_param("s",$email);
        $pre_stmt->execute() or die($this->_CON->error);
        $result = $pre_stmt->get_result();

        if ($result->num_rows < 1){
            return "NOT_REGISTERED";
        } else {

            $row = $result->fetch_assoc();
            if (password_verify($password, $row["pass"])){
                $_SESSION["userId"] = $row["id"];
                $_SESSION["usn"] = $row["usn"];
                $_SESSION["last_login"] = $row["last_login"];

                // Codes that updates the user last login time.
                date_default_timezone_set('EST');
                $last_login = date("Y-m-d H:i:s");
                $pre_stmt = $this->_CON->prepare("UPDATE `users` SET `last_login` = ? WHERE `email` = ?");
                $pre_stmt->bind_param("ss",$last_login,$email);
                $result = $pre_stmt->execute() or die($this->_CON->error);
                if ($result){
                    return 1;
                } else {
                    return 0;
                }
            } else {
                return "INCORRECT_PASSWORD";
            }
        }
    }
}

// $user = new User();
// echo $user->createUserAccount("Kim","kimmy@gmail.com","123456789","admin");
// echo $user->userLogin("kim@gmail.com","123456789");

?>