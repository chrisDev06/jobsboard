<?php
class KeepInformationModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function addInformation($user_id, $id_advertisement) {
        $query = 'INSERT INTO keep_information (user_id, id_advertisement) VALUES (:user_id, :id_advertisement)';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':id_advertisement', $id_advertisement, PDO::PARAM_INT);
        return $stmt->execute();
    }

}
?>
