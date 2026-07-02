<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\UpdateAccountRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AccountSettingsController extends Controller
{
    public function index(): View
    {
        $user = auth()->user();

        return view('Frontend.dashboard.account-settings', compact('user'));
    }

    public function update(UpdateAccountRequest $request): RedirectResponse
    {
        /** @var User $user */
        $user = $request->user();
        $validated = $request->validated();

        $data = [
            'name'  => $validated['name'],
            'email' => $validated['email'],
            'bio'   => $validated['bio'] ?? null,
        ];

        if (! empty($validated['password'])) {
            $data['password'] = $validated['password'];
        }

        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('avatars', 'public');
            $data['avatar'] = 'storage/' . $path;
        }

        $user->update($data);

        return redirect()->route('dashboard.account-settings')
            ->with('success', 'اطلاعات حساب با موفقیت به‌روزرسانی شد');
    }
}
