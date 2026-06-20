<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            'site_name' => 'بنتوفولیو',
            'site_tagline' => 'رزومه آنلاین',
            'contact_email' => 'hello@portfolio.test',
            'footer_text' => 'طراحی و اجرا توسط تیم توسعه ناجینو',
            'social_instagram' => 'https://instagram.com',
            'social_linkedin' => 'https://linkedin.com',
            'social_youtube' => 'https://youtube.com',
            'social_whatsapp' => 'https://wa.me',
        ];

        foreach ($settings as $key => $value) {
            Setting::query()->updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }
    }
}
