<?php
require_once 'C:\laragon\www\vsga\helper\path-helper.php';
require_once $anggotaRepositoryPath;

class AnggotaServices
{
    private $anggotaRepository;

    public function __construct($connection)
    {
        $this->anggotaRepository = new AnggotaRepository($connection);
    }

    public function showAllAnggota(): array
    {
        return $this->anggotaRepository->getAllAnggotaFromDatabase();
    }

    public function moveTempImageToPublicPath($file)
    {
        // Extract the file extension
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);

        // Generate a random string for the filename
        $randomString = bin2hex(random_bytes(8)); // Generates a random 16-character hexadecimal string

        // Create the full path for the new file
        $newFileName = $randomString . '.' . $ext;
        $targetPath = 'C:/laragon/www/vsga/public/images/' . $newFileName;

        // Attempt to move the uploaded file
        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            return $newFileName; // Return the new filename if successful
        } else {
            throw new Exception('Failed to move uploaded file.');
        }
    }

    public function createAnggota($nama, $foto, $jenis_kelamin, $alamat)
    {
        return $this->anggotaRepository->addAnggota($nama, $foto, $jenis_kelamin, $alamat);
    }
    public function deleteAnggota($id)
    {
        // Get data to retrieve the image path
        $dataAnggota = $this->showAnggotaById($id);

        // Attempt to delete the record from the database
        $deleteDataFromDatabase = $this->anggotaRepository->deleteAnggota($id);

        if ($deleteDataFromDatabase) {
            // Assuming $dataAnggota contains the 'foto' field with the image path
            if (file_exists($dataAnggota['foto'])) {
                unlink($dataAnggota['foto']); // Delete the image file
            }
            return true; // Return true if deletion is successful
        } else {
            return false; // Return false if deletion failed
        }
    }

    public function showAnggotaById($id)
    {
        $result = $this->anggotaRepository->getAnggotaById($id);
        // var_dump($result);
        if ($result == null) {
            header('Location: \application\admin\anggota\data-anggota.php'); // Redirect to
            exit;
        }
        return $result;
    }
    public function updateAnggota($id, $nama, $foto, $jenis_kelamin, $alamat)
    {
        // Get the current anggota data
        $currentAnggota = $this->anggotaRepository->getAnggotaById($id);
        // ! foto baru
        // ! jika ada foto baru dan ada foto anggota
        if ($foto != null && $currentAnggota) {
            // Delete the old photo if it exists
            if (file_exists($currentAnggota['foto'])) {
                unlink($currentAnggota['foto']);
            }
            //! jika ada maka set fotopath == foto dari foto yang baru 
            $fotoPath = $foto;
        } else {
            // If no new photo, retain the existing one
            $fotoPath = $currentAnggota['foto'];
        }

        return $this->anggotaRepository->updateAnggota($id, $nama, $fotoPath, $jenis_kelamin, $alamat);
    }
    public function searchAnggota($keyword): array
    {
        return $this->anggotaRepository->searchAnggotaFromDatabase($keyword);
    }
}
