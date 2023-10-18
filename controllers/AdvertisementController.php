<?php
require '../models/AdvertisementModel.php';

class AdvertisementController {
    private $advertisementModel;

    public function __construct($db) {
        $this->advertisementModel = new AdvertisementModel($db);
    }

    public function addAdvertisement($title, $address, $zip_code, $country, $city, $desc, $salary, $date, $phone, $contact, $company_id) {
        return $this->advertisementModel->addAdvertisement($title, $address, $zip_code, $country, $city, $desc, $salary, $date, $phone, $contact, $company_id);
    }
    
    public function deleteAdvertisement($id_advertisement) {
        return $this->advertisementModel->deleteAdvertisement($id_advertisement);
    }
    
    public function getAllAdvertisement() {
        return $this->advertisementModel->getAllAdvertisement();
    }

    public function updateAdvertisement($id_advertisement, $title, $address, $zip_code, $country, $city, $desc, $salary, $date, $phone, $contact, $company_id) {
        return $this->advertisementModel->updateAdvertisement($id_advertisement, $title, $address, $zip_code, $country, $city, $desc, $salary, $date, $phone, $contact, $company_id);
    }

    public function getAdvertisement($id_advertisement) {
        return $this->advertisementModel->getAdvertisement($id_advertisement);
    }
    
}
?>
