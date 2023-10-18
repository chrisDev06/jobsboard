<?php 
    require_once '../models/CompanieModel.php';

class CompanieController {
    private $companieModel;

    public function __construct($db) {
        $this->companieModel = new CompanieModel($db);
    }

    public function addCompanie($name, $email, $number, $address, $zip_code, $country, $password) {
        return $this->companieModel->addCompanie($name, $email, $number, $address, $zip_code, $country, $password);
    }

    public function getAllCompanies() {
        return $this->companieModel->getCompanies();
    }

    public function deleteCompanie($id_companie) {
        return $this->companieModel->deleteCompanie($id_companie);
    }

    public function updateCompanie($name, $email, $number, $address, $city, $zip_code, $country, $id_companie) {
        return $this->companieModel-> updateCompanie($name, $email, $number, $address, $city, $zip_code, $country, $id_companie);
    }

    public function getCompanieDetails($id_companie) {
        return $this->companieModel->getCompanieDetails($id_companie);
    }
}
?>