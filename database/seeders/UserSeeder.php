<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->updateOrCreate(
            ['email' => 'admin@portfolio.test'],
            [
                'name'     => 'برهان مرتضوی',
                'password' => Hash::make('password'),
                'role'     => 'admin',
                'status'   => 'active',
                'bio'      => 'برنامه‌نویس فول‌استک و طراح گرافیک',
            ]
        );

        User::query()->updateOrCreate(
            ['email' => 'editor@portfolio.test'],
            [
                'name'     => 'ویرایشگر سایت',
                'password' => Hash::make('password'),
                'role'     => 'editor',
                'status'   => 'active',
            ]
        );
    }
}
