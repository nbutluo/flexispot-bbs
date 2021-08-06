<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function __construct()
    {
        return $this->middleware('verify.admin.login');
    }

    public function index(Category $category)
    {
        $categories = $category->getAllCategories();
        // $categories = Category::paginate(10);
        // dda($categories);

        return view('admin.categories.index', compact('categories'));
    }


    public function create(Category $category)
    {
        $categories = $category->getAllCategories();

        // dda($categories);
        return view('admin.categories.create', compact('categories'));
    }


    public function store(CategoryRequest $request, Category $category)
    {
        $category->fill($request->all());
        $category->save();

        return redirect()->route('admin.categories.index')->with('success', '分类新增成功');
    }


    public function edit(Category $category)
    {
        $categories = $category->getAllCategories($category);
        // dda($categories);
        return view('admin.categories.edit', compact('category', 'categories'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->fill($request->all());
        $category->save();

        return redirect()->route('admin.categories.index')->with('success', '修改成功');
    }

    public function destroy(Category $category)
    {
        // 是否有子分类
        if ($category->hasChildCategory()) {
            return back()->with('danger', '该分类下有子分类，请先删除子分类后删除此分类');
        }

        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', '删除成功');
    }
}
