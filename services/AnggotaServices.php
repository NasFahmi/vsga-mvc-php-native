<?php
class AnggotaServices
{
    private $connection;
    private $anggotaRepository;

    public function __construct($connection)
    {
        $this->connection = $connection;
        $this->anggotaRepository = new AnggotaRepository($connection);
    }

    public function showAllAnggota()
    {
        return $this->anggotaRepository->getAllAnggotaFromDatabase();
    }
}
