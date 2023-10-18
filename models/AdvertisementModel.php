<?php
class AdvertisementModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllAdvertisement() {
        $query = 'SELECT * FROM advertisements';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addAdvertisement($title, $address, $zip_code, $country, $city, $desc, $salary, $date, $phone, $contact, $company_id) {
        $query = 'INSERT INTO advertisements (title, address, zip_code, country, city, `desc`, salary, date, phone, contact, company_id) VALUES (:title, :address, :zip_code, :country, :city, :desc, :salary, :date, :phone, :contact, :company_id)';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':zip_code', $zip_code);
        $stmt->bindParam(':country', $country);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':desc', $desc);
        $stmt->bindParam(':salary', $salary);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':contact', $contact);
        $stmt->bindParam(':company_id', $company_id);
        return $stmt->execute();
    }

    public function deleteAdvertisement($id_advertisement) {
        $query = 'DELETE FROM advertisements WHERE id_advertisement = :id_advertisement';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_advertisement', $id_advertisement);
        return $stmt->execute();
    }

    public function updateAdvertisement($id_advertisement, $title, $address, $zip_code, $country, $city, $desc, $salary, $date, $phone, $contact, $company_id) {
        $query = 'UPDATE advertisements SET title = :title, address = :address, zip_code = :zip_code, country = :country, city = :city, `desc` = :desc, salary = :salary, date = :date, phone = :phone, contact = :contact, company_id = :company_id WHERE id_advertisement = :id_advertisement';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_advertisement', $id_advertisement);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':zip_code', $zip_code);
        $stmt->bindParam(':country', $country);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':desc', $desc);
        $stmt->bindParam(':salary', $salary);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':contact', $contact);
        $stmt->bindParam(':company_id', $company_id);
        return $stmt->execute();
    }
    
    public function getAdvertisement($id_advertisement) {
        $query = 'SELECT * FROM advertisements WHERE id_advertisement = :id_advertisement';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_advertisement', $id_advertisement);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
