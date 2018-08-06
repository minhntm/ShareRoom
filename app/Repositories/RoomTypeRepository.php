<?php
namespace App\Repositories;

use App\Repositories\Repository;

class RoomTypeRepository extends Repository
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\RoomType::class;
    }
}
