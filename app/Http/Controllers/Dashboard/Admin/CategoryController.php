<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Admin\Category\AddCategoryRequest;
use App\Http\Requests\Dashboard\Admin\Category\EditCategoryRequest;
use App\Http\Traits\FileSystem;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    use FileSystem;
    public function index()
    {
        $categories = Category::cursorPaginate(10);
        return view('dashboard.admin.categories.index', compact('categories'));
    }

    public function show(Category $category)
    {
        return view('dashboard.admin.categories.show', compact('category'));

    }

    public function create()
    {
        return view('dashboard.admin.categories.create');

    }

    public function store(AddCategoryRequest $request)
    {
        $data = $request->validated();
        $image_name = $this->uploadImage('categories');

        $category = new Category();
        $category->title = $data['title'];
        $category->image = $image_name;
        $category->save();

        return to_route('categories.index')->with('success', 'Category Added Successfully');
    }

    public function edit(Category $category)
    {
        return view('dashboard.admin.categories.edit', compact('category'));
    }

    public function update(EditCategoryRequest $request, Category $category)
    {
        $data = $request->validated();
        $category->title = $data['title'];
        if (isset($data['image'])) {
            $this->deleteFile("categories/{$category->image}");
            $image_name = $this->uploadImage('categories');
            $category->image = $image_name;
        }
        $category->save();
        return to_route('categories.index')->with('success', 'Category Updated Successfully');

    }

    public function destroy(Category $category)
    {

        $this->deleteFile("categories/{$category->image}");
        $category->delete();
        return back()->with('success', 'Category Deleted Successfully');
    }
}
