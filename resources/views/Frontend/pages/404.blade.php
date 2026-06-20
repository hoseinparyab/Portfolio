@extends('Frontend.layouts.app')

@section('title', 'بنتوفولیو | نمونه کار ها')

@section('vite')
    @vite(['resources/js/frontend/public.js', 'resources/js/frontend/404.js'])
@endsection

@section('content')
<div class="archive bento bento-boxes">
        <div class="card-border"></div>
        <div class="bento-content main-content flex flex-col gap-6">
          <div class="bar flex flex-row justify-between items-center gap-4">
            <div class="breadcrumbs">
              <a class="main text-sm" href="{{ route('home') }}">
                <i class="fa-solid fa-house"></i>
                صفحه اصلی
              </a>
              <span>></span>
              <a class="main text-sm" href="{{ route('home') }}"> یافت نشد! </a>
            </div>
          </div>

          <div class="flex flex-col justify-center items-center gap-8 justify-center h-[100%]">
                      <h1 class="text-xl font-bold text-center">
            متاسفانه صفحه مورد نظر شما یافت نشد!
          </h1>
            <img
              class="not-found"
              src="{{ asset('src/img/not-found.png') }}"
              alt="Page Not Found 404"
            />
            <a
              href="{{ route('home') }}"
              class="flex flex-row justify-center items-center gap-2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center"
            >
              <span class="text-white">بازگشت به صفحه اصلی</span>
              <i class="fa-solid fa-turn-down-left text-white"></i
            ></a>
          </div>
        </div>
      </div>
@endsection
