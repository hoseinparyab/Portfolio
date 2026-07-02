@extends('Frontend.layouts.dashboard')

@section('title', 'ارتباط با من | مدیریت')

@section('vite')
    @vite(['resources/js/frontend/dashboard.js'])
@endsection

@section('content')
    <div class="grid w-[100%]">
        @include('Frontend.partials.spacing')

        <h2 class="text-lg font-semibold mb-4">راه‌های ارتباطی</h2>

        <form action="{{ route('dashboard.page-settings.contact-me.update') }}" method="POST"
            class="mx-auto w-full mb-10">
            @csrf
            @method('PUT')

            <div class="grid md:grid-cols-2 gap-4">
                <div class="mb-5">
                    <label for="contact_email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        ایمیل
                    </label>
                    <input type="email" name="contact_email" id="contact_email"
                        value="{{ old('contact_email', $settings->contact_email ?? '') }}"
                        placeholder="hello@example.com"
                        class="shadow-xs bg-[#364153] border border-gray-600 text-gray-100 placeholder-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                    @error('contact_email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="contact_phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        شماره تماس
                    </label>
                    <input type="text" name="contact_phone" id="contact_phone"
                        value="{{ old('contact_phone', $settings->contact_phone ?? '') }}"
                        placeholder="09123456789"
                        class="shadow-xs bg-[#364153] border border-gray-600 text-gray-100 placeholder-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                    @error('contact_phone')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <h3 class="text-base font-semibold mb-4 mt-2">شبکه‌های اجتماعی</h3>

            <div class="grid md:grid-cols-2 gap-4">
                <div class="mb-5">
                    <label for="social_instagram" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        اینستاگرام
                    </label>
                    <input type="url" name="social_instagram" id="social_instagram"
                        value="{{ old('social_instagram', $settings->social_instagram ?? '') }}"
                        placeholder="https://instagram.com/username"
                        class="shadow-xs bg-[#364153] border border-gray-600 text-gray-100 placeholder-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                    @error('social_instagram')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="social_linkedin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        لینکدین
                    </label>
                    <input type="url" name="social_linkedin" id="social_linkedin"
                        value="{{ old('social_linkedin', $settings->social_linkedin ?? '') }}"
                        placeholder="https://linkedin.com/in/username"
                        class="shadow-xs bg-[#364153] border border-gray-600 text-gray-100 placeholder-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                    @error('social_linkedin')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="social_youtube" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        یوتیوب
                    </label>
                    <input type="url" name="social_youtube" id="social_youtube"
                        value="{{ old('social_youtube', $settings->social_youtube ?? '') }}"
                        placeholder="https://youtube.com/@channel"
                        class="shadow-xs bg-[#364153] border border-gray-600 text-gray-100 placeholder-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                    @error('social_youtube')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="social_whatsapp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        واتساپ
                    </label>
                    <input type="url" name="social_whatsapp" id="social_whatsapp"
                        value="{{ old('social_whatsapp', $settings->social_whatsapp ?? '') }}"
                        placeholder="https://wa.me/989123456789"
                        class="shadow-xs bg-[#364153] border border-gray-600 text-gray-100 placeholder-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                    @error('social_whatsapp')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="social_telegram" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        تلگرام
                    </label>
                    <input type="url" name="social_telegram" id="social_telegram"
                        value="{{ old('social_telegram', $settings->social_telegram ?? '') }}"
                        placeholder="https://t.me/username"
                        class="shadow-xs bg-[#364153] border border-gray-600 text-gray-100 placeholder-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                    @error('social_telegram')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="social_github" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        گیت‌هاب
                    </label>
                    <input type="url" name="social_github" id="social_github"
                        value="{{ old('social_github', $settings->social_github ?? '') }}"
                        placeholder="https://github.com/username"
                        class="shadow-xs bg-[#364153] border border-gray-600 text-gray-100 placeholder-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                    @error('social_github')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex gap-2">
                <a href="{{ route('dashboard.page-settings') }}"
                    class="cursor-pointer text-white bg-gray-700 hover:bg-gray-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    بازگشت
                </a>
                <button type="submit"
                    class="cursor-pointer text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    ذخیره
                </button>
            </div>
        </form>
    </div>
@endsection
