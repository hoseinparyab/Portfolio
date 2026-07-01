@extends('Frontend.layouts.dashboard')

@section('title', 'مهارت‌های نرم‌افزاری | مدیریت')

@section('vite')
    @vite(['resources/js/frontend/dashboard.js'])
@endsection

@section('content')
    <div class="grid w-[100%]">
        @include('Frontend.partials.spacing')

        <h2 class="text-lg font-semibold mb-4">مهارت‌های نرم‌افزاری</h2>

        <form action="{{ route('dashboard.page-settings.skills.store') }}" method="POST"
            enctype="multipart/form-data" class="mx-auto w-full mb-10">
            @csrf

            <div class="flex flex-row md:flex-row gap-4 justify-stretch items-center flex-wrap">
                <div class="mb-5 flex-1">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        عنوان مهارت
                    </label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}"
                        placeholder="Next.js"
                        class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" />
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5 flex-1">
                    <label for="icon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        لوگوی نرم‌افزار
                    </label>
                    @include('Frontend.partials.file-input', [
                        'name' => 'icon',
                        'accept' => 'image/png,image/jpeg,image/svg+xml,image/webp',
                        'buttonText' => 'انتخاب لوگو',
                        'hint' => 'SVG, PNG, JPG یا WEBP (حداکثر ۲ مگابایت)',
                    ])
                    @error('icon')
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
                    افزودن
                </button>
            </div>
        </form>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-10">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 rounded overflow-hidden">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-6 py-3">مهارت</th>
                        <th class="px-6 py-3">عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($skills as $skill)
                        <tr class="bg-white border-b border-gray-200 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-4">
                                    @if($skill->icon)
                                        <img src="{{ asset($skill->icon) }}" alt="{{ $skill->title }}"
                                            class="w-12 h-12 object-contain" />
                                    @endif
                                    <span class="text-gray-900 dark:text-white">{{ $skill->title }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex gap-2">
                                    <a href="{{ route('dashboard.page-settings.skills.edit', $skill->id) }}"
                                        class="font-medium text-blue-600 cursor-pointer">ویرایش</a>
                                    <form action="{{ route('dashboard.page-settings.skills.destroy', $skill->id) }}"
                                        method="POST" onsubmit="return confirm('از حذف این مهارت مطمئن هستید؟')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="font-medium text-red-600 cursor-pointer">حذف</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="px-6 py-4 text-center text-gray-500">
                                هنوز هیچ مهارتی ثبت نشده است.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
