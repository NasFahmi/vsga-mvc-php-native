<?php

require_once 'C:\laragon\www\vsga\helper\path-helper.php';
require_once $connectionPath;
require_once $anggotaServicesPath;
require_once $anggotaValidationPath;
require_once $imageValidaionPath;

class AnggotaController
{
    private $anggotaService;
    private $validationAnggota;
    private $validationImage;

    public function __construct($connection)
    {
        $this->anggotaService = new AnggotaServices($connection);
        $this->validationAnggota = new AnggotaValidation();
        $this->validationImage = new ImageValidation();
    }

    public function showAllAnggota(): array
    {
        return $this->anggotaService->showAllAnggota();
    }
    public function addAnggota()
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama = $_POST['nama'];
            $foto = $_FILES['foto'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $alamat = $_POST['alamat'];
            // var_dump($foto);

            // validation
            $this->validationAnggota->validateAll($nama, $jenis_kelamin, $alamat); //validate data string
            $this->validationImage->validateAll(); // validate image

            if (!$this->validationAnggota->hasErrors() && !$this->validationImage->hasErrors()) {
                $fotopath = $this->anggotaService->moveTempImageToPublicPath($foto);
                $result = $this->anggotaService->createAnggota($nama, $fotopath, $jenis_kelamin, $alamat); //foto => path foto
                var_dump($result);
                if ($result) {
                    header('Location: \application\admin\anggota\data-anggota.php'); // Redirect to avoid form resubmission
                    exit;
                } else {
                    $errors[] = 'Failed to add Anggota';
                }
            } else {
                $errors = array_merge($errors, $this->validationAnggota->getErrors(), $this->validationImage->getErrors());
            }

            // Return errors to view
            return $errors;
        }
    }
    public function deleteAnggota()
    {
        $errors = [];
        $id = $_POST['id'];
        $result = $this->anggotaService->deleteAnggota($id);
        if ($result) {
            header('Location: \application\admin\anggota\data-anggota.php'); // Redirect to
            exit;
        } else {
            $errors[] = 'Failed to delete Anggota';
        }
    }
    public function getAnggotaById()
    {
        $id = $_GET['id'];
        return $this->anggotaService->showAnggotaById($id);
    }
    public function updateAnggota($id)
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama = $_POST['nama'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $foto = $_FILES['foto'];
            // var_dump($foto);
            $alamat = $_POST['alamat'];

            // Validate input
            $this->validationAnggota->validateAll($nama, $jenis_kelamin, $alamat);
            if (!empty($foto['name'])) { //! jika ada foto nya, karena update foto bersifat opsional
                $this->validationImage->validateAll(); // Validate image if new photo uploaded
            }

            if (!$this->validationAnggota->hasErrors() && (!$this->validationImage->hasErrors())) {
                // ! upload foto baru jika ada
                $fotopath = null; //! null jika tidak ada foto
                if (!empty($foto['name'])) {
                    $fotopath = $this->anggotaService->moveTempImageToPublicPath($foto); //! pindahkan ke public path
                }

                // Update the anggota data
                $result = $this->anggotaService->updateAnggota($id, $nama, $fotopath, $jenis_kelamin, $alamat); //!fotopath bisa bernnilai null atau tidak 

                if ($result) {
                    header('Location: \application\admin\anggota\data-anggota.php');
                    exit;
                } else {
                    $errors[] = 'Failed to update Anggota';
                }
            } else {
                $errors = array_merge($errors, $this->validationAnggota->getErrors(), $this->validationImage->getErrors());
            }

            return $errors;
        }
    }
    public function searchAnggota($keyword): array
    {
        return $this->anggotaService->searchAnggota($keyword);
    }
}

// Instantiate the controller and fetch data
$controller = new AnggotaController($conn);
$data = $controller->showAllAnggota();
