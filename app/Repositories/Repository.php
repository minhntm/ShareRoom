<?php namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class Repository
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract public function getModel();

    public function setModel()
    {
        $this->model = app()->make($this->getModel());
    }

    public function getAttrWithId($attr)
    {
        $objects = $this->model->get(['id', $attr])->toArray();
        $attrWithIdArr = [];
        foreach ($objects as $object) {
            $attrWithIdArr[$object['id']] = $object[$attr];
        }

        return $attrWithIdArr;
    }
}
