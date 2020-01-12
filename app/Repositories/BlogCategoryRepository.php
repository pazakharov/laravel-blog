<?php


namespace App\Repositories;

use App\Models\BlogCategory as Model;

class BlogCategoryRepository extends CoreRepository
{
/**
 Получить модель для редактирования в админке
 * @param int $id
 *
 * @return Model
 *
 */
    protected function getModelClass(){
        return Model::class;
    }

    public function getEdit($id){

        return $this->startConditions()->find();

    }

    public function getForComboBox(){
        return $this->startConditions()->all();
    }
}
