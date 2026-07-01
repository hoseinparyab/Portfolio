@extends('Frontend.layouts.dashboard')

@section('title', 'لینک‌های اجتماعی | مدیریت')

@section('vite')
    @vite(['resources/js/frontend/dashboard.js'])
@endsection

@section('content')
    <div class="grid w-[100%]">
        @include('Frontend.partials.spacing')

        <h2 class="text-lg font-semibold mb-4">مدیریت لینک‌های اجتماعی</h2>

        <form action="{{ route('dashboard.page-settings.social-links.update') }}" method="POST"
            enctype="multipart/form-data" class="mx-auto w-full mb-10">
            @csrf
            @method('PUT')

            <div class="grid md:grid-cols-2 gap-4">
                <div class="mb-5">
                    <label for="github_url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        لینک گیت‌هاب
                    </label>
                    <input type="url" name="github_url" id="github_url"
                        value="{{ old('github_url', $pageSetting->github_url ?? '') }}"
                        placeholder="https://github.com/username"
                        class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    @error('github_url')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="github_icon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        آیکون گیت‌هاب
                    </label>
                    @include('Frontend.partials.file-input', [
                        'name' => 'github_icon',
                        'accept' => 'image/*',
                        'hint' => 'PNG, JPG, SVG یا GIF (حداکثر ۲ مگابایت)',
                    ])
                    @error('github_icon')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="linkedin_url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        لینک لینکدین
                    </label>
                    <input type="url" name="linkedin_url" id="linkedin_url"
                        value="{{ old('linkedin_url', $pageSetting->linkedin_url ?? '') }}"
                        placeholder="https://linkedin.com/in/username"
                        class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    @error('linkedin_url')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="linkedin_icon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        آیکون لینکدین
                    </label>
                    @include('Frontend.partials.file-input', [
                        'name' => 'linkedin_icon',
                        'accept' => 'image/*',
                        'hint' => 'PNG, JPG, SVG یا GIF (حداکثر ۲ مگابایت)',
                    ])
                    @error('linkedin_icon')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex gap-2">
                <a href="{{ route('dashboard.page-settings') }}"
                    class="cursor-pointer text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    بازگشت
                </a>
                <button type="submit"
                    class="cursor-pointer text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    ذخیره لینک‌ها
                </button>
            </div>
        </form>
    </div>
@endsection
