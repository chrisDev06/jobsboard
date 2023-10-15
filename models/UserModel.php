<?php
class UserModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getUsers() {
        $query = 'SELECT * FROM users';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addUser($email, $password, $role) {
        
            $query = 'INSERT INTO users (email, password, role) VALUES (:email, :password, :role)';
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':role', $role);
            return $stmt->execute(); // Retourne true si l'insertion a réussi, false sinon
       
    }
    

    public function deleteUser($user_id) {
        $query = 'DELETE FROM users WHERE user_id = :user_id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        return $stmt->execute(); // Retourne true si la suppression a réussi, false sinon
    }

    public function updateUser($user_id, $email, $first_name, $last_name) {
        $query = 'UPDATE users SET email = :email, first_Name = :first_name, last_Name = :last_name WHERE user_id = :user_id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        return $stmt->execute();
    }
    
    public function getUserDetails($user_id) {
        $query = 'SELECT * FROM users WHERE user_id = :user_id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
