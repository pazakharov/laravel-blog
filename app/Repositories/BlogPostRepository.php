<?php


namespace App\Repositories;

use App\Models\BlogPost as Model;

class BlogPostRepository extends CoreRepository
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

}
