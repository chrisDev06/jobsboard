<?php
require '../models/AdvertisementModel.php';

class AdvertisementController {
    private $AdvertisementModel;

    public function __construct($db) {
        $this->AdvertisementModel = new UserModel($db);
    }

    public function addAdvertisement($title, $address, $zip_code, $country, $city, $desc, $salary, $date, $phone, $contact, $company_id) {
        return $this->AdvertisementModel->addAdvertisement($title, $address, $zip_code, $country, $city, $desc, $salary, $date, $phone, $contact, $company_id);
    }
    
    public function deleteAdvertisement($id_advertisement) {
        return $this->AdvertisementModel->deleteAdvertisement($id_advertisement);
    }
    
    public function getAllAdvertisement() {
        return $this->AdvertisementModel->getAllAdvertisement();
    }

    public function updateAdvertisement($id_advertisement, $title, $address, $zip_code, $country, $city, $desc, $salary, $date, $phone, $contact, $company_id) {
        return $this->AdvertisementModel->updateAdvertisement($id_advertisement, $title, $address, $zip_code, $country, $city, $desc, $salary, $date, $phone, $contact, $company_id);
    }

    public function getAdvertisement($id_advertisement) {
        return $this->AdvertisementModel->getAdvertisement($id_advertisement);
    }
    
}
?>
