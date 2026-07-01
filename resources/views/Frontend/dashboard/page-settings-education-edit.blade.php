@extends('Frontend.layouts.dashboard')

@section('title', 'ویرایش تحصیلات | مدیریت')

@section('vite')
    @vite(['resources/js/frontend/dashboard.js', 'resources/js/frontend/dashboard-page-settings.js'])
@endsection

@section('content')
    <div class="grid w-[100%]">
        @include('Frontend.partials.spacing')

        <h2 class="text-lg font-semibold mb-4">ویرایش سابقه تحصیلی</h2>

        <form action="{{ route('dashboard.page-settings.educations.update', $education->id) }}" method="POST" class="mx-auto w-full mb-8">
            @csrf
            @method('PUT')

            <div class="flex flex-row md:flex-row gap-4 justify-stretch items-center flex-wrap">
                <div class="mb-5 flex-1">
                    <label for="degree" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">مقطع تحصیلی</label>
                    <select name="degree" id="degree" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                        @foreach (['دیپلم', 'کاردانی', 'کارشناسی', 'کارشناسی ارشد', 'دکترا', 'تخصص'] as $degree)
                            <option value="{{ $degree }}" @selected(old('degree', $education->degree) === $degree)>{{ $degree }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-5 flex-1">
                    <label for="major" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">رشته و گرایش تحصیلی</label>
                    <input type="text" name="major" id="major" value="{{ old('major', $education->major) }}"
                        class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                </div>

                <div class="mb-5 flex-1">
                    <label for="university" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">دانشگاه محل تحصیل</label>
                    <input type="text" name="university" id="university" value="{{ old('university', $education->university) }}"
                        class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                </div>

                <div class="mb-5 flex-1">
                    <label for="education_from" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">آغاز تحصیل</label>
                    <input type="text" name="education_from" id="education_from" value="{{ old('education_from', $education->education_from) }}"
                        class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                </div>

                <div class="mb-5 flex-1">
                    <label for="education_till" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">فارغ التحصیلی</label>
                    <input type="text" name="education_till" id="education_till" value="{{ old('education_till', $education->education_till) }}"
                        class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
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
