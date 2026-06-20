<div class="top-bar flex flex-row items-center justify-between">
  <div class="flex flex-row justify-between items-center gap-4">
    <a class="side-bar block xl:hidden" href="#">
      <i class="icon fa-solid fa-bars-sort fa-flip-horizontal fa-lg"></i>
    </a>
    <a class="search" href="#">
      <i class="icon fa-solid fa-magnifying-glass fa-lg"></i>
    </a>
  </div>
  <div class="flex flex-row gap-5 items-center">
    <a class="hidden xl:block" href="{{ route('dashboard.account-settings') }}">
      <i class="icon fa-solid fa-gear fa-lg"></i>
    </a>
    <div class="admin-info flex flex-row justify-between items-center gap-2">
      <img
        class="admin-pic"
        src="{{ asset('src/img/Profile Picture.jpg') }}"
        alt=""
      />

      <div class="info flex flex-col gap-1">
        <span class="role text-xs">مدیر سایت</span>
        <span class="username font-semibold text-xs">{{ auth()->user()->name }}</span>
      </div>
      <div class="info-hover-content">
        <div class="flex flex-col gap-2 p-1">
          <a
            class="menu-item flex flex-row gap-3 items-center justify-start text-xs"
            href="{{ route('home') }}"
          >
            <i class="fa-solid fa-eye"></i>
            مشاهده سایت
          </a>
          <a
            class="menu-item flex flex-row gap-3 items-center justify-start text-xs"
            href="{{ route('dashboard.account-settings') }}"
          >
            <i class="fa-solid fa-gears"></i>
            تنظیمات
          </a>
          @include('Frontend.partials.dashboard-logout', ['class' => 'menu-item flex flex-row gap-3 items-center justify-start text-xs w-full', 'iconClass' => ''])
        </div>
      </div>
    </div>
  </div>
</div>
