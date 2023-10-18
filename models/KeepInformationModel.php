<?php
class KeepInformationModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function addInformation($user_id, $id_advertisement, $first_Name, $last_Name, $address, $city, $postal_Code, $country, $email, $phone_Number) {
        $query = 'INSERT INTO keep_information (user_id, id_advertisement, first_Name, last_Name, address, city, postal_Code, country, email, phone_Number) 
                  VALUES (:user_id, :id_advertisement, :first_Name, :last_Name, :address, :city, :postal_Code, :country, :email, :phone_Number)';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':id_advertisement', $id_advertisement);
        $stmt->bindParam(':first_Name', $first_Name);
        $stmt->bindParam(':last_Name', $last_Name);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':postal_Code', $postal_Code);
        $stmt->bindParam(':country', $country);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone_Number', $phone_Number);
        return $stmt->execute();
    }

    public function updateInformation($id, $user_id, $id_advertisement, $first_Name, $last_Name, $address, $city, $postal_Code, $country, $email, $phone_Number) {
        $query = 'UPDATE keep_information 
                  SET user_id = :user_id, id_advertisement = :id_advertisement, 
                  first_Name = :first_Name, last_Name = :last_Name, address = :address, 
                  city = :city, postal_Code = :postal_Code, country = :country, 
                  email = :email, phone_Number = :phone_Number 
                  WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':id_advertisement', $id_advertisement);
        $stmt->bindParam(':first_Name', $first_Name);
        $stmt->bindParam(':last_Name', $last_Name);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':postal_Code', $postal_Code);
        $stmt->bindParam(':country', $country);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone_Number', $phone_Number);
        return $stmt->execute();
    }

    public function deleteInformation($id) {
        $query = 'DELETE FROM keep_information WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function getInformation($id) {
        $query = 'SELECT * FROM keep_information WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllInformation() {
        $query = 'SELECT * FROM keep_information';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
