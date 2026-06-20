<div class="mobile-menu-overlay" aria-hidden="true">
      <button class="mobile-menu-close" aria-label="Close menu">&times;</button>
      <!-- Add mobile menu content here if needed -->
      <div
        class="flex flex-col h-[100%] w-[100%] justify-center items-center gap-10"
      >
        <nav class="menu flex flex-col justify-center">
          <ul class="flex flex-col gap-12">
            <li>
              <a href="{{ route('home') }}" class="flex items-center justify-center gap-4 link">
                <i class="fa-solid fa-house text-xl link-icon fa-xl"></i>
                <span class="menu_item link-text text-xl">خانه</span>
              </a>
            </li>
            <li>
              <a href="{{ route('portfolios') }}" class="flex items-center justify-center gap-4 link">
                <i class="fa-solid fa-folder-open text-xl link-icon fa-xl"></i>
                <span class="menu_item link-text text-xl">پروژه‌ها</span>
              </a>
            </li>
            <li>
              <a href="{{ route('posts.archive') }}" class="flex items-center justify-center gap-4 link">
                <i class="fa-solid fa-newspaper text-xl link-icon fa-xl"></i>
                <span class="menu_item link-text text-xl">بلاگ</span>
              </a>
            </li>
          </ul>
        </nav>

        <div class="theme-switch bento p-2">
          <div class="toggle-switch">
            <div class="toggle-option active light-option" data-theme="light">
              <i class="fa-solid fa-sun-bright"></i>
            </div>
            <div class="toggle-option dark-option" data-theme="dark">
              <i class="fa-solid fa-moon-stars"></i>
            </div>
            <div class="toggle-slider"></div>
          </div>
        </div>

        <button class="contact-button">
          ارتباط با من
          <i class="fa-solid fa-phone"></i>
        </button>
      </div>
    </div>