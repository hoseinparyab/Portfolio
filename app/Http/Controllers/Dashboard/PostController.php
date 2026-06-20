<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\UpdatePostRequest;
use App\Http\Requests\Dashboard\StorePostRequest;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::query()
            ->with(['categories', 'user'])
            ->latest('published_at')
            ->latest('created_at')
            ->take(5)
            ->get();
        return view('Frontend.dashboard.posts', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::latest()->get();

        return view('Frontend.dashboard.posts-add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $postRequest)
    {
        $post = Post::create($postRequest->validated());
        $post->categories()->sync($postRequest->categories ?? []);

        return redirect()->route('dashboard.posts.index')->with('success', 'پست با موفقیت ایجاد شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);

        return view('Frontend.dashboard.posts-edit', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post       = Post::with('categories')->findOrFail($id);
        $categories = Category::latest()->get();

        return view('Frontend.dashboard.posts-edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $updatePostRequest, string $id)
    {
        $post = Post::findOrFail($id);
        $post->update($updatePostRequest->validated());
        $post->categories()->sync($updatePostRequest->categories ?? []);

        return redirect()->route('dashboard.posts.index')->with('success', 'پست با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('dashboard.posts.index')->with('success', 'پست با موفقیت حذف شد');
    }
}
