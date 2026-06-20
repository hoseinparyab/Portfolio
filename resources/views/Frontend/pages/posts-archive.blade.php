@extends('Frontend.layouts.app')

@section('title', 'بنتوفولیو | آرشیو بلاگ')

@section('vite')
    @vite(['resources/js/frontend/public.js', 'resources/js/frontend/posts-archive.js'])
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
              <a class="main text-sm" href="{{ route('posts.archive') }}"> بلاگ </a>
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
          <h1 class="text-xl font-bold text-center">آرشیو : بلاگ</h1>
          <div
            class="blog-container grid grid-flow-row gap-8 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4"
          >
            <a class="card-link" href="{{ route('posts.show', ['slug' => 'sample']) }}">
              <div class="card flex flex-col">
                <img src="{{ asset('src/img/blogpost11.webp') }}" alt="post picture" />
                <div
                  class="card-info flex flex-col gap-4 justify-start items-start"
                >
                  <span class="tag text-sm yellow">JavaScript</span>
                  <h3
                    class="card-title text-base font-bold"
                    title="آموزش استفاده از کتابخانه Bcrypt در Express JS"
                  >
                    آموزش استفاده از کتابخانه Bcrypt در Express JS
                  </h3>
                  <p class="text-sm card-paragraph">
                    امنیت اطلاعات یکی از مهم‌ترین بخش‌های توسعه‌ی نرم‌افزارهای
                    مدرن است، به‌ویژه زمانی که صحبت از ذخیره‌سازی رمزهای عبور
                    کاربران در میان باشد. ذخیره‌ی رمزهای عبور به‌صورت ساده
                    (plain text) می‌تواند فاجعه‌بار باشد و عواقب جبران‌ناپذیری
                    برای کاربران و سازمان‌ها داشته باشد. یکی از راهکارهای
                    ایمن‌سازی رمزهای عبور، استفاده از الگوریتم‌های هشینگ
                    رمزنگاری‌شده است. در این راستا، کتابخانه‌ی bcrypt یکی از
                    محبوب‌ترین گزینه‌ها برای توسعه‌دهندگان جاوااسکریپت محسوب
                    می‌شود.
                  </p>
                  <div
                    class="date flex flex-row justify-between items-center self-stretch mt-4"
                  >
                    <span
                      class="date flex flex-row justify-between items-center gap-1 text-sm"
                    >
                      <i class="fa-solid fa-calendar"></i>
                      24 تیر، 1404
                    </span>
                    <span
                      class="time flex flex-row justify-between items-center gap-1 text-sm"
                    >
                      <i class="fa-solid fa-clock"></i>
                      10 دقیقه
                    </span>
                  </div>
                </div>
              </div>
            </a>
            <a class="card-link" href="{{ route('posts.show', ['slug' => 'sample']) }}">
              <div class="card flex flex-col">
                <img src="{{ asset('src/img/blogpost1.webp') }}" alt="post picture" />
                <div
                  class="card-info flex flex-col gap-4 justify-start items-start"
                >
                  <span class="tag text-sm yellow">JavaScript</span>
                  <h3
                    class="card-title text-base font-bold"
                    title="مقدمه‌ای بر جاوااسکریپت: زبان همه‌کاره وب"
                  >
                    مقدمه‌ای بر جاوااسکریپت: زبان همه‌کاره وب
                  </h3>
                  <p class="text-sm card-paragraph">
جاوااسکریپت یکی از محبوب‌ترین زبان‌های برنامه‌نویسی برای توسعه وب است که در سمت کلاینت و سرور استفاده می‌شود. در این مقاله، اصول پایه و تاریخچه‌ی این زبان را بررسی می‌کنیم. همچنین نگاهی به کاربردهای مختلف آن خواهیم داشت.
                  </p>
                  <div
                    class="date flex flex-row justify-between items-center self-stretch mt-4"
                  >
                    <span
                      class="date flex flex-row justify-between items-center gap-1 text-sm"
                    >
                      <i class="fa-solid fa-calendar"></i>
                      25 تیر، 1403
                    </span>
                    <span
                      class="time flex flex-row justify-between items-center gap-1 text-sm"
                    >
                      <i class="fa-solid fa-clock"></i>
                      7 دقیقه
                    </span>
                  </div>
                </div>
              </div>
            </a>
            <a class="card-link" href="{{ route('posts.show', ['slug' => 'sample']) }}">
              <div class="card flex flex-col">
                <img src="{{ asset('src/img/blogpost2.webp') }}" alt="post picture" />
                <div
                  class="card-info flex flex-col gap-4 justify-start items-start"
                >
                  <span class="tag text-sm blue">Css</span>
                  <h3
                    class="card-title text-base font-bold"
                    title="چگونه با React یک رابط کاربری پویا بسازیم؟"
                  >
                   چگونه با React یک رابط کاربری پویا بسازیم؟
                  </h3>
                  <p class="text-sm card-paragraph">
React کتابخانه‌ای قدرتمند برای ساخت رابط‌های کاربری واکنش‌گرا است. در این مطلب با مفاهیم کامپوننت، Props و State آشنا می‌شوید و نحوه ایجاد یک برنامه ساده React را می‌آموزید. یادگیری React گام مهمی در مسیر توسعه فرانت‌اند است.
                  </p>
                  <div
                    class="date flex flex-row justify-between items-center self-stretch mt-4"
                  >
                    <span
                      class="date flex flex-row justify-between items-center gap-1 text-sm"
                    >
                      <i class="fa-solid fa-calendar"></i>
                      24 مرداد، 1403
                    </span>
                    <span
                      class="time flex flex-row justify-between items-center gap-1 text-sm"
                    >
                      <i class="fa-solid fa-clock"></i>
                      9 دقیقه
                    </span>
                  </div>
                </div>
              </div>
            </a>
            <a class="card-link" href="{{ route('posts.show', ['slug' => 'sample']) }}">
              <div class="card flex flex-col">
                <img src="{{ asset('src/img/blogpost3.webp') }}" alt="post picture" />
                <div
                  class="card-info flex flex-col gap-4 justify-start items-start"
                >
                  <span class="tag text-sm red">Linux</span>
                  <h3
                    class="card-title text-base font-bold"
                    title="Next.js چیست و چرا باید از آن استفاده کنیم؟"
                  >
                    Next.js چیست و چرا باید از آن استفاده کنیم؟
                  </h3>
                  <p class="text-sm card-paragraph">
Next.js فریم‌ورکی بر پایه React است که امکان رندر سمت سرور (SSR) و تولید سایت‌های استاتیک را به آسانی فراهم می‌کند. این مقاله به بررسی مزایای Next.js، مانند بهبود SEO و افزایش سرعت بارگذاری می‌پردازد. یادگیری Next.js برای ساخت اپلیکیشن‌های حرفه‌ای بسیار ارزشمند است.
                  </p>
                  <div
                    class="date flex flex-row justify-between items-center self-stretch mt-4"
                  >
                    <span
                      class="date flex flex-row justify-between items-center gap-1 text-sm"
                    >
                      <i class="fa-solid fa-calendar"></i>
                      22 فروردین، 1404
                    </span>
                    <span
                      class="time flex flex-row justify-between items-center gap-1 text-sm"
                    >
                      <i class="fa-solid fa-clock"></i>
                      12 دقیقه
                    </span>
                  </div>
                </div>
              </div>
            </a>
            <a class="card-link" href="{{ route('posts.show', ['slug' => 'sample']) }}">
              <div class="card flex flex-col">
                <img src="{{ asset('src/img/blogpost4.webp') }}" alt="post picture" />
                <div
                  class="card-info flex flex-col gap-4 justify-start items-start"
                >
                  <span class="tag text-sm green">PHP</span>
                  <h3
                    class="card-title text-base font-bold"
                    title="مدیریت وضعیت (State Management) در React با استفاده از Hooks"
                  >
                    مدیریت وضعیت (State Management) در React با استفاده از Hooks
                  </h3>
                  <p class="text-sm card-paragraph">
Hooks در React انقلابی در مدیریت وضعیت ایجاد کرده‌اند. در این نوشته، به توضیح useState، useEffect و سایر Hookهای پرکاربرد می‌پردازیم. یاد می‌گیرید چگونه بدون نیاز به کلاس، وضعیت اپلیکیشن را به‌خوبی مدیریت کنید.
                  </p>
                  <div
                    class="date flex flex-row justify-between items-center self-stretch mt-4"
                  >
                    <span
                      class="date flex flex-row justify-between items-center gap-1 text-sm"
                    >
                      <i class="fa-solid fa-calendar"></i>
                      12 تیر، 1403
                    </span>
                    <span
                      class="time flex flex-row justify-between items-center gap-1 text-sm"
                    >
                      <i class="fa-solid fa-clock"></i>
                      16 دقیقه
                    </span>
                  </div>
                </div>
              </div>
            </a>
            <a class="card-link" href="{{ route('posts.show', ['slug' => 'sample']) }}">
              <div class="card flex flex-col">
                <img src="{{ asset('src/img/blogpost5.webp') }}" alt="post picture" />
                <div
                  class="card-info flex flex-col gap-4 justify-start items-start"
                >
                  <span class="tag text-sm orange">Next JS</span>
                  <h3
                    class="card-title text-base font-bold"
                    title="رندر سمت سرور (SSR) در Next.js: عملکرد و مزایا"
                  >
                    رندر سمت سرور (SSR) در Next.js: عملکرد و مزایا
                  </h3>
                  <p class="text-sm card-paragraph">
یکی از مهم‌ترین ویژگی‌های Next.js رندر سمت سرور است که باعث افزایش سرعت لود صفحات و بهبود SEO می‌شود. در این مقاله فرآیند SSR و کاربردهای آن را توضیح می‌دهیم. همچنین نمونه‌ای عملی از رندر سمت سرور را بررسی می‌کنیم.
                  </p>
                  <div
                    class="date flex flex-row justify-between items-center self-stretch mt-4"
                  >
                    <span
                      class="date flex flex-row justify-between items-center gap-1 text-sm"
                    >
                      <i class="fa-solid fa-calendar"></i>
                      11 تیر، 1402
                    </span>
                    <span
                      class="time flex flex-row justify-between items-center gap-1 text-sm"
                    >
                      <i class="fa-solid fa-clock"></i>
                      6 دقیقه
                    </span>
                  </div>
                </div>
              </div>
            </a>
            <a class="card-link" href="{{ route('posts.show', ['slug' => 'sample']) }}">
              <div class="card flex flex-col">
                <img src="{{ asset('src/img/blogpost6.webp') }}" alt="post picture" />
                <div
                  class="card-info flex flex-col gap-4 justify-start items-start"
                >
                  <span class="tag text-sm yellow">React</span>
                  <h3
                    class="card-title text-base font-bold"
                    title="ایجاد صفحات داینامیک در Next.js با Dynamic Routing"
                  >
                    ایجاد صفحات داینامیک در Next.js با Dynamic Routing
                  </h3>
                  <p class="text-sm card-paragraph">
Next.js امکان ساخت صفحات پویا بر اساس پارامترهای URL را ساده کرده است. این مطلب نحوه استفاده از فایل‌های [param] و getStaticPaths را آموزش می‌دهد. با یادگیری این موضوع می‌توانید برنامه‌های قدرتمند و قابل گسترش بسازید.
                  </p>
                  <div
                    class="date flex flex-row justify-between items-center self-stretch mt-4"
                  >
                    <span
                      class="date flex flex-row justify-between items-center gap-1 text-sm"
                    >
                      <i class="fa-solid fa-calendar"></i>
                      05 تیر، 1402
                    </span>
                    <span
                      class="time flex flex-row justify-between items-center gap-1 text-sm"
                    >
                      <i class="fa-solid fa-clock"></i>
                      26 دقیقه
                    </span>
                  </div>
                </div>
              </div>
            </a>
            <a class="card-link" href="{{ route('posts.show', ['slug' => 'sample']) }}">
              <div class="card flex flex-col">
                <img src="{{ asset('src/img/blogpost7.webp') }}" alt="post picture" />
                <div
                  class="card-info flex flex-col gap-4 justify-start items-start"
                >
                  <span class="tag text-sm yellow">JavaScript</span>
                  <h3
                    class="card-title text-base font-bold"
                    title="آشنایی با Context API در React برای مدیریت داده‌های سراسری"
                  >
                    آشنایی با Context API در React برای مدیریت داده‌های سراسری
                  </h3>
                  <p class="text-sm card-paragraph">
Context API یکی از راهکارهای ساده و بدون نیاز به کتابخانه خارجی برای مدیریت داده‌های مشترک بین کامپوننت‌ها است. در این مقاله به نحوه ایجاد Provider و Consumer می‌پردازیم. یاد می‌گیرید چگونه اطلاعات را به‌صورت موثر بین بخش‌های مختلف برنامه منتقل کنید.
                  </p>
                  <div
                    class="date flex flex-row justify-between items-center self-stretch mt-4"
                  >
                    <span
                      class="date flex flex-row justify-between items-center gap-1 text-sm"
                    >
                      <i class="fa-solid fa-calendar"></i>
                      20 اسفند، 1403
                    </span>
                    <span
                      class="time flex flex-row justify-between items-center gap-1 text-sm"
                    >
                      <i class="fa-solid fa-clock"></i>
                      9 دقیقه
                    </span>
                  </div>
                </div>
              </div>
            </a>
            <a class="card-link" href="{{ route('posts.show', ['slug' => 'sample']) }}">
              <div class="card flex flex-col">
                <img src="{{ asset('src/img/blog post picture.jpg') }}" alt="post picture" />
                <div
                  class="card-info flex flex-col gap-4 justify-start items-start"
                >
                  <span class="tag text-sm orange">Next JS</span>
                  <h3
                    class="card-title text-base font-bold"
                    title="نکات مهم برای بهینه‌سازی عملکرد برنامه‌های Next.js"
                  >
                    نکات مهم برای بهینه‌سازی عملکرد برنامه‌های Next.js
                  </h3>
                  <p class="text-sm card-paragraph">
عملکرد بالا عامل مهمی در رضایت کاربران است. این مقاله نکاتی مانند استفاده از Image Optimization، Lazy Loading و کدنویسی بهینه در Next.js را بررسی می‌کند. با رعایت این نکات، اپلیکیشن‌های سریع‌تر و کارآمدتری خواهید داشت.
                  </p>
                  <div
                    class="date flex flex-row justify-between items-center self-stretch mt-4"
                  >
                    <span
                      class="date flex flex-row justify-between items-center gap-1 text-sm"
                    >
                      <i class="fa-solid fa-calendar"></i>
                      24 تیر، 1404
                    </span>
                    <span
                      class="time flex flex-row justify-between items-center gap-1 text-sm"
                    >
                      <i class="fa-solid fa-clock"></i>
                      10 دقیقه
                    </span>
                  </div>
                </div>
              </div>
            </a>
            <a class="card-link" href="{{ route('posts.show', ['slug' => 'sample']) }}">
              <div class="card flex flex-col">
                <img src="{{ asset('src/img/blogpost9.webp') }}" alt="post picture" />
                <div
                  class="card-info flex flex-col gap-4 justify-start items-start"
                >
                  <span class="tag text-sm red">Linux</span>
                  <h3
                    class="card-title text-base font-bold"
                    title="آموزش استفاده از کتابخانه Bcrypt در Express JS"
                  >
                    آشنایی با CSS-in-JS و استفاده از Styled Components در React
                  </h3>
                  <p class="text-sm card-paragraph">
روش‌های جدیدی برای مدیریت استایل در React وجود دارد که یکی از محبوب‌ترین آن‌ها CSS-in-JS است. این مطلب به معرفی کتابخانه Styled Components و نحوه استفاده از آن می‌پردازد. یاد می‌گیرید چطور استایل‌ها را به صورت کامپوننت محور مدیریت کنید.
                  </p>
                  <div
                    class="date flex flex-row justify-between items-center self-stretch mt-4"
                  >
                    <span
                      class="date flex flex-row justify-between items-center gap-1 text-sm"
                    >
                      <i class="fa-solid fa-calendar"></i>
                      21 مرداد، 1402
                    </span>
                    <span
                      class="time flex flex-row justify-between items-center gap-1 text-sm"
                    >
                      <i class="fa-solid fa-clock"></i>
                      10 دقیقه
                    </span>
                  </div>
                </div>
              </div>
            </a>
            <a class="card-link" href="{{ route('posts.show', ['slug' => 'sample']) }}">
              <div class="card flex flex-col">
                <img src="{{ asset('src/img/blogpost10.webp') }}" alt="post picture" />
                <div
                  class="card-info flex flex-col gap-4 justify-start items-start"
                >
                  <span class="tag text-sm green">Next JS</span>
                  <h3
                    class="card-title text-base font-bold"
                    title="آموزش استفاده از API Routes در Next.js"
                  >
                    آموزش استفاده از API Routes در Next.js
                  </h3>
                  <p class="text-sm card-paragraph">
Next.js به شما امکان ساخت APIهای ساده در کنار برنامه فرانت‌اند را می‌دهد. در این مقاله با نحوه تعریف API Routes و ارسال پاسخ آشنا می‌شوید. این ویژگی کمک می‌کند تا برنامه‌های full-stack با ساختار یکپارچه‌تری بسازید.
                  </p>
                  <div
                    class="date flex flex-row justify-between items-center self-stretch mt-4"
                  >
                    <span
                      class="date flex flex-row justify-between items-center gap-1 text-sm"
                    >
                      <i class="fa-solid fa-calendar"></i>
                      12 تیر، 1402
                    </span>
                    <span
                      class="time flex flex-row justify-between items-center gap-1 text-sm"
                    >
                      <i class="fa-solid fa-clock"></i>
                      5 دقیقه
                    </span>
                  </div>
                </div>
              </div>
            </a>
            <a class="card-link" href="{{ route('posts.show', ['slug' => 'sample']) }}">
              <div class="card flex flex-col">
                <img src="{{ asset('src/img/blogpost11.webp') }}" alt="post picture" />
                <div
                  class="card-info flex flex-col gap-4 justify-start items-start"
                >
                  <span class="tag text-sm yellow">JavaScript</span>
                  <h3
                    class="card-title text-base font-bold"
                    title="چرا باید جاوااسکریپت ES6 به بعد را یاد بگیریم؟"
                  >
                    چرا باید جاوااسکریپت ES6 به بعد را یاد بگیریم؟
                  </h3>
                  <p class="text-sm card-paragraph">
نسخه‌های جدید جاوااسکریپت امکانات و قابلیت‌های مدرن متعددی را ارائه داده‌اند. در این مقاله ویژگی‌هایی مثل arrow functions، destructuring و async/await را بررسی می‌کنیم. استفاده از ES6 باعث بهبود کیفیت و خوانایی کدهای شما خواهد شد.
                  </p>
                  <div
                    class="date flex flex-row justify-between items-center self-stretch mt-4"
                  >
                    <span
                      class="date flex flex-row justify-between items-center gap-1 text-sm"
                    >
                      <i class="fa-solid fa-calendar"></i>
                      24 اردیبهشت، 1404
                    </span>
                    <span
                      class="time flex flex-row justify-between items-center gap-1 text-sm"
                    >
                      <i class="fa-solid fa-clock"></i>
                      10 دقیقه
                    </span>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="flex justify-center">
    <nav class="pagination-container rounded-full px-4 py-3">
        <ul class="flex gap-4 font-medium py-2">
            <li>
                <a href="#" class="selected-page rounded-full px-4 py-2">1</a>
            </li>
            <li>
                <a href="#"
                    class="page rounded-full px-4 py-2 transition duration-300 ease-in-out">2</a>
            </li>
            <li>
                <a href="#"
                    class="page rounded-full px-4 py-2 transition duration-300 ease-in-out">3</a>
            </li>
            <li>
                <a href="#"
                    class="page rounded-full px-4 py-2 transition duration-300 ease-in-out">4</a>
            </li>
            <li>
                <a href="#"
                    class="page rounded-full px-4 py-2 transition duration-300 ease-in-out">5</a>
            </li>
        </ul>
    </nav>
</div>
        </div>
      </div>
@endsection
