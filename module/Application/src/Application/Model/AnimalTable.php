<?php
namespace Application\Model;

use Zend\Db\TableGateway\TableGateway;

class Animaltable
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function getAnimal($animalId)
    {
        $animalId  = (int) $animalId;
        $rowset = $this->tableGateway->select(array('animalId' => $animalId));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $animalId");
        }
        return $row;
    }

    public function saveAlbum(Animal $animal)
    {
        $data = array(
            'animalId' => $animal->animalId,
            'name' => $animal->name,
            'description' => $animal->description,
            'username' => $animal->username,
        );

        $animalId = (int)$animal->animalId;
        if ($animalId == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getAlbum($animalId)) {
                $this->tableGateway->update($data, array('animalId' => $animalId));
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
    }

    public function deleteAnimal($animalId)
    {
        $this->tableGateway->delete(array('animalId' => $animalId));
    }
}