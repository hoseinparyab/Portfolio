<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Portfolio;
use App\Models\User;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        $author = User::query()->where('email', 'admin@portfolio.test')->first();

        if (! $author) {
            return;
        }

        $portfolios = [
            [
                'title' => 'وب‌سایت فروشگاهی مدرن',
                'slug' => 'modern-ecommerce-website',
                'description' => 'طراحی و توسعه فروشگاه آنلاین با Next.js و Laravel',
                'featured_image' => 'src/img/Portfolio1.jpg',
                'project_url' => 'https://example.com/project-1',
                'status' => 'published',
                'order' => 1,
                'view_count' => 45,
                'is_featured' => true,
                'categories' => ['web-design'],
            ],
            [
                'title' => 'داشبورد مدیریت محتوا',
                'slug' => 'content-management-dashboard',
                'description' => 'پنل مدیریت با Tailwind و Blade',
                'featured_image' => 'src/img/Portfolio2.jpg',
                'project_url' => 'https://example.com/project-2',
                'status' => 'published',
                'order' => 2,
                'view_count' => 38,
                'is_featured' => true,
                'categories' => ['web-design'],
            ],
            [
                'title' => 'اپلیکیشن رزرو نوبت',
                'slug' => 'appointment-booking-app',
                'description' => 'اپ موبایل برای رزرو آنلاین خدمات',
                'featured_image' => 'src/img/Portfolio3.jpg',
                'project_url' => 'https://example.com/project-3',
                'status' => 'published',
                'order' => 3,
                'view_count' => 52,
                'is_featured' => false,
                'categories' => ['mobile-app'],
            ],
            [
                'title' => 'هویت بصری استارتاپ',
                'slug' => 'startup-brand-identity',
                'description' => 'طراحی لوگو، رنگ و سیستم طراحی برند',
                'featured_image' => 'src/img/Portfolio4.jpg',
                'project_url' => 'https://example.com/project-4',
                'status' => 'published',
                'order' => 4,
                'view_count' => 29,
                'is_featured' => false,
                'categories' => ['branding'],
            ],
            [
                'title' => 'لندینگ پیج محصول SaaS',
                'slug' => 'saas-product-landing',
                'description' => 'صفحه فرود با تمرکز بر تبدیل کاربر',
                'featured_image' => 'src/img/Portfolio5.jpg',
                'project_url' => 'https://example.com/project-5',
                'status' => 'published',
                'order' => 5,
                'view_count' => 61,
                'is_featured' => true,
                'categories' => ['web-design', 'branding'],
            ],
        ];

        foreach ($portfolios as $portfolioData) {
            $categorySlugs = $portfolioData['categories'];
            unset($portfolioData['categories']);

            $portfolio = Portfolio::query()->updateOrCreate(
                ['slug' => $portfolioData['slug']],
                [
                    ...$portfolioData,
                    'user_id' => $author->id,
                ]
            );

            $categoryIds = Category::query()
                ->whereIn('slug', $categorySlugs)
                ->where('type', 'portfolio')
                ->pluck('id');

            $portfolio->categories()->sync($categoryIds);
        }
    }
}
