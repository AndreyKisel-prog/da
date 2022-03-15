<?php

namespace App\Repositories;

use App\Models\BlogCategory as Model;
use Illuminate\Database\Eloquent\Collection;

/**
 * @package App\Repositories
 */
class BlogCategoryRepository extends CoreRepository
{
    /**
     * @param int $id
     * @return Model
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
        if(empty($item)){
            abort(404);
        }
    }
    public function getForComboBox(){
        return $this->startConditions()->all();
    }

    /**
     * @return string
     */
    public function getModelClass()
    {
        return Model::class;
    }
}
