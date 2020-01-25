<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class DiggingDipperController extends Controller
{
    public function collections()
    {
        $eloquentCollection = BlogPost::withTrashed()->get();

       // dd(__METHOD__, $eloquentCollection, $eloquentCollection->toArray());

        $collection = collect($eloquentCollection->toArray());

    /*    dd(
            $collection->where('deleted_at', '!=', null)->keyBy(function($id = 'id') {
                $id2 = (int)$id + 10;
                return $id2;
            })
          );*/


    }
}

