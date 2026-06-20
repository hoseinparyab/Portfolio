@extends('Frontend.layouts.dashboard')

@section('title', 'ویرایش دسته بندی | مدیریت')

@section('vite')
    @vite(['resources/js/frontend/dashboard.js', 'resources/js/frontend/dashboard-categories.js'])
@endsection

@section('content')
    <div class="grid w-[100%]">

        @include('Frontend.partials.spacing')

        <h2 class="text-lg font-semibold mb-4">ویرایش دسته‌بندی</h2>

        <form action="{{ route('dashboard.categories.update', $category->id) }}" method="POST" class="mx-auto w-full mb-8">
            @csrf
            @method('PUT')

            <div class="flex flex-row gap-4 items-center w-full">
                <div class="mb-5 w-full">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        عنوان دسته‌بندی
                    </label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        value="{{ old('name', $category->name) }}"
                        placeholder="نام دسته‌بندی"
                        class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required
                    >
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="color" class="block text-sm font-medium mb-2 dark:text-white">
                        رنگ دسته‌بندی
                    </label>
                    <input
                        type="color"
                        name="color"
                        id="color"
                        value="{{ old('color', $category->color ?? '#2563eb') }}"
                        class="p-1 h-10 w-14 block bg-white border border-gray-200 cursor-pointer rounded-lg"
                        title="Choose your color"
                    >
                    @error('color')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mb-5">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    توضیحات دسته بندی
                </label>
                <textarea
                    name="description"
                    id="description"
                    rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="توضیحات دسته بندی"
                    required
                >{{ old('description', $category->description) }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-2">
                <a
                    href="{{ route('dashboard.categories') }}"
                    class="cursor-pointer text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                >
                    بازگشت
                </a>

                <button
                    type="submit"
                    class="cursor-pointer text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                >
                    ذخیره تغییرات
                </button>
            </div>
        </form>

    </div>
@endsection
