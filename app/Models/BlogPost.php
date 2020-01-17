<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{
    use SoftDeletes;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     */
    public function category(){

        //Статья принадлежит категории
        return $this->belongsTo(BlogCategory::class);


    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {

        //Статья принадлежит какому-то польователю
        return $this->belongsTo(User::class);

    }
}
