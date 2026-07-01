<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Language;
use App\Models\Setting;
use App\Models\Skill;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageSettingsController extends Controller
{
    public function index(): View
    {
        return view('Frontend.dashboard.page-settings', $this->pageSettingsViewData());
    }

    public function intro(): View
    {
        return view('Frontend.dashboard.page-settings.intro');
    }

    public function portfolio(): View
    {
        return view('Frontend.dashboard.page-settings.portfolio');
    }

    public function blog(): View
    {
        return view('Frontend.dashboard.page-settings.blog');
    }

    public function introUpdate(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'fullname'      => ['nullable', 'string', 'max:255'],
            'job_title'     => ['nullable', 'string', 'max:255'],
            'bio'           => ['nullable', 'string', 'max:5000'],
            'profile_image' => ['nullable', 'image', 'max:5120'],
        ]);

        foreach (['fullname', 'job_title', 'bio'] as $key) {
            if (array_key_exists($key, $validated)) {
                $this->saveSetting($key, $validated[$key]);
            }
        }

        if ($request->hasFile('profile_image')) {
            $path = $request->file('profile_image')->store('profile-images', 'public');
            $this->saveSetting('profile_image', 'storage/' . $path);
        }

        return redirect()->route('dashboard.page-settings')->with('success', 'بخش معرفی با موفقیت ذخیره شد');
    }

    public function educationsStore(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'degree'          => ['required', 'string', 'max:255'],
            'major'           => ['required', 'string', 'max:255'],
            'university'      => ['required', 'string', 'max:255'],
            'education_from'  => ['required', 'string', 'max:255'],
            'education_till'  => ['required', 'string', 'max:255'],
        ]);

        Education::query()->create($validated);

        return redirect()->route('dashboard.page-settings', status: 303)->with('success', 'سابقه تحصیلی با موفقیت افزوده شد');
    }

    public function educationsEdit(Education $education): View
    {
        return view('Frontend.dashboard.page-settings-education-edit', compact('education'));
    }

    public function educationsUpdate(Request $request, Education $education): RedirectResponse
    {
        $validated = $request->validate([
            'degree'          => ['required', 'string', 'max:255'],
            'major'           => ['required', 'string', 'max:255'],
            'university'      => ['required', 'string', 'max:255'],
            'education_from'  => ['required', 'string', 'max:255'],
            'education_till'  => ['required', 'string', 'max:255'],
        ]);

        $education->update($validated);

        return redirect()->route('dashboard.page-settings')->with('success', 'سابقه تحصیلی با موفقیت ویرایش شد');
    }

    public function educationsDestroy(Education $education): RedirectResponse
    {
        $education->delete();

        return redirect()->route('dashboard.page-settings')->with('success', 'سابقه تحصیلی با موفقیت حذف شد');
    }

    public function experiencesIndex(): View
    {
        $experiences = Experience::query()->latest()->get();

        return view('Frontend.dashboard.experiences', compact('experiences'));
    }

    public function experiencesStore(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'company'     => ['required', 'string', 'max:255'],
            'from'        => ['required', 'string', 'max:255'],
            'till'        => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:5000'],
        ]);

        Experience::query()->create([
            'title'        => $validated['title'],
            'company'      => $validated['company'],
            'started_from' => $validated['from'],
            'ended_till'   => $validated['till'],
            'description'  => $validated['description'] ?? null,
        ]);

        return redirect()->route('dashboard.page-settings.experiences', status: 303)
            ->with('success', 'تجربه با موفقیت افزوده شد');
    }

    public function experiencesEdit(Experience $experience): View
    {
        return view('Frontend.dashboard.page-settings-experience-edit', compact('experience'));
    }

    public function experiencesUpdate(Request $request, Experience $experience): RedirectResponse
    {
        $validated = $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'company'     => ['required', 'string', 'max:255'],
            'from'        => ['required', 'string', 'max:255'],
            'till'        => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:5000'],
        ]);

        $experience->update([
            'title'        => $validated['title'],
            'company'      => $validated['company'],
            'started_from' => $validated['from'],
            'ended_till'   => $validated['till'],
            'description'  => $validated['description'] ?? null,
        ]);

        return redirect()->route('dashboard.page-settings.experiences')
            ->with('success', 'تجربه با موفقیت ویرایش شد');
    }

    public function experiencesDestroy(Experience $experience): RedirectResponse
    {
        $experience->delete();

        return redirect()->route('dashboard.page-settings.experiences')
            ->with('success', 'تجربه با موفقیت حذف شد');
    }

    public function languagesStore(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'language' => ['required', 'string', 'max:255'],
            'level'    => ['required', 'string', 'max:255'],
        ]);

        Language::query()->create($validated);

        return redirect()->route('dashboard.page-settings', status: 303)->with('success', 'زبان با موفقیت افزوده شد');
    }

    public function languagesEdit(Language $language): View
    {
        return view('Frontend.dashboard.page-settings-language-edit', compact('language'));
    }

    public function languagesUpdate(Request $request, Language $language): RedirectResponse
    {
        $validated = $request->validate([
            'language' => ['required', 'string', 'max:255'],
            'level'    => ['required', 'string', 'max:255'],
        ]);

        $language->update($validated);

        return redirect()->route('dashboard.page-settings')->with('success', 'زبان با موفقیت ویرایش شد');
    }

    public function languagesDestroy(Language $language): RedirectResponse
    {
        $language->delete();

        return redirect()->route('dashboard.page-settings')->with('success', 'زبان با موفقیت حذف شد');
    }

    public function skillsIndex(): View
    {
        $skills = Skill::query()->latest()->get();

        return view('Frontend.dashboard.skills', compact('skills'));
    }

    public function skillsStore(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'icon'  => ['required', 'file', 'mimes:png,jpg,jpeg,svg,webp', 'max:2048'],
        ]);

        $path = $request->file('icon')->store('skill-icons', 'public');

        Skill::query()->create([
            'title' => $validated['title'],
            'icon'  => 'storage/' . $path,
        ]);

        return redirect()->route('dashboard.page-settings.skills', status: 303)
            ->with('success', 'مهارت با موفقیت افزوده شد');
    }

    public function skillsEdit(Skill $skill): View
    {
        return view('Frontend.dashboard.page-settings-skill-edit', compact('skill'));
    }

    public function skillsUpdate(Request $request, Skill $skill): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'icon'  => ['nullable', 'file', 'mimes:png,jpg,jpeg,svg,webp', 'max:2048'],
        ]);

        $data = ['title' => $validated['title']];

        if ($request->hasFile('icon')) {
            $path = $request->file('icon')->store('skill-icons', 'public');
            $data['icon'] = 'storage/' . $path;
        }

        $skill->update($data);

        return redirect()->route('dashboard.page-settings.skills')
            ->with('success', 'مهارت با موفقیت ویرایش شد');
    }

    public function skillsDestroy(Skill $skill): RedirectResponse
    {
        $skill->delete();

        return redirect()->route('dashboard.page-settings.skills')
            ->with('success', 'مهارت با موفقیت حذف شد');
    }

    public function resumeUpdate(Request $request): RedirectResponse
    {
        $request->validate([
            'cv' => ['required', 'file', 'mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,png,jpg,jpeg', 'max:10240'],
        ]);

        $path = $request->file('cv')->store('resumes', 'public');

        $this->saveSetting('cv', 'storage/' . $path);

        return redirect()->route('dashboard.page-settings')->with('success', 'رزومه با موفقیت بارگذاری شد');
    }

    public function softSkillsUpdate(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'soft_skills' => ['nullable', 'string', 'max:5000'],
        ]);

        $this->saveSetting('soft_skills', $validated['soft_skills'] ?? '');

        return redirect()->route('dashboard.page-settings')->with('success', 'مهارت‌های فردی با موفقیت به‌روزرسانی شد');
    }

    public function socialLinksEdit(): View
    {
        $pageSetting = $this->settingsObject();

        return view('Frontend.dashboard.social-links', compact('pageSetting'));
    }

    public function socialStore(Request $request): RedirectResponse
    {
        return $this->socialLinksUpdate($request);
    }

    public function socialLinksUpdate(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'github_url'    => ['nullable', 'url', 'max:255'],
            'linkedin_url'  => ['nullable', 'url', 'max:255'],
            'github_icon'   => ['nullable', 'image', 'max:2048'],
            'linkedin_icon' => ['nullable', 'image', 'max:2048'],
        ]);

        foreach (['github_url', 'linkedin_url'] as $key) {
            if (array_key_exists($key, $validated)) {
                $this->saveSetting($key, $validated[$key]);
            }
        }

        if ($request->hasFile('github_icon')) {
            $path = $request->file('github_icon')->store('social-icons', 'public');
            $this->saveSetting('github_icon', 'storage/' . $path);
        }

        if ($request->hasFile('linkedin_icon')) {
            $path = $request->file('linkedin_icon')->store('social-icons', 'public');
            $this->saveSetting('linkedin_icon', 'storage/' . $path);
        }

        return redirect()->route('dashboard.page-settings.social-links')->with('success', 'لینک‌های اجتماعی با موفقیت ذخیره شد');
    }

    public function socialLinksDestroy(): RedirectResponse
    {
        foreach (['github_url', 'linkedin_url', 'github_icon', 'linkedin_icon'] as $key) {
            Setting::query()->where('key', $key)->delete();
        }

        return redirect()->route('dashboard.page-settings.social-links')->with('success', 'لینک‌های اجتماعی با موفقیت حذف شد');
    }

    private function pageSettingsViewData(): array
    {
        return [
            'settings'   => $this->settingsObject(),
            'educations' => Education::query()->latest()->get(),
            'languages'  => Language::query()->latest()->get(),
        ];
    }

    private function settingsObject(): object
    {
        return (object) Setting::query()->pluck('value', 'key')->all();
    }

    private function saveSetting(string $key, ?string $value): void
    {
        Setting::query()->updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );
    }
}
