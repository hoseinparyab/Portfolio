@extends('Frontend.layouts.dashboard')

@section('title', 'ویرایش پروژه | مدیریت')

@section('vite')
    @vite(['resources/js/frontend/dashboard.js'])
@endsection

@section('content')
    <div class="grid w-[100%]">
        @include('Frontend.partials.spacing')

        <h2 class="text-lg font-semibold mb-4">ویرایش پروژه</h2>

        <form action="{{ route('dashboard.page-settings.projects.update', $project->id) }}" method="POST"
            enctype="multipart/form-data" class="mx-auto w-full mb-10">
            @csrf
            @method('PUT')

            <div class="grid md:grid-cols-2 gap-4">
                <div class="mb-5">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">عنوان پروژه</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $project->title) }}"
                        class="shadow-xs bg-[#364153] border border-gray-600 text-gray-100 placeholder-gray-400 text-sm rounded-lg block w-full p-2.5" />
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="project_url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">لینک پروژه</label>
                    <input type="url" name="project_url" id="project_url" value="{{ old('project_url', $project->project_url) }}"
                        class="shadow-xs bg-[#364153] border border-gray-600 text-gray-100 placeholder-gray-400 text-sm rounded-lg block w-full p-2.5" />
                    @error('project_url')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">وضعیت</label>
                    <select name="status" id="status"
                        class="bg-[#364153] border border-gray-600 text-gray-100 text-sm rounded-lg block w-full p-2.5">
                        <option value="draft" @selected(old('status', $project->status) === 'draft')>پیش‌نویس</option>
                        <option value="published" @selected(old('status', $project->status) === 'published')>منتشر شده</option>
                        <option value="archived" @selected(old('status', $project->status) === 'archived')>بایگانی</option>
                    </select>
                    @error('status')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="featured_image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        تصویر شاخص
                    </label>
                    @if($project->featured_image)
                        <img src="{{ asset($project->featured_image) }}" alt="{{ $project->title }}"
                            class="w-20 h-20 object-cover rounded mb-3" />
                    @endif
                    @include('Frontend.partials.file-input', [
                        'name' => 'featured_image',
                        'accept' => 'image/png,image/jpeg,image/webp',
                        'buttonText' => 'تغییر تصویر',
                        'placeholder' => 'تصویر جدید انتخاب نشده',
                    ])
                    @error('featured_image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5 md:col-span-2">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">توضیحات</label>
                    <textarea name="description" id="description" rows="4"
                        class="shadow-xs bg-[#364153] border border-gray-600 text-gray-100 placeholder-gray-400 text-sm rounded-lg block w-full p-2.5">{{ old('description', $project->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex gap-2">
                <a href="{{ route('dashboard.page-settings.projects') }}"
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
