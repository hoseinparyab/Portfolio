@extends('Frontend.layouts.dashboard')

@section('title', 'تجربه‌ها | مدیریت')

@section('vite')
    @vite(['resources/js/frontend/dashboard.js'])
@endsection

@section('content')
    <div class="grid w-[100%]">
        @include('Frontend.partials.spacing')

        <h2 class="text-lg font-semibold mb-4">مدیریت تجربه‌ها</h2>

        <form action="{{ route('dashboard.page-settings.experiences.store') }}" method="POST"
            class="mx-auto w-full mb-10">
            @csrf

            <div class="grid md:grid-cols-2 gap-4">
                <div class="mb-5">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        عنوان تجربه
                    </label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}"
                        placeholder="برنامه‌نویس فول‌استک"
                        class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" />
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        محل فعالیت
                    </label>
                    <input type="text" name="company" id="company" value="{{ old('company') }}"
                        placeholder="استارتاپ ناجینو"
                        class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" />
                    @error('company')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="from" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">از</label>
                    <input type="text" name="from" id="from" value="{{ old('from') }}" placeholder="1401"
                        class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" />
                    @error('from')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="till" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">تا</label>
                    <input type="text" name="till" id="till" value="{{ old('till') }}" placeholder="1403"
                        class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" />
                    @error('till')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5 md:col-span-2">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        توضیحات
                    </label>
                    <textarea name="description" id="description" rows="4" placeholder="توضیح کوتاه..."
                        class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">{{ old('description') }}</textarea>
                    @error('description')
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
                    افزودن تجربه
                </button>
            </div>
        </form>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-10">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 rounded overflow-hidden">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-6 py-3">عنوان</th>
                        <th class="px-6 py-3">محل فعالیت</th>
                        <th class="px-6 py-3">بازه زمانی</th>
                        <th class="px-6 py-3">عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($experiences as $experience)
                        <tr class="bg-white border-b border-gray-200 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4 text-gray-900 dark:text-white">{{ $experience->title }}</td>
                            <td class="px-6 py-4">{{ $experience->company }}</td>
                            <td class="px-6 py-4">{{ $experience->started_from }} - {{ $experience->ended_till }}</td>
                            <td class="px-6 py-4">
                                <div class="flex gap-2">
                                    <a href="{{ route('dashboard.page-settings.experiences.edit', $experience->id) }}"
                                        class="font-medium text-blue-600 cursor-pointer">ویرایش</a>
                                    <form action="{{ route('dashboard.page-settings.experiences.destroy', $experience->id) }}"
                                        method="POST" onsubmit="return confirm('از حذف این تجربه مطمئن هستید؟')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="font-medium text-red-600 cursor-pointer">حذف</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                هنوز هیچ تجربه‌ای ثبت نشده است.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
