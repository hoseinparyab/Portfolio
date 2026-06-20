<?php
namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {

        $categories = Category::latest()->get();
        return view('Frontend.dashboard.categories', compact('categories'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'color'       => 'nullable|string|max:20',
            'description' => 'nullable|string',
        ]);

        Category::create($validated);

        return redirect()->back()->with('success', 'دسته بندی با موفقیت ایجاد شد');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('Frontend.dashboard.categories-edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'color'       => 'nullable|string|max:20',
            'description' => 'nullable|string',
        ]);

        $category->update($validated);

        return redirect()->back()->with('success', 'دسته بندی با موفقیت ویرایش شد');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->back()->with('success', 'دسته بندی با موفقیت حذف شد');
    }
}
