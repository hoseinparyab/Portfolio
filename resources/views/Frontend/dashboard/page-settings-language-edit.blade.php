@extends('Frontend.layouts.dashboard')

@section('title', 'ویرایش زبان | مدیریت')

@section('vite')
    @vite(['resources/js/frontend/dashboard.js', 'resources/js/frontend/dashboard-page-settings.js'])
@endsection

@section('content')
    <div class="grid w-[100%]">
        @include('Frontend.partials.spacing')

        <h2 class="text-lg font-semibold mb-4">ویرایش زبان</h2>

        <form action="{{ route('dashboard.page-settings.languages.update', $language->id) }}" method="POST" class="mx-auto w-full mb-8">
            @csrf
            @method('PUT')

            <div class="flex flex-row md:flex-row gap-4 justify-stretch items-center flex-wrap">
                <div class="mb-5 flex-1">
                    <label for="language" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">زبان</label>
                    <input type="text" name="language" id="language" value="{{ old('language', $language->language) }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                </div>

                <div class="mb-5 flex-1">
                    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">سطح</label>
                    <select name="level" id="level" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                        @foreach (['A1', 'A2', 'B1', 'B2', 'C1', 'C2 (Native)'] as $level)
                            <option value="{{ $level }}" @selected(old('level', $language->level) === $level)>{{ $level }}</option>
                        @endforeach
                    </select>
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
