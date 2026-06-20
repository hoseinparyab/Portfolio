@extends('Frontend.layouts.dashboard')

@section('title', 'دسته بندی ها | مدیریت')

@section('vite')
    @vite(['resources/js/frontend/dashboard.js', 'resources/js/frontend/dashboard-categories.js'])
@endsection

@section('content')
    <div class="grid w-[100%]">

        @include('Frontend.partials.spacing')

        <h2 class="text-lg font-semibold mb-4">افزودن دسته‌بندی</h2>

        <form action="{{ route('dashboard.categories.store') }}" method="POST" class="mx-auto w-full mb-8">
            @csrf

            <div class="flex flex-row gap-4 items-center w-full">
                <div class="mb-5 w-full">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        عنوان دسته‌بندی
                    </label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                        placeholder="نام دسته‌بندی"
                        class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required>
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="color" class="block text-sm font-medium mb-2 dark:text-white">
                        رنگ دسته‌بندی
                    </label>
                    <input type="color" name="color" id="color" value="{{ old('color', '#2563eb') }}"
                        class="p-1 h-10 w-14 block bg-white border border-gray-200 cursor-pointer rounded-lg"
                        title="Choose your color">
                    @error('color')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mb-5">
                <label for="summary" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    توضیحات
                    <textarea name="summary" id="summary" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="توضیحات دسته بندی">{{ old('summary') }}</textarea>
                    @error('summary')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
            </div>

            <div class="flex gap-2">
                <button type="reset"
                    class="cursor-pointer text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    لغو
                </button>

                <button type="submit"
                    class="cursor-pointer text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    افزودن
                </button>
            </div>
        </form>

        <h2 class="text-lg font-semibold mb-4">دسته‌بندی‌ها</h2>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 rounded overflow-hidden">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">عنوان دسته‌بندی</th>
                        <th scope="col" class="px-6 py-3">رنگ</th>
                        <th scope="col" class="px-6 py-3">توضیحات دسته بندی</th>
                        <th scope="col" class="px-6 py-3">اسلاگ</th>
                        <th scope="col" class="px-6 py-3">تاریخ</th>
                        <th scope="col" class="px-6 py-3">عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                {{ $category->name }}
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="inline-block w-5 h-5 rounded-full border"
                                        style="background-color: {{ $category->color }};"></span>
                                    <span>{{ $category->color }}</span>
                                </div>
                            </td>

                            <td class="px-6 py-4">
                                {{ $category->description }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $category->slug }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $category->created_at ? $category->created_at->format('Y/m/d') : '-' }}
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex flex-row items-center justify-around gap-2">
                                    <a href="{{ route('dashboard.categories.edit', $category->id) }}"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline mx-2 my-2">
                                        ویرایش
                                    </a>
                                    <form action="{{ route('dashboard.categories.destroy', $category->id) }}" method="POST"
                                        onsubmit="return confirm('از حذف این دسته بندی مطمئن هستید؟')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit " class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                            حذف
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                هنوز هیچ دسته‌بندی ثبت نشده است.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
@endsection
