@extends('Frontend.layouts.dashboard')

@section('title', 'ویرایش حساب | مدیریت')

@section('vite')
    @vite(['resources/js/frontend/dashboard.js', 'resources/js/frontend/dashboard-account-settings.js'])
@endsection

@php
    $inputClass = 'bg-[#364153] border border-gray-600 text-gray-100 placeholder-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5';
@endphp

@section('content')
    <div class="grid w-[100%]">
        @include('Frontend.partials.spacing')

        <h1 class="text-lg font-semibold mb-6">ویرایش اطلاعات حساب کاربری</h1>

        @if(session('success'))
            <div class="p-4 mb-6 text-green-200 bg-green-900/40 border border-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('dashboard.account.update') }}" method="POST" enctype="multipart/form-data"
            class="mx-auto w-full">
            @csrf
            @method('PUT')

            <div class="flex flex-row items-center justify-between gap-8 mb-5">
                <label for="avatar" class="block mb-2 text-sm font-medium text-gray-200">
                    تصویر حساب کاربری
                </label>
                <img src="{{ $user->avatar ? asset($user->avatar) : asset('src/img/Profile Picture.jpg') }}"
                    alt="profile picture" class="w-20 h-20 rounded-full object-cover object-center" />
            </div>

            <div class="flex items-center justify-center w-full mb-5">
                <label for="avatar"
                    class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-600 border-dashed rounded-lg cursor-pointer bg-[#364153] hover:bg-[#3f4d62]">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                        </svg>
                        <p class="mb-2 text-sm text-gray-400" data-dropzone-message>
                            <span class="font-semibold">برای بارگذاری کلیک کنید</span>
                            و یا عکس مورد نظر را به اینجا بکشید
                        </p>
                        <p class="text-xs text-gray-500">
                            SVG, PNG, JPG یا GIF (حداکثر حجم 2 مگابایت)
                        </p>
                    </div>
                    <input id="avatar" name="avatar" type="file" class="hidden"
                        accept="image/png,image/jpeg,image/gif,image/webp" />
                </label>
            </div>
            @error('avatar')
                <p class="text-red-400 text-sm mt-1 mb-5">{{ $message }}</p>
            @enderror

            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-200">ایمیل</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 16">
                            <path
                                d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                            <path
                                d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                        </svg>
                    </div>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                        class="{{ $inputClass }}" placeholder="name@example.com" />
                </div>
                @error('email')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-200">نام کاربری</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                        </svg>
                    </div>
                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                        class="{{ $inputClass }}" placeholder="نام کاربری" />
                </div>
                @error('name')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="bio" class="block mb-2 text-sm font-medium text-gray-200">بیوگرافی</label>
                <textarea id="bio" name="bio" rows="4"
                    class="block p-2.5 w-full text-sm text-gray-100 bg-[#364153] rounded-lg border border-gray-600 placeholder-gray-400 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="بیوگرافی کوتاه شما جهت نمایش در پروفایل">{{ old('bio', $user->bio) }}</textarea>
                @error('bio')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-200">کلمه عبور</label>
                <input type="password" id="password" name="password"
                    class="shadow-xs bg-[#364153] border border-gray-600 text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                @error('password')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-200">
                    تکرار کلمه عبور
                </label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    class="shadow-xs bg-[#364153] border border-gray-600 text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
            </div>

            <div class="flex gap-2">
                <a href="{{ route('dashboard.index') }}"
                    class="cursor-pointer text-white bg-gray-700 hover:bg-gray-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    لغو
                </a>
                <button type="submit"
                    class="cursor-pointer text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    ویرایش
                </button>
            </div>
        </form>
    </div>
@endsection
