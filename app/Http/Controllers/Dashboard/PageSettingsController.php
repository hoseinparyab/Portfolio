<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreEducationRequest;
use App\Http\Requests\Dashboard\StoreExperienceRequest;
use App\Http\Requests\Dashboard\StoreLanguageRequest;
use App\Http\Requests\Dashboard\StoreSkillRequest;
use App\Http\Requests\Dashboard\UpdateEducationRequest;
use App\Http\Requests\Dashboard\UpdateExperienceRequest;
use App\Http\Requests\Dashboard\UpdateIntroPageSettingsRequest;
use App\Http\Requests\Dashboard\UpdateLanguageRequest;
use App\Http\Requests\Dashboard\UpdateResumeRequest;
use App\Http\Requests\Dashboard\UpdateSkillRequest;
use App\Http\Requests\Dashboard\UpdateSocialLinksRequest;
use App\Http\Requests\Dashboard\UpdateSoftSkillsRequest;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Language;
use App\Models\Setting;
use App\Models\Skill;
use Illuminate\Http\RedirectResponse;
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

    public function introUpdate(UpdateIntroPageSettingsRequest $request): RedirectResponse
    {
        $validated = $request->validated();

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

    public function educationsStore(StoreEducationRequest $request): RedirectResponse
    {
        Education::query()->create($request->validated());

        return redirect()->route('dashboard.page-settings', status: 303)->with('success', 'سابقه تحصیلی با موفقیت افزوده شد');
    }

    public function educationsEdit(Education $education): View
    {
        return view('Frontend.dashboard.page-settings-education-edit', compact('education'));
    }

    public function educationsUpdate(UpdateEducationRequest $request, Education $education): RedirectResponse
    {
        $education->update($request->validated());

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

    public function experiencesStore(StoreExperienceRequest $request): RedirectResponse
    {
        Experience::query()->create($request->experienceAttributes());

        return redirect()->route('dashboard.page-settings.experiences', status: 303)
            ->with('success', 'تجربه با موفقیت افزوده شد');
    }

    public function experiencesEdit(Experience $experience): View
    {
        return view('Frontend.dashboard.page-settings-experience-edit', compact('experience'));
    }

    public function experiencesUpdate(UpdateExperienceRequest $request, Experience $experience): RedirectResponse
    {
        $experience->update($request->experienceAttributes());

        return redirect()->route('dashboard.page-settings.experiences')
            ->with('success', 'تجربه با موفقیت ویرایش شد');
    }

    public function experiencesDestroy(Experience $experience): RedirectResponse
    {
        $experience->delete();

        return redirect()->route('dashboard.page-settings.experiences')
            ->with('success', 'تجربه با موفقیت حذف شد');
    }

    public function languagesStore(StoreLanguageRequest $request): RedirectResponse
    {
        Language::query()->create($request->validated());

        return redirect()->route('dashboard.page-settings', status: 303)->with('success', 'زبان با موفقیت افزوده شد');
    }

    public function languagesEdit(Language $language): View
    {
        return view('Frontend.dashboard.page-settings-language-edit', compact('language'));
    }

    public function languagesUpdate(UpdateLanguageRequest $request, Language $language): RedirectResponse
    {
        $language->update($request->validated());

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

    public function skillsStore(StoreSkillRequest $request): RedirectResponse
    {
        $path = $request->file('icon')->store('skill-icons', 'public');

        Skill::query()->create([
            'title' => $request->validated('title'),
            'icon'  => 'storage/' . $path,
        ]);

        return redirect()->route('dashboard.page-settings.skills', status: 303)
            ->with('success', 'مهارت با موفقیت افزوده شد');
    }

    public function skillsEdit(Skill $skill): View
    {
        return view('Frontend.dashboard.page-settings-skill-edit', compact('skill'));
    }

    public function skillsUpdate(UpdateSkillRequest $request, Skill $skill): RedirectResponse
    {
        $data = ['title' => $request->validated('title')];

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

    public function resumeUpdate(UpdateResumeRequest $request): RedirectResponse
    {
        $path = $request->file('cv')->store('resumes', 'public');

        $this->saveSetting('cv', 'storage/' . $path);

        return redirect()->route('dashboard.page-settings')->with('success', 'رزومه با موفقیت بارگذاری شد');
    }

    public function softSkillsUpdate(UpdateSoftSkillsRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $this->saveSetting('soft_skills', $validated['soft_skills'] ?? '');

        return redirect()->route('dashboard.page-settings')->with('success', 'مهارت‌های فردی با موفقیت به‌روزرسانی شد');
    }

    public function socialLinksEdit(): View
    {
        $pageSetting = $this->settingsObject();

        return view('Frontend.dashboard.social-links', compact('pageSetting'));
    }

    public function socialStore(UpdateSocialLinksRequest $request): RedirectResponse
    {
        return $this->socialLinksUpdate($request);
    }

    public function socialLinksUpdate(UpdateSocialLinksRequest $request): RedirectResponse
    {
        $validated = $request->validated();

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
