<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    public function run(): void
    {
        $post = Post::query()->where('slug', 'bcrypt-express-js')->first();
        $user = User::query()->where('email', 'editor@portfolio.test')->first();

        if (! $post) {
            return;
        }

        Comment::query()->updateOrCreate(
            [
                'post_id' => $post->id,
                'email' => 'reader1@example.com',
            ],
            [
                'name' => 'علی رضایی',
                'content' => 'آموزش خیلی کاربردی بود، ممنون!',
                'status' => 'approved',
                'user_id' => null,
            ]
        );

        if ($user) {
            Comment::query()->updateOrCreate(
                [
                    'post_id' => $post->id,
                    'user_id' => $user->id,
                ],
                [
                    'name' => $user->name,
                    'email' => $user->email,
                    'content' => 'پیشنهاد می‌کنم بخش salt rounds را هم اضافه کنید.',
                    'status' => 'approved',
                ]
            );
        }

        Comment::query()->updateOrCreate(
            [
                'post_id' => $post->id,
                'email' => 'guest@example.com',
            ],
            [
                'name' => 'مهمان',
                'content' => 'منتظر ادامه این سری آموزشی هستم.',
                'status' => 'pending',
                'user_id' => null,
            ]
        );
    }
}
