@extends('Frontend.layouts.app')

@section('title', 'بنتوفولیو | رزومه آنلاین')

@section('vite')
    @vite(['resources/js/frontend/public.js', 'resources/js/frontend/home.js'])
@endsection

@section('content')
<div class="introduction bento bento-boxes">
        <div class="card-border"></div>
        <div class="bento-content flex flex-col gap-8">
          <div class="flex flex-row gap-8 items-center">
            <div class="image-container">
              <img
                class="profile-pic rounded-full"
                src="{{ asset('src/img/Profile Picture.jpg') }}"
                alt="Borhan Mortazavi Picture"
              />
            </div>
            <div
              class="header-container flex flex-col gap-3 text-[var(--focus-color)]"
            >
              <h1 class="xl:text-4xl md:text-3xl text-2xl font-black">
برهان مرتضوی         </h1>
              <span class="text-[var(--body-color)]"
                >برنامه نویس فول استک و طراح گرافیک</span
              >
            </div>
          </div>
          <p class="introduction-paragraph paragraph">
            سلام 👋 من عاشق کدنویسی، طراحی و خلق چیزای جدیدم. از طراحی ظاهر سایت
            گرفته تا پیاده‌سازی پشت‌صحنه‌اش با JavaScript – همه‌اش کار منه! وقتی
            پشت سیستمم نیستم، حتما دارم به طرح‌های گرافیکی یا تجربه‌های کاربری
            جدید فکر می‌کنم. 💻
          </p>
        </div>
      </div>
      <div class="education bento bento-boxes">
        <div class="card-border"></div>
        <div class="bento-content flex flex-col gap-6">
          <h2 class="text-2xl font-bold">تحصیلات</h2>
          <div
            class="education-container flex flex-col gap-10 justify-around h-[100%]"
          >
            <div class="edu flex flex-row items-center justify-between gap-4">
              <div class="edu-info flex flex-col">
                <span class="text-xs">کارشناسی</span>
                <h3 class="mb-2 text-lg">زبان و ادبیات انگلیسی</h3>
                <span class="text-sm">دانشگاه سراسری تبریز</span>
              </div>
              <span class="text-sm">1397 تا 1401</span>
            </div>
            <div class="edu flex flex-row items-center justify-between gap-4">
              <div class="edu-info flex flex-col">
                <span class="text-xs">کارشناسی ارشد</span>
                <h3 class="mb-2 text-lg">آموزش زبان انگلیسی</h3>
                <span class="text-sm">دانشگاه سراسری تبریز</span>
              </div>
              <span class="text-sm">1402 تا 1404</span>
            </div>
          </div>
        </div>
      </div>
      <div class="languages bento bento-boxes">
        <div class="card-border"></div>
        <div class="bento-content flex flex-col gap-6">
          <h2 class="text-2xl font-bold">زبان‌ها</h2>
          <div
            class="language-container flex flex-col gap-6 justify-around h-[100%] w-[100%]"
          >
            <div
              class="language persian flex flex-row justify-between items-center"
            >
              <div class="lang flex flex-row gap-2 items-center flex-3">
                <img src="{{ asset('src/img/per.svg') }}" alt="" />
                <span class="text-sm">فارسی</span>
              </div>
              <div
                class="level flex flex-row gap-1 items-center justify-end flex-2"
              >
                <span>Native</span>
              </div>
            </div>
            <div
              class="language english flex flex-row justify-between items-center"
            >
              <div class="lang flex flex-row gap-2 items-center flex-3">
                <img src="{{ asset('src/img/eng.svg') }}" alt="" />
                <span class="text-sm">انگلیسی</span>
              </div>
              <div
                class="level flex flex-row gap-1 items-center justify-end flex-2"
              >
                <span>Native</span>
              </div>
            </div>
            <div
              class="language turkish flex flex-row justify-between items-center"
            >
              <div class="lang flex flex-row gap-2 items-center flex-3">
                <img src="{{ asset('src/img/tur.svg') }}" alt="" />
                <span class="text-sm">ترکی</span>
              </div>
              <div
                class="level flex flex-row gap-1 items-center justify-end flex-2"
              >
                <span>C1</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="resume bento bento-boxes">
        <div class="card-border"></div>
        <div
          class="bento-content flex flex-row gap-12 items-center justify-between w-[100%] h-[100%]"
        >
          <div class="text-container flex flex-col gap-1">
            <span class="text-[var(--body-color)]">دانلود</span>
            <h2 class="text-2xl font-bold">رزومه</h2>
          </div>
          <div class="button-container flex flex-row gap-6">
            <button href="{{ route('dashboard.index') }}">
              <i class="fa-regular fa-eye fa-xl icon-hover"></i>
            </button>
            <button href="{{ route('dashboard.index') }}">
              <i
                class="fa-regular fa-arrow-down-to-square fa-xl icon-hover"
              ></i>
            </button>
          </div>
        </div>
      </div>
      <div class="skills bento bento-boxes">
        <div class="card-border"></div>
        <div class="bento-content flex flex-col gap-6">
          <h2 class="text-xl font-bold">مهارت‌های نرم‌افزاری</h2>
          <div class="skills-grid">
            <div class="single-skill" title="HTML">
              <img src="{{ asset('src/img/html-logo.png') }}" alt="html logo" />
            </div>
            <div class="single-skill" title="CSS">
              <img src="{{ asset('src/img/css-logo.png') }}" alt="css logo" />
            </div>
            <div class="single-skill" title="JavaScript">
              <img src="{{ asset('src/img/js-logo.png') }}" alt="js logo" />
            </div>
            <div class="single-skill" title="Bootstrap">
              <img src="{{ asset('src/img/bootstrap-logo.png') }}" alt="bootstrap logo" />
            </div>
            <div class="single-skill" title="Tailwind">
              <img src="{{ asset('src/img/tailwind-logo.png') }}" alt="tailwind-logo" />
            </div>
            <div class="single-skill" title="React Js">
              <img src="{{ asset('src/img/react-logo.png') }}" alt="react logo" />
            </div>
            <div class="single-skill" title="Next Js">
              <img src="{{ asset('src/img/next-logo.png') }}" alt="next logo" />
            </div>
            <div class="single-skill" title="Git">
              <img src="{{ asset('src/img/git-logo.png') }}" alt="git logo" />
            </div>
            <div class="single-skill" title="Chatgpt AI">
              <img src="{{ asset('src/img/chatgpt-logo.png') }}" alt="chatgpt logo" />
            </div>
            <div class="single-skill" title="Adobe Photoshop">
              <img src="{{ asset('src/img/photoshop-logo.png') }}" alt="photoshop logo" />
            </div>
            <div class="single-skill" title="Adobe Xd">
              <img src="{{ asset('src/img/adobexd-logo.png') }}" alt="adobexd logo" />
            </div>
            <div class="single-skill" title="Adobe Illustrator">
              <img src="{{ asset('src/img/adobeai-logo.png') }}" alt="adobeAi logo" />
            </div>
            <div class="single-skill" title="Figma">
              <img src="{{ asset('src/img/figma-logo.png') }}" alt="Figma logo" />
            </div>
            <div class="single-skill" title="Blender">
              <img src="{{ asset('src/img/blender-logo.png') }}" alt="blender logo" />
            </div>
          </div>
          <h2 class="text-xl font-bold mt-6">مهارت‌های فردی</h2>
          <div class="tag‐container">
            <span class="tag">کار گروهی</span>
            <span class="tag">وقت‌ شناسی</span>
            <span class="tag">ارتباطات بین فردی</span>
            <span class="tag">انتقاد پذیر</span>
            <span class="tag">انعطاف‌پذیری</span>
            <span class="tag">یادگیری سریع</span>
            <span class="tag">برنامه‌ریزی صحیح</span>
            <span class="tag">خوش‌برخورد</span>
            <span class="tag">چند زبانه</span>
            <span class="tag">تایپ سریع ۱۰ انگشتی</span>
            <span class="tag">تفکر مستقل</span>
            <span class="tag">توانایی حل مسئله</span>
          </div>
        </div>
      </div>
      <div class="experience bento bento-boxes">
        <div class="card-border"></div>
        <div class="bento-content flex flex-col gap-6">
          <div class="text-container flex flex-col gap-1">
            <span class="text-[var(--body-color)]">
              <span>6</span>
              سال
            </span>
            <h2 class="text-2xl font-bold">تجربه کاری</h2>
          </div>
          <div
            class="experience-container flex flex-col gap-10 justify-between"
          >
            <div class="exp flex flex-row items-center justify-between gap-4">
              <h3 class="mb-2 text-xl">برنامه نویس فول استک JavaScript</h3>
              <div class="exp-info flex flex-col gap-1 items-end">
                <span class="text-sm">استارتاپ ناجینو</span>
                <span class="text-xs text-gray-600">1403 - امروز</span>
              </div>
            </div>
            <div class="exp flex flex-row items-center justify-between gap-4">
              <h3 class="mb-2 text-xl">طراح گرافیک و محتوا</h3>
              <div class="exp-info flex flex-col gap-1 items-end">
                <span class="text-sm">پیج های اینستاگرامی</span>
                <span class="text-xs text-gray-600">1401 - 1403</span>
              </div>
            </div>
            <div class="exp flex flex-row items-center justify-between gap-4">
              <h3 class="mb-2 text-xl">ادمین محتوا سایت وردپرسی</h3>
              <div class="exp-info flex flex-col gap-1 items-end">
                <span class="text-sm">وبسایت Xternull</span>
                <span class="text-xs text-gray-600">1400 - 1401</span>
              </div>
            </div>
            <div class="exp flex flex-row items-center justify-between gap-4">
              <h3 class="mb-2 text-xl">مترجم بازی های ویدیویی</h3>
              <div class="exp-info flex flex-col gap-1 items-end">
                <span class="text-sm">وبسایت DlFox</span>
                <span class="text-xs text-gray-600">1398 - 1399</span>
              </div>
            </div>
            <p class="work-description paragraph">
              تمرکز من در وظایف روزمره، رفع نیاز کاربران و دقت به جزئیات پروژه
              هاست که باعث شده نمونه کارهای متمایز و کاربردی در کارنامه‌ام داشته
              باشم. طراحی بصری، برنامه نویسی و تجربه کار بر روی سئو وبسایت ها از
              تجربیات بنده در طول سال های اخیر است.
            </p>
          </div>
        </div>
      </div>
      <div class="portfolio bento bento-boxes">
        <div class="card-border"></div>
        <div class="bento-content flex flex-col justify-center gap-6">
          <h2 class="text-xl font-bold">نمونه کار</h2>
          <div class="swiper-container">
            <div class="swiper mySwiper">
              <div class="swiper-wrapper">
                <a class="swiper-slide" href="#">
                  <img src="{{ asset('src/img/Portfolio1.jpg') }}" alt="Portfolio Item" />
                </a>
                <a class="swiper-slide" href="#">
                  <img src="{{ asset('src/img/Portfolio2.jpg') }}" alt="Portfolio Item" />
                </a>
                <a class="swiper-slide" href="#">
                  <img src="{{ asset('src/img/Portfolio3.jpg') }}" alt="Portfolio Item" />
                </a>
                <a class="swiper-slide" href="#">
                  <img src="{{ asset('src/img/Portfolio4.jpg') }}" alt="Portfolio Item" />
                </a>
                <a class="swiper-slide" href="#">
                  <img src="{{ asset('src/img/Portfolio5.jpg') }}" alt="Portfolio Item" />
                </a>
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="email bento bento-boxes">
        <div class="card-border"></div>
        <div class="bento-content">
          <button
            class="flex flex-col items-center justify-center gap-2 w-[100%] h-[100%]"
          >
            <i class="fa-regular fa-envelope fa-xl icon-hover"></i>
            <h2 class="text-xl font-bold">ایمیل</h2>
          </button>
        </div>
      </div>
      <div class="linkedin bento bento-boxes">
        <div class="card-border"></div>
        <div class="bento-content">
          <button
            class="flex flex-col items-center justify-center gap-2 w-[100%] h-[100%]"
          >
            <i class="fa-brands fa-linkedin fa-xl icon-hover"></i>
            <h2 class="text-xl font-bold">Linked In</h2>
          </button>
        </div>
      </div>
      <div class="github bento bento-boxes">
        <div class="card-border"></div>
        <div class="bento-content">
          <button
            class="flex flex-col items-center justify-center gap-2 w-[100%] h-[100%]"
          >
            <i class="fa-brands fa-github fa-xl icon-hover"></i>
            <h2 class="text-xl font-bold">Github</h2>
          </button>
        </div>
      </div>
      <div class="blogs bento bento-boxes">
        <div class="card-border"></div>
        <div class="bento-content flex flex-col gap-6 items-center">
          <h2 class="text-xl font-bold">آخرین مطالب</h2>
          <div class="blogs-container flex flex-col gap-6 justify-around">
            <a
              class="blog-post flex flex-col justify-center items-center gap-3"
              href="{{ route('posts.show', ['slug' => 'sample']) }}"
            >
              <h3 class="blog-title flex-4 one-line-text blog-links">
                مزیت های فریمورک Next Js نسبت به React
              </h3>
              <div
                class="post-details flex flex-row justify-center items-start gap-2 flex-1"
              >
                <div class="date flex flex-row gap-1 items-center">
                  <i class="fa-regular fa-calendar fa-xs"></i>
                  <span class="text-xs one-line-text">25 اردیبهشت 1404</span>
                </div>
                <div class="author flex flex-row gap-1 items-center">
                  <i class="fa-regular fa-user fa-xs"></i>
                  <span class="text-xs one-line-text">برهان مرتضوی</span>
                </div>
              </div>
            </a>
            <a
              class="blog-post flex flex-col justify-center items-center gap-3"
              href="{{ route('posts.show', ['slug' => 'sample']) }}"
            >
              <h3 class="blog-title flex-4 one-line-text blog-links">
                معرفی کتابخانه B-Crypt برای Express JS
              </h3>
              <div
                class="post-details flex flex-row justify-center items-start gap-2 flex-1"
              >
                <div class="date flex flex-row gap-1 items-center">
                  <i class="fa-regular fa-calendar fa-xs"></i>
                  <span class="text-xs one-line-text">14 اردیبهشت 1404</span>
                </div>
                <div class="author flex flex-row gap-1 items-center">
                  <i class="fa-regular fa-user fa-xs"></i>
                  <span class="text-xs one-line-text">برهان مرتضوی</span>
                </div>
              </div>
            </a>
            <a
              class="blog-post flex flex-col justify-center items-center gap-3"
              href="{{ route('posts.show', ['slug' => 'sample']) }}"
            >
              <h3 class="blog-title flex-4 one-line-text blog-links">
                آموزش ریدایرکت کردن به صفحه ورود در Next Js
              </h3>
              <div
                class="post-details flex flex-row justify-center items-start gap-2 flex-1"
              >
                <div class="date flex flex-row gap-1 items-center">
                  <i class="fa-regular fa-calendar fa-xs"></i>
                  <span class="text-xs one-line-text">02 فروردین 1404</span>
                </div>
                <div class="author flex flex-row gap-1 items-center">
                  <i class="fa-regular fa-user fa-xs"></i>
                  <span class="text-xs one-line-text">برهان مرتضوی</span>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
@endsection
