<?php
require '../models/KeepInformationModel.php';

class KeepInformationController {
    private $keepInformationModel;

    public function __construct($db) {
        $this->keepInformationModel = new KeepInformationModel($db);
    }

    public function addInformation($user_id, $id_advertisement) {
        return $this->keepInformationModel->addInformation($user_id, $id_advertisement);
    }

}
?>
