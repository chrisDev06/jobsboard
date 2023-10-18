<?php
require_once '../models/KeepInformationModel.php';

class KeepInformationController {
    private $keepInformationModel;

    public function __construct($db) {
        $this->keepInformationModel = new KeepInformationModel($db);
    }

    public function addInformation($user_id, $id_advertisement, $first_Name, $last_Name, $address, $city, $postal_Code, $country, $email, $phone_Number) {
        return $this->keepInformationModel->addInformation($user_id, $id_advertisement, $first_Name, $last_Name, $address, $city, $postal_Code, $country, $email, $phone_Number);
    }

    public function updateInformation($id, $user_id, $id_advertisement, $first_Name, $last_Name, $address, $city, $postal_Code, $country, $email, $phone_Number) {
        return $this->keepInformationModel->updateInformation($id, $user_id, $id_advertisement, $first_Name, $last_Name, $address, $city, $postal_Code, $country, $email, $phone_Number);
    }

    public function deleteInformation($id) {
        return $this->keepInformationModel->deleteInformation($id);
    }

    public function getInformation($id) {
        return $this->keepInformationModel->getInformation($id);
    }

    public function getAllInformation() {
        return $this->keepInformationModel->getAllInformation();
    }
}
?>
