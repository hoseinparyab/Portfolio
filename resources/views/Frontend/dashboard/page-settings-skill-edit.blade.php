@extends('Frontend.layouts.dashboard')

@section('title', 'ویرایش مهارت | مدیریت')

@section('vite')
    @vite(['resources/js/frontend/dashboard.js'])
@endsection

@section('content')
    <div class="grid w-[100%]">
        @include('Frontend.partials.spacing')

        <h2 class="text-lg font-semibold mb-4">ویرایش مهارت</h2>

        <form action="{{ route('dashboard.page-settings.skills.update', $skill->id) }}" method="POST"
            enctype="multipart/form-data" class="mx-auto w-full mb-10">
            @csrf
            @method('PUT')

            <div class="flex flex-row md:flex-row gap-4 justify-stretch items-center flex-wrap">
                <div class="mb-5 flex-1">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        عنوان مهارت
                    </label>
                    <input type="text" name="title" id="title" value="{{ old('title', $skill->title) }}"
                        class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" />
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5 flex-1">
                    <label for="icon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        لوگوی نرم‌افزار
                    </label>
                    @if($skill->icon)
                        <img src="{{ asset($skill->icon) }}" alt="{{ $skill->title }}"
                            class="w-12 h-12 object-contain mb-3" />
                    @endif
                    @include('Frontend.partials.file-input', [
                        'name' => 'icon',
                        'accept' => 'image/png,image/jpeg,image/svg+xml,image/webp',
                        'buttonText' => 'تغییر لوگو',
                        'placeholder' => 'لوگوی جدید انتخاب نشده',
                    ])
                    @error('icon')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex gap-2">
                <a href="{{ route('dashboard.page-settings.skills') }}"
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
