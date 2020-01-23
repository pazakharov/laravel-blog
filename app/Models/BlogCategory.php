<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BlogCategory
 * @property-read BlogCategory  $parentCategory
 * @property-read string        $parentTitle
 */
class BlogCategory extends Model

{
    use SoftDeletes;

    public const ROOT = 1;

    protected $fillable
        = [
            'title',
            'slug',
            'parent_id',
            'description',
        ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parentCategory()
    {
        $parentCategory = $this->belongsTo($this, 'parent_id', 'id');

        return $parentCategory;

    }


    /**
     * @return mixed
     */
    public function getParentTitleAttribute()
    {

        //dd($this->parentCategory()->title);

        $title = $this->parentCategory->title ?? ($this->isRoot() ? 'Корень' : '???');

        return $title;
    }

    /**
     * @return bool
     */
    private function isRoot()
    {
        return $this->id === BlogCategory::ROOT;
    }
}


