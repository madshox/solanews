<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get();
        return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = Category::get();
        return view('dashboard.categories.form', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryRequest $request)
    {
        $params = $request->all();
        $params['slug'] = SlugService::createSlug(Category::class, 'slug', $request->title['uz']);
        Category::create($params);
        return redirect()->route('categories.index')->with('success', 'Категория успешно добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.form', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->all());
        return redirect()->route('categories.index')->with('warning', 'Категория успешно отредактирована');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('danger', 'Категория успешно удалена');
    }
}
