<?php 
class CompanieModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getCompanies() {
        $query = 'SELECT * FROM companies';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function addCompanie($name, $email, $number, $address, $zip_code, $country, $city) {
        $query = 'INSERT INTO companies (name, email, number, address, zip_code, country, city) VALUES (:name, :email, :number, :address, :zip_code, :country, :city)';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':number', $number);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':zip_code', $zip_code);
        $stmt->bindParam(':country', $country);
        return $stmt->execute();
    }

    public function deleteCompanie($id_companie) {
        $query = 'DELETE FROM companies WHERE id_companie = :id_companie';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_companie', $id_companie);
        return $stmt->execute();
    }

    public function updateCompanie($name, $email, $number, $address, $city, $zip_code, $country, $id_companie) {
        $query = 'UPDATE companies SET name = :name, email = :email, number = :number, address = :address, city = :city, zip_code = :zip_code, country = :country WHERE id_companie = :id_companie';
        $stmt  = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':number', $number);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':zip_code', $zip_code);
        $stmt->bindParam(':country', $country);
        $stmt->bindParam(':id_companie', $id_companie);
        return $stmt->execute();
    }

    public function getCompanieDetails($id_companie) {
        $query = 'SELECT * FROM companies WHERE id_companie = :id_companie';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_companie', $id_companie);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>