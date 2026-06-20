<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $author = User::query()->where('email', 'admin@portfolio.test')->first();

        if (! $author) {
            return;
        }

        $posts = [
            [
                'title' => 'مزیت‌های فریمورک Next Js نسبت به React',
                'slug' => 'nextjs-advantages-over-react',
                'excerpt' => 'بررسی مزایای Next.js برای پروژه‌های مدرن وب',
                'content' => 'Next.js با قابلیت‌های SSR و routing داخلی، توسعه اپلیکیشن React را ساده‌تر می‌کند.',
                'status' => 'published',
                'published_at' => now()->subDays(5),
                'reading_time' => 6,
                'view_count' => 120,
                'is_featured' => true,
                'categories' => ['react-next'],
            ],
            [
                'title' => 'معرفی کتابخانه B-Crypt برای Express JS',
                'slug' => 'bcrypt-express-js',
                'excerpt' => 'آموزش هش کردن رمز عبور در Express',
                'content' => 'bcrypt یکی از محبوب‌ترین کتابخانه‌ها برای هش امن رمز عبور در Node.js است.',
                'status' => 'published',
                'published_at' => now()->subDays(12),
                'reading_time' => 8,
                'view_count' => 95,
                'is_featured' => false,
                'categories' => ['javascript'],
            ],
            [
                'title' => 'آموزش ریدایرکت کردن به صفحه ورود در Next Js',
                'slug' => 'nextjs-login-redirect',
                'excerpt' => 'پیاده‌سازی محافظت از routeها در Next.js',
                'content' => 'با middleware می‌توانید کاربران غیرمجاز را به صفحه ورود هدایت کنید.',
                'status' => 'published',
                'published_at' => now()->subDays(20),
                'reading_time' => 5,
                'view_count' => 78,
                'is_featured' => false,
                'categories' => ['react-next', 'javascript'],
            ],
            [
                'title' => 'پیش‌نویس: معماری API در لاراول',
                'slug' => 'laravel-api-architecture-draft',
                'excerpt' => 'این پست هنوز منتشر نشده است',
                'content' => 'محتوای پیش‌نویس برای تست وضعیت draft.',
                'status' => 'draft',
                'published_at' => null,
                'reading_time' => 10,
                'view_count' => 0,
                'is_featured' => false,
                'categories' => ['tech-news'],
            ],
        ];

        foreach ($posts as $postData) {
            $categorySlugs = $postData['categories'];
            unset($postData['categories']);

            $post = Post::query()->updateOrCreate(
                ['slug' => $postData['slug']],
                [
                    ...$postData,
                    'user_id' => $author->id,
                    'featured_image' => 'src/img/blogpost1.webp',
                ]
            );

            $categoryIds = Category::query()
                ->whereIn('slug', $categorySlugs)
                ->where('type', 'post')
                ->pluck('id');

            $post->categories()->sync($categoryIds);
        }
    }
}
