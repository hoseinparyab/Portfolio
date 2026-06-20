<?php
namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\StoreCategoryRequest;
use App\Http\Requests\Panel\UpdateCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {

        $categories = Category::latest()->get();
        return view('Frontend.dashboard.categories', compact('categories'));
    }

    public function store(StoreCategoryRequest $categoryRequest)
    {

        Category::create($categoryRequest->validated());

        return redirect()->back()->with('success', 'دسته بندی با موفقیت ایجاد شد');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('Frontend.dashboard.categories-edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $categoryRequest, $id)
    {
        $category = Category::findOrFail($id);

        $category->update($categoryRequest->validated());

        return redirect()->route('dashboard.categories')->with('success', 'دسته بندی با موفقیت ویرایش شد');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->back()->with('success', 'دسته بندی با موفقیت حذف شد');
    }
}
