<?php
namespace Application\Model;

class Animal
{
    public $animalId;
    public $name;
    public $description;
    public $viewCount;
    public $username;

    public function exchangeArray($data)
    {
        $this->animalId = (isset($data['animalId'])) ? $data['animalId'] : null;
        $this->name = (isset($data['name'])) ? $data['name'] : null;
        $this->description = (isset($data['description'])) ? $data['description'] : null;
        $this->viewCount = (isset($data['viewCount'])) ? $data['viewCount'] : null;
        $this->username  = (isset($data['username'])) ? $data['username'] : null;
    }
}