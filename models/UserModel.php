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
    public function addUser($email, $password, $role, $first_Name, $last_Name, $date_of_Birth, $address, $city, $postal_Code, $country, $phone_Number) {
        $query = 'INSERT INTO users (email, password, role, first_Name, last_Name, date_of_Birth, address, city, postal_Code, country, phone_Number) VALUES (:email, :password, :role, :first_Name, :last_Name, :date_of_Birth, :address, :city, :postal_Code, :country, :phone_Number)';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':role', $role);
        $stmt->bindParam(':first_Name', $first_Name);
        $stmt->bindParam(':last_Name', $last_Name);
        $stmt->bindParam(':date_of_Birth', $date_of_Birth);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':postal_Code', $postal_Code);
        $stmt->bindParam(':country', $country);
        $stmt->bindParam(':phone_Number', $phone_Number);


        return $stmt->execute(); // Retourne true si l'insertion a réussi, false sinon
    }
    
    

    public function deleteUser($user_id) {
        $query = 'DELETE FROM users WHERE user_id = :user_id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        return $stmt->execute(); // Retourne true si la suppression a réussi, false sinon
    }

    public function updateUser($user_id, $email, $first_name, $last_name, $date_of_Birth, $address, $city, $postal_Code, $country, $password, $phone_Number) {
        $query = 'UPDATE users SET email = :email, first_Name = :first_name, last_Name = :last_name, date_of_Birth = :date_of_Birth, address = :address, city = :city, postal_Code = :postal_Code, country = :country, password = :password, phone_Number = :phone_Number WHERE user_id = :user_id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':date_of_Birth', $date_of_Birth);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':postal_Code', $postal_Code);
        $stmt->bindParam(':country', $country);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':phone_Number', $phone_Number);
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
