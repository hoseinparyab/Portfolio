@extends('Frontend.layouts.auth')

@section('title', 'صفحه ورود و ثبت نام | مدیریت')

@section('content')
<div class="login-container flex flex-row" >
      <div
        class="login w-full md:w-1/2 h-screen p-4 flex flex-col justify-center items-center"
      >
      <div id="login-section" class="login-section p-4 flex flex-col justify-center items-center gap-4">
        @include('Frontend.partials.spacing')
        <h1 class="header font-bold text-2xl">ورود</h1>
        <div
          class="login-options flex flex-row gap-4 items-center justify-center my-2"
        >
          <div class="login-option google">
            <i class="fa-brands fa-google fa-xl"></i>
          </div>
          <div class="login-option google">
            <i class="fa-brands fa-facebook-f fa-xl"></i>
          </div>
          <div class="login-option google">
            <i class="fa-brands fa-github fa-xl"></i>
          </div>
        </div>
        <span class="my-6 text-gray-600 text-sm">یا با حساب خود وارد شوید.</span>
            <form action="{{ route('dashboard.login.post') }}" method="POST" class="login-form flex flex-col gap-4 w-[350px]">
          @csrf
          <div>
            <label for="email" class="block mb-2 text-sm font-medium"
              >ایمیل</label
            >
            <input
              type="email"
              id="email"
              name="email"
              value="{{ old('email') }}"
              class="border border-gray-300 bg-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
              placeholder="admin@portfolio.test"
              required
            />
          </div>
          <div>
            <label for="password" class="block mb-2 text-sm font-medium"
              >رمز عبور</label
            >
            <input
              type="password"
              id="password"
              name="password"
              class="border border-gray-300 bg-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
              placeholder="رمز عبور شما"
              required
            />
          </div>
          <div
            class="save-info flex flex-row items-center gap-1"
          >
            <input class="cursor-pointer" type="checkbox" name="remember" id="remember" />
            <span class="text-sm text-gray-600"
              >اطلاعات ورود من برای دفعات بعد ذخیره شود.</span
            >
          </div>
          <button
            type="submit"
            class="login-btn cursor-pointer text-white bg-blue-500 hover:bg-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-[100%] my-4"
          >
            ورود
          </button>
        </form>
        <a class="forget link text-sm" href="#">رمز عبور خود را فراموش کرده‌اید؟</a>
        <a class="sign-up link text-sm" href="#">ثبت نام و ایجاد حساب کاربری</a>
        </div>
      </div>
      <div class="welcome hidden md:flex w-1/2 h-screen p-4 flex-col justify-center items-center gap-5">
        <span class="text-3xl font-bold">سلام، خوش آمدید!</span>
        <p class="description text-center">برای ورورد به بخش مدیریت سایت خود، وارد حساب کاربری شوید. <br>در صورت نداشتن حساب کاربری میتوانید از لینک زیر ثبت نام کنید.</p>
        <div class="sign-up flex flex-col justify-center items-center cursor-pointer my-4 px-5 py-2.5">ثبت نام</div>
      </div>
    </div>
@endsection
