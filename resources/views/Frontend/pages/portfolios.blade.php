@extends('Frontend.layouts.app')

@section('title', 'بنتوفولیو | نمونه کار ها')

@section('vite')
    @vite(['resources/js/frontend/public.js', 'resources/js/frontend/portfolios.js'])
@endsection

@section('content')
<div class="archive bento bento-boxes">
        <div class="card-border"></div>
        <div class="bento-content flex flex-col justify-center gap-6">
          <div class="bar flex flex-row justify-between items-center gap-4">
            <div class="breadcrumbs">
              <a class="main text-sm" href="{{ route('home') }}">
                <i class="fa-solid fa-house"></i>
                صفحه اصلی
              </a>
              <span>></span>
              <a class="main text-sm" href="{{ route('portfolios') }}"> پروژه‌ها </a>
            </div>
            <div class="sort flex flex-row items-center justify-end gap-4">
              <a href="#"
                ><i class="fa-solid fa-arrow-up-z-a fa-lg icon-hover"></i
              ></a>
              <a href="#"
                ><i class="fa-solid fa-bars-sort fa-lg icon-hover"></i
              ></a>
            </div>
          </div>
          <h1 class="text-xl font-bold text-center">آرشیو : پروژه ها</h1>
          <div
            class="portfolio-container grid grid-flow-row gap-8 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4"
          >
            <a data-fslightbox="gallery" href="{{ asset('src/img/Portfolio1.jpg') }}">
              <img src="{{ asset('src/img/Portfolio1.jpg') }}" alt="portfolio item">
            </a>
                        <a data-fslightbox="gallery" href="{{ asset('src/img/Portfolio1.jpg') }}">
              <img src="{{ asset('src/img/Portfolio1.jpg') }}" alt="portfolio item">
            </a>
                        <a data-fslightbox="gallery" href="{{ asset('src/img/Portfolio2.jpg') }}">
              <img src="{{ asset('src/img/Portfolio2.jpg') }}" alt="portfolio item">
            </a>
                        <a data-fslightbox="gallery" href="{{ asset('src/img/Portfolio3.jpg') }}">
              <img src="{{ asset('src/img/Portfolio3.jpg') }}" alt="portfolio item">
            </a>
                        <a data-fslightbox="gallery" href="{{ asset('src/img/Portfolio4.jpg') }}">
              <img src="{{ asset('src/img/Portfolio4.jpg') }}" alt="portfolio item">
            </a>
                        <a data-fslightbox="gallery" href="{{ asset('src/img/Portfolio3.jpg') }}">
              <img src="{{ asset('src/img/Portfolio3.jpg') }}" alt="portfolio item">
            </a>
                        <a data-fslightbox="gallery" href="{{ asset('src/img/Portfolio2.jpg') }}">
              <img src="{{ asset('src/img/Portfolio2.jpg') }}" alt="portfolio item">
            </a>
                        <a data-fslightbox="gallery" href="{{ asset('src/img/Portfolio1.jpg') }}">
              <img src="{{ asset('src/img/Portfolio1.jpg') }}" alt="portfolio item">
            </a>
                        <a data-fslightbox="gallery" href="{{ asset('src/img/Portfolio2.jpg') }}">
              <img src="{{ asset('src/img/Portfolio2.jpg') }}" alt="portfolio item">
            </a>
                        <a data-fslightbox="gallery" href="{{ asset('src/img/Portfolio3.jpg') }}">
              <img src="{{ asset('src/img/Portfolio3.jpg') }}" alt="portfolio item">
            </a>
                        <a data-fslightbox="gallery" href="{{ asset('src/img/Portfolio4.jpg') }}">
              <img src="{{ asset('src/img/Portfolio4.jpg') }}" alt="portfolio item">
            </a>
                        <a data-fslightbox="gallery" href="{{ asset('src/img/Portfolio1.jpg') }}">
              <img src="{{ asset('src/img/Portfolio1.jpg') }}" alt="portfolio item">
            </a>
          </div>
          <div class="flex justify-center">
            <nav class="pagination-container rounded-full px-4 py-3">
              <ul class="flex gap-4 font-medium py-2">
                <li>
                  <a href="#" class="selected-page rounded-full px-4 py-2">1</a>
                </li>
                <li>
                  <a
                    href="#"
                    class="page rounded-full px-4 py-2 transition duration-300 ease-in-out"
                    >2</a
                  >
                </li>
                <li>
                  <a
                    href="#"
                    class="page rounded-full px-4 py-2 transition duration-300 ease-in-out"
                    >3</a
                  >
                </li>
                <li>
                  <a
                    href="#"
                    class="page rounded-full px-4 py-2 transition duration-300 ease-in-out"
                    >4</a
                  >
                </li>
                <li>
                  <a
                    href="#"
                    class="page rounded-full px-4 py-2 transition duration-300 ease-in-out"
                    >5</a
                  >
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
@endsection
