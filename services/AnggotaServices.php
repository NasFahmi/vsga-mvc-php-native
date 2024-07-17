<?php
require_once 'C:\laragon\www\vsga\repository\AnggotaRepository.php';
class AnggotaServices
{
    private $anggotaRepository;

    public function __construct($connection)
    {
        $this->anggotaRepository = new AnggotaRepository($connection);
    }

    public function showAllAnggota()
    {
        return $this->anggotaRepository->getAllAnggotaFromDatabase();
    }
}
