<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        Page::query()->updateOrCreate(
            ['slug' => 'about'],
            [
                'title' => 'درباره من',
                'excerpt' => 'معرفی کوتاه برهان مرتضوی',
                'content' => 'برنامه‌نویس فول‌استک با تخصص در Laravel، React و طراحی رابط کاربری.',
                'meta_title' => 'درباره من | بنتوفولیو',
                'meta_description' => 'معرفی مهارت‌ها و تجربه کاری',
            ]
        );

        Page::query()->updateOrCreate(
            ['slug' => 'contact'],
            [
                'title' => 'تماس با من',
                'excerpt' => 'راه‌های ارتباطی',
                'content' => 'برای همکاری پروژه‌ای می‌توانید از فرم تماس یا ایمیل استفاده کنید.',
                'meta_title' => 'تماس | بنتوفولیو',
                'meta_description' => 'ارتباط با تیم توسعه',
            ]
        );
    }
}
