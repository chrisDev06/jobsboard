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
    

    public function deleteUser($id) {
        $query = 'DELETE FROM users WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute(); // Retourne true si la suppression a réussi, false sinon
    }
    
}
?>
