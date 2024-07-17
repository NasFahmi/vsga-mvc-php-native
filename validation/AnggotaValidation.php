<?php
class AnggotaValidation
{
    private $errors = [];

    public function __construct()
    {
    }

    public function validateNama($nama)
    {
        if (empty($nama)) {
            $this->errors[] = 'Nama is required';
        }
    }


    public function validateJenisKelamin($jenis_kelamin)
    {
        if (!isset($jenis_kelamin) || !in_array($jenis_kelamin, ['0', '1'], true)) {
            $this->errors[] = 'Jenis Kelamin is invalid';
        }
    }

    public function validateAlamat($alamat)
    {
        if (empty($alamat)) {
            $this->errors[] = 'Alamat is required';
        }
    }

    public function validateAll($nama, $jenis_kelamin, $alamat)
    {
        $this->validateNama($nama);
        $this->validateJenisKelamin($jenis_kelamin);
        $this->validateAlamat($alamat);
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function hasErrors()
    {
        return !empty($this->errors);
    }
}
