<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Requests\BlogCategoryCreateRequest;
use App\Http\Requests\BlogCategoryUpdateRequest;
use App\Models\BlogCategory;
use App\Repositories\BlogCategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * @var BlogCategoryRepository
     */
    private $blogCategoryRepository;

    public function __construct()
    {
        parent::__construct();

        $this->blogCategoryRepository = app(BlogCategoryRepository::class);

    }



    public function index()
    {
        //$paginator = BlogCategory::paginate(5);

        $paginator = $this->blogCategoryRepository->getAllWithPaginate(5);

        return view('blog.admin.categories.index', compact('paginator'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new BlogCategory();
        $categoryList = $this->blogCategoryRepository->getForComboBox();

        return view('blog.admin.categories.edit',
            compact('item', 'categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogCategoryCreateRequest $request)
    {
        $data = $request->input();

        /*Ушло в обсервер
        if(empty($data['slug'])){
            $data['slug'] = str_slug($data['title']);
        }*/

        //создать объект но не писать в базу

      //  $item = new BlogCategory($data);
      //  dd($item);
      //  $item->save();

        $item = (new BlogCategory())->create($data);

        if($item){
            return redirect()->route('blog.admin.categories.edit', [$item->id])
                ->with(['success' => 'Успешно сохранено']);
        }else{
            return back()->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id, BlogCategoryRepository $categoryRepository)
    {


       // $item = BlogCategory::findOrFail($id);
       // $categoryList = BlogCategory::all();

        $item = $categoryRepository->getEdit($id);

        if(empty($item)){abort(404);}


        $categoryList = $categoryRepository->getForComboBox();

        return view('blog.admin.categories.edit',
            compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogCategoryUpdateRequest $request, $id)
    {


        // $validatedData = $this->validate($request, $rules);

        //$validatedData = $request->validate($rules);


        //$item = BlogCategory::find($id);
        $item = $this->blogCategoryRepository->getEdit($id);


        if (empty($item)){
            return back()
                ->withErrors(['msg' => 'Запись id=[{$id}] не найдена'])
                ->withInput();
        }

        $data = $request->all();

        $result = $item->fill($data)->save();

        if($result) {
            return redirect()
                ->route('blog.admin.categories.edit', $item->id)
                ->with(['success' => 'Успешно сохранено']);
        }else{
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }

    }


}
