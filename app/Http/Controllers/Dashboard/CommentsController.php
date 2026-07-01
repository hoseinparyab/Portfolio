<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\UpdateCommentsRequest;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;

class CommentsController extends Controller
{
    public function index()
    {
        $comments = Comment::query()
            ->with(['user', 'post'])
            ->latest()
            ->paginate(10);

        return view('Frontend.dashboard.comments', compact('comments'));
    }

    public function approve(string $id): RedirectResponse
    {
        $comment = Comment::findOrFail($id);
        $comment->update(['status' => 'approved']);

        return redirect()->back()->with('success', 'دیدگاه با موفقیت تأیید شد');
    }

    public function spam(string $id): RedirectResponse
    {
        $comment = Comment::findOrFail($id);
        $comment->update(['status' => 'spam']);

        return redirect()->back()->with('success', 'دیدگاه به عنوان هرزنامه علامت‌گذاری شد');
    }

    public function destroy(string $id): RedirectResponse
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->back()->with('success', 'دیدگاه با موفقیت حذف شد');
    }

    public function edit(string $id)
    {
        $comment = Comment::findOrFail($id);
        return view('Frontend.dashboard.comments-edit', compact('comment'));
    }

    public function update(UpdateCommentsRequest $updateCommentsRequest, string $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->update($updateCommentsRequest->validated());
        return redirect()->route('dashboard.comments.index')->with('success', 'دیدگاه با موفقیت ویرایش شد');
    }
}
