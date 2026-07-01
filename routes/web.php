<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\CommentsController;
use App\Http\Controllers\Dashboard\PageSettingsController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Route;

//Frontend
Route::get('/', fn() => view('Frontend.pages.home'))->name('home');
Route::get('/portfolios', fn() => view('Frontend.pages.portfolios'))->name('portfolios');
Route::get('/blog', fn() => view('Frontend.pages.posts-archive'))->name('posts.archive');
Route::get('/blog/{slug}', fn() => view('Frontend.pages.single-post'))->name('posts.show');
Route::get('/404', fn() => view('Frontend.pages.404'))->name('errors.404');

//Dashboard
Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', fn() => view('Frontend.dashboard.login'))->name('login');
        Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
    });

    Route::middleware('auth')->group(function () {
        //Posts
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
        Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
        Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
        Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
        Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
        Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
        Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
        //Categories
        Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
        Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
        Route::get('/comments', [CommentsController::class, 'index'])->name('comments');
        Route::patch('/comments/{comment}/approve', [CommentsController::class, 'approve'])->name('comments.approve');
        Route::patch('/comments/{comment}/spam', [CommentsController::class, 'spam'])->name('comments.spam');
        Route::delete('/comments/{comment}', [CommentsController::class, 'destroy'])->name('comments.destroy');
        Route::get('/page-settings', [PageSettingsController::class, 'index'])->name('page-settings');
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
        //Page Settings
        Route::get('/account-settings', fn() => view('Frontend.dashboard.account-settings'))->name('account-settings');
        Route::get('/page-settings/intro', [PageSettingsController::class, 'intro'])->name('page-settings.intro');
        Route::get('/page-settings/portfolio', [PageSettingsController::class, 'portfolio'])->name('page-settings.portfolio');
        Route::get('/page-settings/blog', [PageSettingsController::class, 'blog'])->name('page-settings.blog');
        Route::put('/page-settings/intro', [PageSettingsController::class, 'introUpdate'])->name('page-settings.intro.update');
        Route::put('/page-settings/portfolio', [PageSettingsController::class, 'portfolioUpdate'])->name('page-settings.portfolio.update');
        Route::put('/page-settings/blog', [PageSettingsController::class, 'blogUpdate'])->name('page-settings.blog.update');
        Route::get('/page-settings/educations', fn() => redirect()->route('dashboard.page-settings'));
        Route::post('/page-settings/educations', [PageSettingsController::class, 'educationsStore'])->name('page-settings.educations.store');
        Route::get('/page-settings/educations/{education}/edit', [PageSettingsController::class, 'educationsEdit'])->name('page-settings.educations.edit');
        Route::put('/page-settings/educations/{education}', [PageSettingsController::class, 'educationsUpdate'])->name('page-settings.educations.update');
        Route::delete('/page-settings/educations/{education}', [PageSettingsController::class, 'educationsDestroy'])->name('page-settings.educations.destroy');
        Route::get('/page-settings/experiences', [PageSettingsController::class, 'experiencesIndex'])->name('page-settings.experiences');
        Route::post('/page-settings/experiences', [PageSettingsController::class, 'experiencesStore'])->name('page-settings.experiences.store');
        Route::get('/page-settings/experiences/{experience}/edit', [PageSettingsController::class, 'experiencesEdit'])->name('page-settings.experiences.edit');
        Route::put('/page-settings/experiences/{experience}', [PageSettingsController::class, 'experiencesUpdate'])->name('page-settings.experiences.update');
        Route::delete('/page-settings/experiences/{experience}', [PageSettingsController::class, 'experiencesDestroy'])->name('page-settings.experiences.destroy');
        Route::get('/page-settings/skills', [PageSettingsController::class, 'skillsIndex'])->name('page-settings.skills');
        Route::post('/page-settings/skills', [PageSettingsController::class, 'skillsStore'])->name('page-settings.skills.store');
        Route::get('/page-settings/skills/{skill}/edit', [PageSettingsController::class, 'skillsEdit'])->name('page-settings.skills.edit');
        Route::put('/page-settings/skills/{skill}', [PageSettingsController::class, 'skillsUpdate'])->name('page-settings.skills.update');
        Route::delete('/page-settings/skills/{skill}', [PageSettingsController::class, 'skillsDestroy'])->name('page-settings.skills.destroy');
        Route::post('/page-settings/services', [PageSettingsController::class, 'servicesStore'])->name('page-settings.services.store');
        Route::get('/page-settings/services/{service}/edit', [PageSettingsController::class, 'servicesEdit'])->name('page-settings.services.edit');
        Route::put('/page-settings/services/{service}', [PageSettingsController::class, 'servicesUpdate'])->name('page-settings.services.update');
        Route::delete('/page-settings/services/{service}', [PageSettingsController::class, 'servicesDestroy'])->name('page-settings.services.destroy');
        Route::get('/page-settings/languages', fn() => redirect()->route('dashboard.page-settings'));
        Route::post('/page-settings/languages', [PageSettingsController::class, 'languagesStore'])->name('page-settings.languages.store');
        Route::get('/page-settings/languages/{language}/edit', [PageSettingsController::class, 'languagesEdit'])->name('page-settings.languages.edit');
        Route::put('/page-settings/languages/{language}', [PageSettingsController::class, 'languagesUpdate'])->name('page-settings.languages.update');
        Route::delete('/page-settings/languages/{language}', [PageSettingsController::class, 'languagesDestroy'])->name('page-settings.languages.destroy');
        Route::get('/page-settings/resume', fn() => redirect()->route('dashboard.page-settings'));
        Route::put('/page-settings/resume', [PageSettingsController::class, 'resumeUpdate'])->name('page-settings.resume.update');
        Route::get('/page-settings/soft-skills', fn() => redirect()->route('dashboard.page-settings'));
        Route::put('/page-settings/soft-skills', [PageSettingsController::class, 'softSkillsUpdate'])->name('page-settings.soft-skills.update');
        Route::post('/page-settings/projects', [PageSettingsController::class, 'projectsStore'])->name('page-settings.projects.store');
        Route::get('/page-settings/projects/{project}/edit', [PageSettingsController::class, 'projectsEdit'])->name('page-settings.projects.edit');
        Route::put('/page-settings/projects/{project}', [PageSettingsController::class, 'projectsUpdate'])->name('page-settings.projects.update');
        Route::delete('/page-settings/projects/{project}', [PageSettingsController::class, 'projectsDestroy'])->name('page-settings.projects.destroy');
        Route::post('/page-settings/testimonials', [PageSettingsController::class, 'testimonialsStore'])->name('page-settings.testimonials.store');
        Route::get('/page-settings/testimonials/{testimonial}/edit', [PageSettingsController::class, 'testimonialsEdit'])->name('page-settings.testimonials.edit');
        Route::put('/page-settings/testimonials/{testimonial}', [PageSettingsController::class, 'testimonialsUpdate'])->name('page-settings.testimonials.update');
        Route::delete('/page-settings/testimonials/{testimonial}', [PageSettingsController::class, 'testimonialsDestroy'])->name('page-settings.testimonials.destroy');
        Route::post('/page-settings/contact', [PageSettingsController::class, 'contactStore'])->name('page-settings.contact.store');
        Route::get('/page-settings/contact/edit', [PageSettingsController::class, 'contactEdit'])->name('page-settings.contact.edit');
        Route::put('/page-settings/contact', [PageSettingsController::class, 'contactUpdate'])->name('page-settings.contact.update');
        Route::delete('/page-settings/contact', [PageSettingsController::class, 'contactDestroy'])->name('page-settings.contact.destroy');
        Route::post('/page-settings/social-links', [PageSettingsController::class, 'socialStore'])->name('page-settings.social-links.store');
        Route::get('/page-settings/social-links', [PageSettingsController::class, 'socialLinksEdit'])->name('page-settings.social-links');
        Route::put('/page-settings/social-links', [PageSettingsController::class, 'socialLinksUpdate'])->name('page-settings.social-links.update');
        Route::delete('/page-settings/social-links', [PageSettingsController::class, 'socialLinksDestroy'])->name('page-settings.social-links.destroy');
        Route::post('/page-settings/footer-social-links', [PageSettingsController::class, 'footerSocialLinksStore'])->name('page-settings.footer-social-links.store');
        Route::get('/page-settings/footer-social-links/edit', [PageSettingsController::class, 'footerSocialLinksEdit'])->name('page-settings.footer-social-links.edit');
        Route::put('/page-settings/footer-social-links', [PageSettingsController::class, 'footerSocialLinksUpdate'])->name('page-settings.footer-social-links.update');
        Route::delete('/page-settings/footer-social-links', [PageSettingsController::class, 'footerSocialLinksDestroy'])->name('page-settings.footer-social-links.destroy');
        Route::post('/page-settings/footer-contact-info', [PageSettingsController::class, 'footerContactInfoStore'])->name('page-settings.footer-contact-info.store');
        Route::get('/page-settings/footer-contact-info/edit', [PageSettingsController::class, 'footerContactInfoEdit'])->name('page-settings.footer-contact-info.edit');
        Route::put('/page-settings/footer-contact-info', [PageSettingsController::class, 'footerContactInfoUpdate'])->name('page-settings.footer-contact-info.update');
        Route::delete('/page-settings/footer-contact-info', [PageSettingsController::class, 'footerContactInfoDestroy'])->name('page-settings.footer-contact-info.destroy');
        //Page Settings End

    });
});
