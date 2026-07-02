@extends('Frontend.layouts.dashboard')

@section('title', 'پروژه‌ها | مدیریت')

@section('vite')
    @vite(['resources/js/frontend/dashboard.js'])
@endsection

@section('content')
    <div class="grid w-[100%]">
        @include('Frontend.partials.spacing')

        <h2 class="text-lg font-semibold mb-4">مدیریت پروژه‌ها</h2>

        <form action="{{ route('dashboard.page-settings.projects.store') }}" method="POST"
            enctype="multipart/form-data" class="mx-auto w-full mb-10">
            @csrf

            <div class="grid md:grid-cols-2 gap-4">
                <div class="mb-5">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        عنوان پروژه
                    </label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}"
                        placeholder="وب‌سایت فروشگاهی"
                        class="shadow-xs bg-[#364153] border border-gray-600 text-gray-100 placeholder-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="project_url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        لینک پروژه
                    </label>
                    <input type="url" name="project_url" id="project_url" value="{{ old('project_url') }}"
                        placeholder="https://example.com"
                        class="shadow-xs bg-[#364153] border border-gray-600 text-gray-100 placeholder-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                    @error('project_url')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        وضعیت
                    </label>
                    <select name="status" id="status"
                        class="bg-[#364153] border border-gray-600 text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="draft" @selected(old('status') === 'draft')>پیش‌نویس</option>
                        <option value="published" @selected(old('status', 'published') === 'published')>منتشر شده</option>
                        <option value="archived" @selected(old('status') === 'archived')>بایگانی</option>
                    </select>
                    @error('status')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="featured_image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        تصویر شاخص
                    </label>
                    @include('Frontend.partials.file-input', [
                        'name' => 'featured_image',
                        'accept' => 'image/png,image/jpeg,image/webp',
                        'buttonText' => 'انتخاب تصویر',
                        'hint' => 'PNG, JPG یا WEBP (حداکثر ۵ مگابایت)',
                    ])
                    @error('featured_image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5 md:col-span-2">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        توضیحات
                    </label>
                    <textarea name="description" id="description" rows="4" placeholder="توضیح کوتاه پروژه..."
                        class="shadow-xs bg-[#364153] border border-gray-600 text-gray-100 placeholder-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">{{ old('description') }}</textarea>
                    @error('description')
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
                    افزودن پروژه
                </button>
            </div>
        </form>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-10 bg-[#364153] p-4">
            <table class="w-full text-sm text-left rtl:text-right text-gray-300 rounded overflow-hidden">
                <thead class="text-xs text-gray-300 uppercase bg-[#2f3847]">
                    <tr>
                        <th class="px-6 py-3">پروژه</th>
                        <th class="px-6 py-3">وضعیت</th>
                        <th class="px-6 py-3">عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $project)
                        <tr class="bg-[#364153] border-b border-gray-600 hover:bg-[#3f4d62]">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-4">
                                    @if($project->featured_image)
                                        <img src="{{ asset($project->featured_image) }}" alt="{{ $project->title }}"
                                            class="w-12 h-12 object-cover rounded" />
                                    @endif
                                    <div>
                                        <div class="text-gray-100">{{ $project->title }}</div>
                                        @if($project->project_url)
                                            <a href="{{ $project->project_url }}" target="_blank"
                                                class="text-blue-400 text-xs hover:underline">
                                                {{ $project->project_url }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                @switch($project->status)
                                    @case('published')
                                        منتشر شده
                                        @break
                                    @case('archived')
                                        بایگانی
                                        @break
                                    @default
                                        پیش‌نویس
                                @endswitch
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex gap-2">
                                    <a href="{{ route('dashboard.page-settings.projects.edit', $project->id) }}"
                                        class="font-medium text-blue-400 cursor-pointer">ویرایش</a>
                                    <form action="{{ route('dashboard.page-settings.projects.destroy', $project->id) }}"
                                        method="POST" onsubmit="return confirm('از حذف این پروژه مطمئن هستید؟')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="font-medium text-red-400 cursor-pointer">حذف</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center text-gray-400">
                                هنوز هیچ پروژه‌ای ثبت نشده است.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
