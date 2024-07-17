<?php
class ImageValidation
{
    private $errors = [];

    public function __construct()
    {
    }
    public function validateRequired(){
        $file = $_FILES['foto']; // Change 'file' to 'foto'
        if (empty($file)) {
            $this->errors[] = 'Foto is required';
        }
    }

    public function validateExtension()
    {
        $file = $_FILES['foto']['name']; // Change 'file' to 'foto'
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        if ($ext != "jpg" && $ext != "png" && $ext != "jpeg") {
            $this->errors['foto'] = "File harus berupa jpg, png, atau jpeg.";
        }
        return $this->errors;
    }

    public function validateSize()
    {
        $file = $_FILES['foto']['size']; // Change 'file' to 'foto'
        if ($file > 2000000) {
            $this->errors['foto'] = "File harus kurang dari 2 MB.";
        }
        return $this->errors;
    }

    public function validateType()
    {
        $file = $_FILES['foto']['type']; // Change 'file' to 'foto'
        if ($file != "image/jpeg" && $file != "image/png" && $file != "image/jpg") {
            $this->errors['foto'] = "File harus berupa jpg, png, atau jpeg.";
        }
        return $this->errors; // Added return statement
    }

    public function validateAll()
    {
        $this->validateRequired();
        $this->validateExtension();
        $this->validateSize();
        $this->validateType();
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
