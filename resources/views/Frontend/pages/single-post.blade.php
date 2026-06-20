@extends('Frontend.layouts.app')

@section('title', 'بنتوفولیو | آموزش راه اندازی کتابخانه B-crypt در Next JS')

@section('vite')
    @vite(['resources/js/frontend/public.js', 'resources/js/frontend/single-post.js'])
@endsection

@section('content')
<div class="post-info bento bento-boxes">
        <div class="card-border"></div>
        <div class="bento-content flex flex-col justify-center gap-6">
          <div class="breadcrumbs">
            <a class="main text-sm" href="{{ route('home') }}">
              <i class="fa-solid fa-house"></i>
              صفحه اصلی
            </a>
            <span>></span>
            <a class="main text-sm" href="{{ route('posts.archive') }}">
              آموزشی جاوا اسکریپت
            </a>
            <span>></span>
            <span class="main text-sm"
              >معرفی کتابخانه B-Crypt برای Express JS</span
            >
          </div>
          <h1 class="text-2xl font-bold">
            معرفی کتابخانه B-Crypt برای Express JS
          </h1>
          <div class="featured-image">
            <img
              src="{{ asset('src/img/blog post picture.jpg') }}"
              alt="Blog Post Featured Picture"
            />
          </div>

          <div class="general-info flex-wrap">
            <div class="general flex flex-row gap-6 flex-wrap">
              <div class="info-tags time text-sm">
                <i class="fa-solid fa-clock"></i>
                10 دقیقه
              </div>
              <div class="info-tags date text-sm">
                <i class="fa-solid fa-calendar"></i>
                24 تیر، 1404
              </div>

              <a class="info-tags tags text-sm" href="{{ route('posts.archive') }}">
                <i class="fa-solid fa-tags"></i>
                آموزشی جاوا اسکریپت
              </a>
            </div>
            <div class="comments-info flex flex-row gap-6 flex-wrap">
              <a class="comments-number" href="#comments">
                <i class="fa-solid fa-comments"></i>
                بدون دیدگاه
              </a>
              <div class="rating">
                <i class="fa-light fa-star" style="color: #ffd43b"></i>
                <i class="fa-solid fa-star" style="color: #ffd43b"></i>
                <i class="fa-solid fa-star" style="color: #ffd43b"></i>
                <i class="fa-solid fa-star" style="color: #ffd43b"></i>
                <i class="fa-solid fa-star" style="color: #ffd43b"></i>
              </div>
            </div>
          </div>
          <hr />
          <div class="post-content flex flex-col gap-3">
            <h2>مقدمه</h2>
            <p>
              امنیت اطلاعات یکی از مهم‌ترین بخش‌های توسعه‌ی نرم‌افزارهای مدرن
              است، به‌ویژه زمانی که صحبت از ذخیره‌سازی رمزهای عبور کاربران در
              میان باشد. ذخیره‌ی رمزهای عبور به‌صورت ساده (plain text) می‌تواند
              فاجعه‌بار باشد و عواقب جبران‌ناپذیری برای کاربران و سازمان‌ها
              داشته باشد. یکی از راهکارهای ایمن‌سازی رمزهای عبور، استفاده از
              الگوریتم‌های <strong>هشینگ رمزنگاری‌شده</strong> است. در این
              راستا، کتابخانه‌ی bcrypt یکی از محبوب‌ترین گزینه‌ها برای
              توسعه‌دهندگان جاوااسکریپت محسوب می‌شود.
            </p>
            <h2>bcrypt چیست؟</h2>
            <p>
              bcrypt یک الگوریتم هش کردن رمزنگاری‌شده است که به‌طور گسترده در
              زبان‌های مختلف برنامه‌نویسی از جمله JavaScript استفاده می‌شود. این
              الگوریتم به‌گونه‌ای طراحی شده که در برابر حملاتی مانند
              <em>brute-force</em> مقاوم باشد.
            </p>
            <h2>ویژگی‌های کلیدی</h2>
            <ul>
              <li>مقاومت در برابر حملات brute-force و rainbow table</li>
              <li>تنظیم سطح سختی هش از طریق فاکتور هزینه (cost factor)</li>
              <li>استفاده‌ی آسان در پروژه‌های Node.js</li>
              <li>پشتیبانی از Promise و Callback</li>
            </ul>
            <img src="{{ asset('src/img/blogpostimage2.jpg') }}" alt="First Blog Pic" />
            <h2>نصب کتابخانه</h2>
            <p>برای نصب در پروژه‌های Node.js از دستور زیر استفاده کنید:</p>
            <pre><code>npm install bcrypt</code></pre>
            <p>یا برای نسخه‌ی جاوااسکریپتی (بدون نیاز به باینری):</p>
            <pre><code>npm install bcryptjs</code></pre>
            <h2>نحوه‌ی استفاده</h2>
            <h3>هش کردن رمز عبور</h3>
            <pre><code>const bcrypt = require('bcrypt');

const password = 'mySecretPassword';
const saltRounds = 10;

bcrypt.hash(password, saltRounds, (err, hash) =&gt; {
  if (err) throw err;
  console.log('Hashed password:', hash);
});</code></pre>
            <h3>استفاده از Promise:</h3>
            <pre><code>bcrypt.hash(password, saltRounds)
  .then(hash =&gt; {
    console.log('Hashed password:', hash);
  })
  .catch(err =&gt; console.error(err));</code></pre>

            <h3>مقایسه رمز عبور با هش ذخیره‌شده</h3>
            <pre><code>const hashedPassword = '$2b$10$eCZn2rPl7y0qUKrR8IVnYe7Z5ow7xO...';

bcrypt.compare(password, hashedPassword, (err, result) =&gt; {
  if (result) {
    console.log('رمز عبور صحیح است.');
  } else {
    console.log('رمز عبور نادرست است.');
  }
});</code></pre>
            <h2>تفاوت bcrypt و bcryptjs</h2>
            <ul>
              <li>
                <strong>bcrypt:</strong> نسخه‌ی باینری، سریع‌تر ولی نیاز به
                build دارد.
              </li>
              <li>
                <strong>bcryptjs:</strong> نسخه‌ی جاوااسکریپتی، قابل استفاده در
                همه جا، کمی کندتر.
              </li>
            </ul>
            <img src="{{ asset('src/img/blogpostimage1.jpg') }}" alt="First Blog Pic" />
            <h2>نکات امنیتی</h2>
            <ul>
              <li>
                همیشه از <strong>فاکتور هزینه</strong> مناسب استفاده کنید (مثلاً
                ۱۰ یا بیشتر).
              </li>
              <li>هش‌ها را مجدداً هش نکنید.</li>
              <li>رمز عبور خام را ذخیره یا لاگ نکنید.</li>
              <li>برای بررسی رمز از <code>compare()</code> استفاده کنید.</li>
            </ul>
            <h2>نتیجه‌گیری</h2>
            <p>
              کتابخانه‌ی <code>bcrypt</code> یکی از ابزارهای قدرتمند برای
              ایمن‌سازی رمز عبور در جاوااسکریپت است. با توجه به امنیت بالا و
              سادگی استفاده، توصیه می‌شود در همه‌ی پروژه‌هایی که نیاز به احراز
              هویت دارند، از آن استفاده شود.
            </p>
          </div>
          <div
            class="share-buttons flex flex-row justify-between items-center mt-6"
          >
            <span>اشتراک گذاری:</span>
            <div class="share-buttons-all flex flex-row justify-end gap-4">
              <a href="#"><i class="fa-solid fa-link icon-hover"></i></a>
              <a href="#"><i class="fa-brands fa-whatsapp icon-hover"></i></a>
              <a href="#"><i class="fa-brands fa-telegram icon-hover"></i></a>
              <a href="#"><i class="fa-solid fa-message-sms icon-hover"></i></a>
              <a href="#"><i class="fa-solid fa-envelope icon-hover"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="side-bar bento bento-boxes h-[100%]">
        <div class="card-border"></div>
        <div class="bento-content h-[100%] sticky-parent">
          <div
            class="inner-section flex flex-col justify-start items-center gap-10 sticky-element"
          >
            <div class="categories flex flex-col gap-4 w-[100%]">
              <span class="text-lg font-bold">دسته بندی</span>
              <a
                href="{{ route('posts.archive') }}"
                class="category flex flex-row justify-between items-center"
              >
                <span>Javascript</span>
                <span>14</span>
              </a>
              <a
                href="{{ route('posts.archive') }}"
                class="category flex flex-row justify-between items-center"
              >
                <span>React & Next</span>
                <span>6</span>
              </a>
              <a
                href="{{ route('posts.archive') }}"
                class="category flex flex-row justify-between items-center"
              >
                <span>Tech News</span>
                <span>11</span>
              </a>
              <a
                href="{{ route('posts.archive') }}"
                class="category flex flex-row justify-between items-center"
              >
                <span>Javascript</span>
                <span>14</span>
              </a>
            </div>
            <div class="latest flex flex-col gap-4 w-[100%]">
              <span class="text-lg font-bold">آخرین مطالب</span>
              <a href="#" class="text-sm icon-hover flex flex-row gap-2"
                ><i class="fa-solid fa-newspaper"></i> مزیت های فریمورک Next Js
                نسبت به React
              </a>
              <a href="#" class="text-sm icon-hover flex flex-row gap-2"
                ><i class="fa-solid fa-newspaper"></i> معرفی کتابخانه B-Crypt
                برای Express JS
              </a>
              <a href="#" class="text-sm icon-hover flex flex-row gap-2"
                ><i class="fa-solid fa-newspaper"></i> برای شروع Next Js به چه
                چیزهایی نیاز داریم؟
              </a>
              <a href="#" class="text-sm icon-hover flex flex-row gap-2"
                ><i class="fa-solid fa-newspaper"></i> آموزش ریدایرکت کردن به
                صفحه ورود در Next Js
              </a>
            </div>
            <div class="banners flex flex-col gap-4 w-[100%]">
              <span class="text-lg font-bold">تبلیغات</span>
              <a href="#"><img src="{{ asset('src/img/banner1.webp') }}" alt="banner1" /></a>
              <a href="#"><img src="{{ asset('src/img/banner2.webp') }}" alt="banner1" /></a>
            </div>
          </div>
        </div>
      </div>

      <div class="comments-section bento bento-boxes">
        <div class="card-border"></div>
        <div class="bento-content flex flex-col gap-8">
          <span class="text-lg font-bold">3 دیدگاه</span>
          <div class="all-comments flex flex-col gap-8">
            <div class="comment flex flex-row gap-4">
              <div class="picture flex flex-col justify-center items-start">
                <div class="pic">
                  <img
                    class="profile-picture"
                    src="{{ asset('src/img/pp1.jpg') }}"
                    alt="user profile picture"
                  />
                </div>
              </div>
              <div class="comment-info flex flex-col gap-2">
                <div
                  class="author-info flex flex-row justify-between items-center gap-4"
                >
                  <span class="name font-semibold">مهرداد نوری</span>
                  <span class="info flex flex-row gap-3">
                    <span class="date text-sm"
                      >21 خرداد، 1404 در 3:00 بعد از ظهر</span
                    >
                    <a href="#" class="reply font-semibold">پاسخ</a>
                  </span>
                </div>
                <div class="write-comment">
                  <p class="paragraph">
                    در نهایت این مرگ است که باید پیروز شود، زیرا از هنگام تولد
                    بخشی از سرنوشت ما شده و فقط مدت کوتاهی پیش از بلعیدن طعمه
                    اش، با آن بازی می کند.
                  </p>
                </div>
                <div class="comment-text"></div>
              </div>
            </div>
            <div class="comment comment-2 flex flex-row gap-4">
              <div class="picture flex flex-col justify-center items-start">
                <div class="pic">
                  <img
                    class="profile-picture"
                    src="{{ asset('src/img/pp3.jpg') }}"
                    alt="user profile picture"
                  />
                </div>
              </div>
              <div class="comment-info flex flex-col gap-2">
                <div
                  class="author-info flex flex-row justify-between items-center gap-4"
                >
                  <span class="name font-semibold">مونا شاه حسینی</span>
                  <span class="info flex flex-row gap-3">
                    <span class="date text-sm"
                      >23 خرداد، 1404 در 2:00 بعد از ظهر</span
                    >
                    <a href="#" class="reply font-semibold">پاسخ</a>
                  </span>
                </div>
                <div class="write-comment">
                  <p class="paragraph">
                    همان‌ طور که تا آنجا که ممکن است طولانی‌ تر در یک حباب صابون
                    می‌ دمیم تا بزرگتر شود!
                  </p>
                </div>
                <div class="comment-text"></div>
              </div>
            </div>
            <div class="comment flex flex-row gap-4">
              <div class="picture flex flex-col justify-center items-start">
                <div class="pic">
                  <img
                    class="profile-picture"
                    src="{{ asset('src/img/pp2.jpg') }}"
                    alt="user profile picture"
                  />
                </div>
              </div>
              <div class="comment-info flex flex-col gap-2">
                <div
                  class="author-info flex flex-row justify-between items-center gap-4"
                >
                  <span class="name font-semibold">رضا کریمی</span>
                  <span class="info flex flex-row gap-3">
                    <span class="date text-sm"
                      >25 خرداد، 1404 در 3:00 بعد از ظهر</span
                    >
                    <a href="#" class="reply font-semibold">پاسخ</a>
                  </span>
                </div>
                <div class="write-comment">
                  <p class="paragraph">
                    وقتی ثروت‌ های بزرگ به دست برخی مردم می‌افتد در پرتو آن
                    نیرومند می‌شوند و در سایهٔ نیرومندی و ثروت خیال می‌ کنند که
                    می‌توانند در خارج از وطن خود زندگی نمایند و خوشبخت و سرافراز
                    باشند.
                  </p>
                </div>
                <div class="comment-text"></div>
              </div>
            </div>
          </div>
          <div class="submit-comment flex flex-col gap-8">
            <span class="text-lg font-bold">ثبت دیدگاه</span>

            <form class="comment-form">
              <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                  <label for="first_name" class="block mb-2 text-sm font-medium"
                    >نام</label
                  >
                  <input
                    type="text"
                    id="first_name"
                    class="text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="نام"
                    required
                  />
                </div>
                <div>
                  <label for="last_name" class="block mb-2 text-sm font-medium"
                    >نام خانوادگی</label
                  >
                  <input
                    type="text"
                    id="last_name"
                    class="text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="نام خانوادگی"
                    required
                  />
                </div>
              </div>
              <div class="grid gap-6 mb-6">
                <div>
                  <label for="email" class="block mb-2 text-sm font-medium"
                    >ایمیل</label
                  >
                  <input
                    type="email"
                    id="email"
                    class="text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="email@mail.com"
                    required
                  />
                </div>

                <div>
                  <label for="email" class="block mb-2 text-sm font-medium"
                    >دیدگاه شما</label
                  >
                  <textarea
                    type="email"
                    id="email"
                    class="text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="دیدگاه شما ..."
                    required
                    rows="5"
                  ></textarea>
                </div>
                <div class="flex items-start mb-6">
                  <div class="flex items-center h-5">
                    <input
                      id="remember"
                      type="checkbox"
                      value=""
                      class="w-4 h-4 border border-gray-300 rounded-sm bg-gray-50 focus:ring-3 focus:ring-blue-300"
                      required
                    />
                  </div>
                  <label for="remember" class="ms-2 text-sm font-medium">
                    <a href="#" class="text-blue-600 hover:underline">
                      قوانین و مقررات </a
                    >را میپذیرم.</label
                  >
                </div>
                <button
                  type="submit"
                  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center"
                >
                  ثبت دیدگاه
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
@endsection
