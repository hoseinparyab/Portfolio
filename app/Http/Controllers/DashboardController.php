<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $posts = Post::query()
            ->with('categories')
            ->latest('published_at')
            ->latest('created_at')
            ->take(5)
            ->get();

        $commentStats = [
            'pending'  => Comment::query()->where('status', 'pending')->count(),
            'approved' => Comment::query()->where('status', 'approved')->count(),
            'rejected' => Comment::query()->where('status', 'rejected')->count(),
            'spam'     => Comment::query()->where('status', 'spam')->count(),
            'deleted'  => Comment::onlyTrashed()->count(),
        ];

        return view('Frontend.dashboard.index', compact('posts', 'commentStats'));
    }
}
