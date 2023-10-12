<?php
require_once('../models/UserModel.php');

class UserController {
    private $userModel;

    public function __construct($db) {
        $this->userModel = new UserModel($db);
    }

    
    public function addUser($email, $first_name, $last_name) {
        return $this->userModel->addUser($email, $first_name, $last_name);
    }
    
    public function deleteUser($id) {
        return $this->userModel->deleteUser($id);
    }
    
    public function getAllUsers() {
        return $this->userModel->getUsers();
    }
    
}
?>
