<?php
// require_once '../model/connection.php';
require_once 'C:\laragon\www\vsga\helper\path-helper.php';
require_once $connectionPath;

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
    public function addAnggota($nama, $foto, $jenis_kelamin, $alamat)
    {
        $stmt = $this->connection->prepare("INSERT INTO anggota (nama, foto, jenis_kelamin, alamat) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssis", $nama, $foto, $jenis_kelamin, $alamat);
        return $stmt->execute();
    }
    public function deleteAnggota($id)
    {
        $stmt = $this->connection->prepare("DELETE FROM anggota WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
    public function getAnggotaById($id)
    {
        $stmt = $this->connection->prepare("SELECT * FROM anggota WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Fetch the row into an associative array
        $anggota = $result->fetch_assoc();


        return $anggota; // Return the associative array
    }
    public function updateAnggota($id, $nama, $foto, $jenis_kelamin, $alamat)
    {
        $stmt = $this->connection->prepare("UPDATE anggota SET nama = ?, foto = ?, jenis_kelamin = ?, alamat = ? WHERE id = ?");
        $stmt->bind_param("ssisi", $nama, $foto, $jenis_kelamin, $alamat, $id);
        return $stmt->execute();
    }
}
