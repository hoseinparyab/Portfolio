<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $postCategories = [
            ['name' => 'جاوااسکریپت', 'slug' => 'javascript', 'description' => 'آموزش و مقالات جاوااسکریپت'],
            ['name' => 'React و Next', 'slug' => 'react-next', 'description' => 'مقالات React و Next.js'],
            ['name' => 'اخبار تکنولوژی', 'slug' => 'tech-news', 'description' => 'آخرین اخبار دنیای تکنولوژی'],
        ];

        foreach ($postCategories as $index => $category) {
            Category::query()->updateOrCreate(
                ['slug' => $category['slug']],
                [
                    ...$category,
                    'type' => 'post',
                    'order' => $index + 1,
                    'is_visible' => true,
                ]
            );
        }

        $portfolioCategories = [
            ['name' => 'طراحی وب', 'slug' => 'web-design', 'description' => 'پروژه‌های طراحی وب'],
            ['name' => 'اپلیکیشن موبایل', 'slug' => 'mobile-app', 'description' => 'پروژه‌های موبایل'],
            ['name' => 'برندینگ', 'slug' => 'branding', 'description' => 'پروژه‌های برندینگ و UI'],
        ];

        foreach ($portfolioCategories as $index => $category) {
            Category::query()->updateOrCreate(
                ['slug' => $category['slug']],
                [
                    ...$category,
                    'type' => 'portfolio',
                    'order' => $index + 1,
                    'is_visible' => true,
                ]
            );
        }
    }
}
