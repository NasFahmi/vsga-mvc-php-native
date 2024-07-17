<?php
require_once '../model/connection.php';
require_once '../repository/AnggotaRepository.php';
require_once '../services/AnggotaServices.php';

class AnggotaController
{
    private $anggotaService;

    public function __construct($connection)
    {
        $this->anggotaService = new AnggotaServices($connection);
    }

    public function showAllAnggota():array
    {
        return $this->anggotaService->showAllAnggota();
    }
}

// Instantiate the controller and fetch data
$controller = new AnggotaController($conn);
$data = $controller->showAllAnggota();
