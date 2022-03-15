<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * @package App\Repositories
 */
abstract class CoreRepository
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * CoreRepository constructor
     */
    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    /**
     * @return mixed
     */
    abstract public function getModelClass();

    /**
     * @return Model|Illuminate\Foundation\Application|mixed
     */
    public function   startConditions()
    {
        return clone $this->model;
    }
}
