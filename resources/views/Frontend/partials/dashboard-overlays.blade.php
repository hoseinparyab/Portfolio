<div id="search-overlay"class="search-overlay hidden">
      <input
        type="text"
        id="search-input"
        class="search-input"
        placeholder="جستجو..."
        autofocus
      />
    </div>

    <!-- Sidebar container -->
    <div id="sidebar" class="sidebar-container">
      <!-- Sidebar content can be added here -->
      <div class="sidebar-content">
        <!-- side-bar menu content -->
        <div class="logo-container">
          <a
            href="{{ route('dashboard.index') }}"
            class="logo flex justify-start items-center gap-2"
          >
            <img
              src="{{ asset('src/img/logo-gradient.svg') }}"
              alt="portfolio logo"
              class="w-14"
            />
            <span class="font-bold text-lg">بنتوفولیو</span>
          </a>
        </div>
        <nav class="menu flex flex-col gap-2">
          <span class="seperator text-sm">ناوبری</span>
          <a
            class="menu-item flex flex-row gap-3 items-center justify-start text-sm"
            href="{{ route('dashboard.index') }}"
          >
            <i class="fa-solid fa-grid-2 fa-xl"></i>
            داشبورد
          </a>
          <span class="seperator text-sm">بلاگ</span>
          <a
            class="menu-item flex flex-row gap-3 items-center justify-start text-sm"
            href="{{ route('dashboard.posts.create') }}"
          >
            <i class="fa-solid fa-pencil fa-xl"></i>
            ایجاد پست جدید
          </a>
          <a
            class="menu-item flex flex-row gap-3 items-center justify-start text-sm"
            href="{{ route('dashboard.posts.index') }}"
          >
            <i class="fa-solid fa-newspaper fa-xl"></i>
            مشاهده پست ها
          </a>
          <a
            class="menu-item flex flex-row gap-3 items-center justify-start text-sm"
            href="{{ route('dashboard.categories') }}"
          >
            <i class="fa-solid fa-layer-group fa-xl"></i>
            دسته بندی ها
          </a>
          <a
            class="menu-item flex flex-row gap-3 items-center justify-start text-sm"
            href="{{ route('dashboard.comments') }}"
          >
            <i class="fa-solid fa-comments fa-xl"></i>
            نظرات
          </a>
          <span class="seperator text-sm">تنظیمات صفحات</span>
          <a
            class="menu-item flex flex-row gap-3 items-center justify-start text-sm"
            href="{{ route('dashboard.page-settings') }}"
          >
            <i class="fa-solid fa-memo fa-xl"></i>
            ویرایش صفحه اصلی
          </a>
          <a
            class="menu-item flex flex-row gap-3 items-center justify-start text-sm"
            href="{{ route('dashboard.page-settings') }}"
          >
            <i class="fa-solid fa-briefcase fa-xl"></i>
            نمونه کار ها
          </a>
          <span class="seperator text-sm">کاربران</span>
          <a
            class="menu-item flex flex-row gap-3 items-center justify-start text-sm"
            href="{{ route('dashboard.users') }}"
          >
            <i class="fa-solid fa-users fa-xl"></i>
            مدیریت کاربران
          </a>

          <span class="seperator text-sm">حساب کاربری</span>
          <a
            class="menu-item flex flex-row gap-3 items-center justify-start text-sm"
            href="{{ route('dashboard.account-settings') }}"
          >
            <i class="fa-solid fa-gears fa-xl"></i>
            تنظیمات حساب
          </a>
          @include('Frontend.partials.dashboard-logout')
        </nav>
      </div>
    </div><div id="sidebar" class="sidebar-container">
      <!-- Sidebar content can be added here -->
      <div class="sidebar-content">
        <!-- side-bar menu content -->
        <div class="logo-container">
          <a
            href="{{ route('dashboard.index') }}"
            class="logo flex justify-start items-center gap-2"
          >
            <img
              src="{{ asset('src/img/logo-gradient.svg') }}"
              alt="portfolio logo"
              class="w-14"
            />
            <span class="font-bold text-lg">بنتوفولیو</span>
          </a>
        </div>
        <nav class="menu flex flex-col gap-2">
          <span class="seperator text-sm">ناوبری</span>
          <a
            class="menu-item flex flex-row gap-3 items-center justify-start text-sm"
            href="{{ route('dashboard.index') }}"
          >
            <i class="fa-solid fa-grid-2 fa-xl"></i>
            داشبورد
          </a>
          <span class="seperator text-sm">بلاگ</span>
          <a
            class="menu-item flex flex-row gap-3 items-center justify-start text-sm"
            href="{{ route('dashboard.posts.create') }}"
          >
            <i class="fa-solid fa-pencil fa-xl"></i>
            ایجاد پست جدید
          </a>
          <a
            class="menu-item flex flex-row gap-3 items-center justify-start text-sm"
            href="{{ route('dashboard.posts.index') }}"
          >
            <i class="fa-solid fa-newspaper fa-xl"></i>
            مشاهده پست ها
          </a>
          <a
            class="menu-item flex flex-row gap-3 items-center justify-start text-sm"
            href="{{ route('dashboard.categories') }}"
          >
            <i class="fa-solid fa-layer-group fa-xl"></i>
            دسته بندی ها
          </a>
          <a
            class="menu-item flex flex-row gap-3 items-center justify-start text-sm"
            href="{{ route('dashboard.comments') }}"
          >
            <i class="fa-solid fa-comments fa-xl"></i>
            نظرات
          </a>
          <span class="seperator text-sm">تنظیمات صفحات</span>
          <a
            class="menu-item flex flex-row gap-3 items-center justify-start text-sm"
            href="{{ route('dashboard.page-settings') }}"
          >
            <i class="fa-solid fa-memo fa-xl"></i>
            ویرایش صفحه اصلی
          </a>
          <a
            class="menu-item flex flex-row gap-3 items-center justify-start text-sm"
            href="{{ route('dashboard.page-settings') }}"
          >
            <i class="fa-solid fa-briefcase fa-xl"></i>
            نمونه کار ها
          </a>
          <span class="seperator text-sm">کاربران</span>
          <a
            class="menu-item flex flex-row gap-3 items-center justify-start text-sm"
            href="{{ route('dashboard.users') }}"
          >
            <i class="fa-solid fa-users fa-xl"></i>
            مدیریت کاربران
          </a>

          <span class="seperator text-sm">حساب کاربری</span>
          <a
            class="menu-item flex flex-row gap-3 items-center justify-start text-sm"
            href="{{ route('dashboard.account-settings') }}"
          >
            <i class="fa-solid fa-gears fa-xl"></i>
            تنظیمات حساب
          </a>
          @include('Frontend.partials.dashboard-logout')
        </nav>
      </div>
    </div><div id="sidebar-overlay" class="sidebar-overlay"></div>