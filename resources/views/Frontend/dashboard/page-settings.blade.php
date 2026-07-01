@extends('Frontend.layouts.dashboard')

@section('title', 'تنظیمات صفحه | مدیریت')

@section('vite')
    @vite(['resources/js/frontend/dashboard.js', 'resources/js/frontend/dashboard-page-settings.js'])
@endsection

@section('content')
    <div class="grid w-[100%]">

        @include('Frontend.partials.spacing')

        {{-- بخش معرفی --}}
        <h2 class="text-lg font-semibold mb-4">بخش معرفی</h2>

        <form action="{{ route('dashboard.page-settings.intro.update') }}" method="POST" enctype="multipart/form-data"
            class="mx-auto w-full mb-10">
            @csrf
            @method('PUT')

            <div class="mb-5">
                <label for="fullname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    نام کامل
                </label>
                <input type="text" name="fullname" id="fullname" value="{{ old('fullname', $settings->fullname ?? '') }}"
                    placeholder="برهان مرتضوی"
                    class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                @error('fullname')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="job_title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    عنوان شغلی
                </label>
                <input type="text" name="job_title" id="job_title" value="{{ old('job_title', $settings->job_title ?? '') }}"
                    placeholder="برنامه نویس وب"
                    class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                @error('job_title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="bio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    بیوگرافی
                </label>
                <textarea name="bio" id="bio" rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="بیوگرافی کوتاه شما جهت نمایش در صفحه اول">{{ old('bio', $settings->bio ?? '') }}</textarea>
                @error('bio')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-row items-center justify-between gap-8 mb-5">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    تصویر صفحه اول
                </label>

                @if(!empty($settings->profile_image))
                    <img src="{{ asset($settings->profile_image) }}" alt="profile picture"
                        class="w-20 h-20 rounded-full object-cover object-center" />
                @else
                    <img src="{{ asset('src/img/Profile Picture.jpg') }}" alt="profile picture"
                        class="w-20 h-20 rounded-full object-cover object-center" />
                @endif
            </div>

            <div class="mb-5">
                @include('Frontend.partials.file-input', [
                    'name' => 'profile_image',
                    'accept' => 'image/*',
                    'hint' => 'PNG, JPG یا WEBP (حداکثر ۵ مگابایت)',
                ])
                @error('profile_image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-2">
                <a href="{{ route('dashboard.page-settings') }}"
                    class="cursor-pointer text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    لغو
                </a>

                <button type="submit"
                    class="cursor-pointer text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    ذخیره
                </button>
            </div>
        </form>

        {{-- تحصیلات --}}
        <h2 class="text-lg font-semibold mb-4">تحصیلات</h2>

        <form action="{{ route('dashboard.page-settings.educations.store') }}" method="POST" class="mx-auto w-full mb-8">
            @csrf

            <div class="flex flex-row md:flex-row gap-4 justify-stretch items-center flex-wrap">
                <div class="mb-5 flex-1">
                    <label for="degree" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        مقطع تحصیلی
                    </label>
                    <select name="degree" id="degree"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="دیپلم">دیپلم</option>
                        <option value="کاردانی">کاردانی</option>
                        <option value="کارشناسی">لیسانس</option>
                        <option value="کارشناسی ارشد">فوق لیسانس</option>
                        <option value="دکترا">دکترا</option>
                        <option value="تخصص">تخصص</option>
                    </select>
                </div>

                <div class="mb-5 flex-1">
                    <label for="major" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        رشته و گرایش تحصیلی
                    </label>
                    <input type="text" name="major" id="major" value="{{ old('major') }}"
                        placeholder="مهندسی کامپیوتر"
                        class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                </div>

                <div class="mb-5 flex-1">
                    <label for="university" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        دانشگاه محل تحصیل
                    </label>
                    <input type="text" name="university" id="university" value="{{ old('university') }}"
                        placeholder="دانشگاه تبریز"
                        class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                </div>

                <div class="mb-5 flex-1">
                    <label for="education_from" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        آغاز تحصیل
                    </label>
                    <input type="text" name="education_from" id="education_from" value="{{ old('education_from') }}"
                        placeholder="1397"
                        class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                </div>

                <div class="mb-5 flex-1">
                    <label for="education_till" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        فارغ التحصیلی
                    </label>
                    <input type="text" name="education_till" id="education_till" value="{{ old('education_till') }}"
                        placeholder="1401"
                        class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                </div>
            </div>

            <div class="flex gap-2">
                <a href="{{ route('dashboard.page-settings') }}"
                    class="cursor-pointer text-white bg-gray-700 hover:bg-gray-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    لغو
                </a>

                <button type="submit"
                    class="cursor-pointer text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    افزودن
                </button>
            </div>
        </form>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-10">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 rounded overflow-hidden">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-6 py-3">مقطع تحصیلی</th>
                        <th class="px-6 py-3">رشته و گرایش</th>
                        <th class="px-6 py-3">دانشگاه</th>
                        <th class="px-6 py-3">تحصیل</th>
                        <th class="px-6 py-3">عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($educations ?? [] as $education)
                        <tr class="bg-white border-b border-gray-200 hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $education->degree }}</td>
                            <td class="px-6 py-4">{{ $education->major }}</td>
                            <td class="px-6 py-4">{{ $education->university }}</td>
                            <td class="px-6 py-4">{{ $education->education_from }} تا {{ $education->education_till }}</td>
                            <td class="px-6 py-4">
                                <div class="flex gap-2">
                                    <a href="{{ route('dashboard.page-settings.educations.edit', $education->id) }}"
                                        class="font-medium text-blue-600 cursor-pointer">ویرایش</a>
                                    <form action="{{ route('dashboard.page-settings.educations.destroy', $education->id) }}"
                                        method="POST" onsubmit="return confirm('از حذف این مورد مطمئن هستید؟')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="font-medium text-red-600 cursor-pointer">حذف</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                هنوز هیچ سابقه تحصیلی ثبت نشده است.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- زبان ها --}}
        <h2 class="text-lg font-semibold mb-4">زبان ها</h2>

        <form action="{{ route('dashboard.page-settings.languages.store') }}" method="POST" class="mx-auto w-full mb-8">
            @csrf

            <div class="flex flex-row md:flex-row gap-4 justify-stretch items-center flex-wrap">
                <div class="mb-5 flex-1">
                    <label for="language" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        زبان
                    </label>
                    <input type="text" name="language" id="language" value="{{ old('language') }}"
                        placeholder="انگلیسی"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                </div>

                <div class="mb-5 flex-1">
                    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        سطح
                    </label>
                    <select name="level" id="level"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                        <option value="A1">A1</option>
                        <option value="A2">A2</option>
                        <option value="B1">B1</option>
                        <option value="B2">B2</option>
                        <option value="C1">C1</option>
                        <option value="C2 (Native)">C2 (Native)</option>
                    </select>
                </div>
            </div>

            <div class="flex gap-2">
                <a href="{{ route('dashboard.page-settings') }}"
                    class="cursor-pointer text-white bg-gray-700 hover:bg-gray-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    لغو
                </a>
                <button type="submit"
                    class="cursor-pointer text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    افزودن
                </button>
            </div>
        </form>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-10">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 rounded overflow-hidden">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-6 py-3">زبان</th>
                        <th class="px-6 py-3">سطح</th>
                        <th class="px-6 py-3">عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($languages ?? [] as $language)
                        <tr class="bg-white border-b border-gray-200 hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $language->language }}</td>
                            <td class="px-6 py-4">{{ $language->level }}</td>
                            <td class="px-6 py-4">
                                <div class="flex gap-2">
                                    <a href="{{ route('dashboard.page-settings.languages.edit', $language->id) }}"
                                        class="font-medium text-blue-600 cursor-pointer">ویرایش</a>
                                    <form action="{{ route('dashboard.page-settings.languages.destroy', $language->id) }}"
                                        method="POST" onsubmit="return confirm('از حذف این مورد مطمئن هستید؟')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="font-medium text-red-600 cursor-pointer">حذف</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center text-gray-500">
                                هنوز هیچ زبانی ثبت نشده است.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- رزومه --}}
        <h2 class="text-lg font-semibold mb-4">فایل رزومه</h2>

        <form action="{{ route('dashboard.page-settings.resume.update') }}" method="POST" enctype="multipart/form-data"
            class="mx-auto w-full mb-10">
            @csrf
            @method('PUT')

            <div class="mb-5">
                @include('Frontend.partials.file-input', [
                    'name' => 'cv',
                    'buttonText' => 'انتخاب رزومه',
                    'hint' => 'PDF, Word, Excel, PowerPoint, PNG یا JPG (حداکثر ۱۰ مگابایت)',
                ])
                @error('cv')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-2">
                <a href="{{ route('dashboard.page-settings') }}"
                    class="cursor-pointer text-white bg-gray-700 hover:bg-gray-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    لغو
                </a>

                <button type="submit"
                    class="cursor-pointer text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    بارگذاری
                </button>
            </div>
        </form>

        {{-- مهارت های فردی --}}
        <h2 class="text-lg font-semibold mb-4">مهارت های فردی</h2>

        <form action="{{ route('dashboard.page-settings.soft-skills.update') }}" method="POST" class="mx-auto w-full mb-10">
            @csrf
            @method('PUT')

            <div class="mb-5">
                <label for="soft_skills" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    مهارت های فردی، با کاما "،" از هم جدا کنید
                </label>
                <textarea name="soft_skills" id="soft_skills" rows="8"
                    placeholder="کار گروهی، وقت‌شناسی، ارتباطات بین فردی ..."
                    class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">{{ old('soft_skills', $settings->soft_skills ?? '') }}</textarea>
                @error('soft_skills')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-2">
                <a href="{{ route('dashboard.page-settings') }}"
                    class="cursor-pointer text-white bg-gray-700 hover:bg-gray-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    لغو
                </a>

                <button type="submit"
                    class="cursor-pointer text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    به روز رسانی
                </button>
            </div>
        </form>

    </div>
@endsection
