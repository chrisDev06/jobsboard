<?php
require_once('../models/UserModel.php');

class UserController {
    private $userModel;

    public function __construct($db) {
        $this->userModel = new UserModel($db);
    }

    
    public function addUser($email, $password, $role) {
        return $this->userModel->addUser($email, $password, $role);
    }
    
    public function deleteUser($id) {
        return $this->userModel->deleteUser($id);
    }
    
    public function getAllUsers() {
        return $this->userModel->getUsers();
    }
    
}
?>
