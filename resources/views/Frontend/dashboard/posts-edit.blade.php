@extends('Frontend.layouts.dashboard')

@section('title', 'ویرایش پست | مدیریت')

@section('vite')
    @vite(['resources/js/frontend/dashboard.js', 'resources/js/frontend/dashboard-add-post.js'])
@endsection

@section('content')
    <div class="grid w-[100%]">

        @include('Frontend.partials.spacing')

    @include('Frontend.partials.spacing')
    <div class="grid w-full bg-[#202D38] p-5 rounded-lg">
        <h1 class="text-lg font-semibold mb-4 text-white">ویرایش نوشته</h1>

        <form action="{{ route('dashboard.posts.update', $post->id) }}" method="POST" class="mx-auto w-full">
            @csrf
            @method('PUT')

            <div class="mb-5">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    عنوان نوشته
                </label>
                <input
                    type="text"
                    name="title"
                    id="title"
                    value="{{ old('title', $post->title) }}"
                    placeholder="عنوان نوشته"
                    class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required
                >
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    محتوای نوشته
                </label>
                <textarea
                    name="content"
                    id="content"
                    rows="12"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="محتوای نوشته"
                    required
                >{{ old('content', $post->content) }}</textarea>
                @error('content')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="excerpt" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    خلاصه مطالب
                </label>
                <textarea
                    name="excerpt"
                    id="excerpt"
                    rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="خلاصه این نوشته"
                >{{ old('excerpt', $post->excerpt) }}</textarea>
                @error('excerpt')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col md:flex-row gap-4 mb-5">
                <div class="flex-1">
                    <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        وضعیت
                    </label>
                    <select
                        name="status"
                        id="status"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required
                    >
                        <option value="draft" @selected(old('status', $post->status) === 'draft')>پیش‌نویس</option>
                        <option value="published" @selected(old('status', $post->status) === 'published')>منتشر شده</option>
                    </select>
                    @error('status')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                @isset($categories)
                    <div class="flex-1">
                        <label for="categories" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            دسته‌بندی
                        </label>
                        <select
                            name="categories[]"
                            id="categories"
                            multiple
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        >
                            @foreach($categories as $category)
                                <option
                                    value="{{ $category->id }}"
                                    @selected(in_array($category->id, old('categories', $post->categories->pluck('id')->all())))
                                >
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('categories')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                @endisset
            </div>

            <div class="flex gap-2">
                <a
                    href="{{ route('dashboard.posts.index') }}"
                    class="cursor-pointer text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                >
                    بازگشت
                </a>

                <button
                    type="submit"
                    class="cursor-pointer text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                >
                    ذخیره تغییرات
                </button>
            </div>
        </form>
    </div>
    </div>
</div>
@endsection
