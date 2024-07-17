<?php
require_once '../model/connection.php';
class AnggotaRepository
{
    private $connection;
    public function __construct($conn)
    {
        $this->connection = $conn;
    }
    public function getAllAnggotaFromDatabase(): array
    {
        $sql = "SELECT * FROM anggota";
        $result = $this->connection->query($sql);

        if ($result->num_rows > 0) {
            $anggotaList = [];
            while ($row = $result->fetch_assoc()) {
                $anggotaList[] = $row;
            }
            return $anggotaList;
        } else {
            return [];
        }
    }
}
