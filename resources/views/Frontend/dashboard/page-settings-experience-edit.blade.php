@extends('Frontend.layouts.dashboard')

@section('title', 'ویرایش تجربه | مدیریت')

@section('vite')
    @vite(['resources/js/frontend/dashboard.js'])
@endsection

@section('content')
    <div class="grid w-[100%]">
        @include('Frontend.partials.spacing')

        <h2 class="text-lg font-semibold mb-4">ویرایش تجربه</h2>

        <form action="{{ route('dashboard.page-settings.experiences.update', $experience->id) }}" method="POST"
            class="mx-auto w-full mb-10">
            @csrf
            @method('PUT')

            <div class="grid md:grid-cols-2 gap-4">
                <div class="mb-5">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">عنوان تجربه</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $experience->title) }}"
                        class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" />
                </div>

                <div class="mb-5">
                    <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">محل فعالیت</label>
                    <input type="text" name="company" id="company" value="{{ old('company', $experience->company) }}"
                        class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" />
                </div>

                <div class="mb-5">
                    <label for="from" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">از</label>
                    <input type="text" name="from" id="from" value="{{ old('from', $experience->started_from) }}"
                        class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" />
                </div>

                <div class="mb-5">
                    <label for="till" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">تا</label>
                    <input type="text" name="till" id="till" value="{{ old('till', $experience->ended_till) }}"
                        class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" />
                </div>

                <div class="mb-5 md:col-span-2">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">توضیحات</label>
                    <textarea name="description" id="description" rows="4"
                        class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">{{ old('description', $experience->description) }}</textarea>
                </div>
            </div>

            <div class="flex gap-2">
                <a href="{{ route('dashboard.page-settings.experiences') }}"
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
