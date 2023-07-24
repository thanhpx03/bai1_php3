<?php

namespace App\Http\Controllers;
use App\Http\Requests\UpdateCategoryRequest;

use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    const obj='categories';
    // tên thư mục
    const dot='.';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // dd( __FUNCTION__ );
     
        $data= Category::query()->orderByDesc('id')->get();
        
        return view(self::obj . self::dot . __FUNCTION__ ,compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view(self::obj . self::dot . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        //
        $model = new Category();

        $model->fill($request->all());

        $model->save();

        return redirect()->route('Category.index');
        //(new Category())->fittable
       // Category::query()->create();
       // dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $data=Category::find($id);
        return view(self::obj . self::dot . __FUNCTION__ ,compact('data'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {
        //
        $model = Category::query()->findOrFail($id);

        $model->fill($request->all());

        $model->save();

        return redirect()->route('Category.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //dependonce injection
        $category=Category::find($id);

        // $model=Category::query()->findOrFail($id);
        //findorFail vaididate dữ liệu
     //   Category::destroy($id);
       // $model->delete();
       $category->delete();
        return back();
    }
}
