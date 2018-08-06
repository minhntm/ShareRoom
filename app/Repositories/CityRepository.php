<?php
namespace App\Repositories;

use App\Repositories\Repository;

class CityRepository extends Repository
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\City::class;
    }
}
